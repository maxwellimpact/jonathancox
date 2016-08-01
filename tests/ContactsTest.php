<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use MailThief\Facades\MailThief;

use App\Contact;

class ContactsTest extends TestCase
{
    use DatabaseMigrations;

    public function testContactCreatedFromPostSubmission()
    {
        MailThief::hijack();
        $contact = factory(Contact::class)->make();
        
        $this->visit('/contact')
             ->type($contact->name, 'name')
             ->type($contact->email, 'email')
             ->type($contact->message, 'message')
             ->press('Contact');
             
        $contact_record = Contact::first();
        
        $difference = array_diff(
          $contact->toArray(),
          $contact_record->toArray()
        );
        
        $this->assertTrue(!count($difference));
    }
    
    public function testContactStoreSendsEmail()
    {
        MailThief::hijack();
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
