<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Contact;

class ContactsTest extends TestCase
{
    use DatabaseMigrations;

    public function testContactCreatedFromPostSubmission()
    {
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
}
