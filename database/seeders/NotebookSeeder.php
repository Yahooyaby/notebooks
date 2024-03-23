<?php

namespace Database\Seeders;

use App\Models\Notebook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotebookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notebooks = [
            [
                'full_name' => 'Ryan Gosling',
                'company' => 'Drive',
                'phone_number' => '+79555441668',
                'email' => 'gosling@bladerunner.com',
                'date_of_birth' => '1980.11.12',
            ],
            [
                'full_name' => 'Pedro Pascal',
                'company' => 'The last of us',
                'phone_number' => '+7974971418',
                'email' => 'pascal@notprogramminglanguage.com',
                'date_of_birth' => '1975.04.02',
            ],
            [
                'full_name' => 'Ivan Tester',
                'company' => 'Greenside',
                'phone_number' => '+7975513348',
                'email' => 'Testing@gunner.com',
                'date_of_birth' => '2000.06.17',
            ],

        ];
        foreach ($notebooks as $notebook){
            Notebook::updateOrCreate($notebook);
        }
    }
}
