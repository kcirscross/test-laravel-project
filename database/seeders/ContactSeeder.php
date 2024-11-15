<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Contact::create([
            'contact_name' => 'John Doe',
            'email' => 'john@example.com',
            'telephone' => '123456789',
            'responsible' => 'Manager A',
            'tag' => 'Sales'
        ]);

        Contact::create([
            'contact_name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'telephone' => '987654321',
            'responsible' => 'Manager B',
            'tag' => 'Marketing'
        ]);

        Contact::create([
            'contact_name' => 'Robert Brown',
            'email' => 'robert@example.com',
            'telephone' => '5647382910',
            'responsible' => 'Manager C',
            'tag' => 'Support'
        ]);

        Contact::create([
            'contact_name' => 'Emily White',
            'email' => 'emily@example.com',
            'telephone' => '234567890',
            'responsible' => 'Manager D',
            'tag' => 'HR'
        ]);

        Contact::create([
            'contact_name' => 'Michael Green',
            'email' => 'michael@example.com',
            'telephone' => '345678901',
            'responsible' => 'Manager E',
            'tag' => 'Finance'
        ]);
    }
}
