<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use MailThief\Facades\MailThief;

use App\Contact;

class ContactsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        MailThief::hijack();    
    }

    public function testContactCreatedFromPostSubmission()
    {
        $contact = factory(Contact::class)->make()->toArray();
        
        $this->visit('/contact')
             ->type($contact['name'], 'name')
             ->type($contact['email'], 'email')
             ->type($contact['message'], 'message')
             ->press('Contact');
             
        $contact_record = Contact::first()->toArray();
        
        $difference = array_diff(
          $contact,
          $contact_record
        );
        
        $this->assertTrue(!count($difference));
    }
    
    public function testContactStoreSendsEmail()
    {
        $contact = factory(Contact::class)->make();
        
        $this->post('/contact', $contact->toArray());
        
        $this->assertTrue(
            MailThief::hasMessageFor(config('mail.to'))
        );

        $this->assertContains(
            'New Contact',
            MailThief::lastMessage()->subject
        );

        $this->assertEquals(
            $contact->email,
            MailThief::lastMessage()->from->first()
        );
    }
}
