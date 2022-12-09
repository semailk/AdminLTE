<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const QUANTITY_VALUE = 300;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < self::QUANTITY_VALUE; $i++){
           $company =  Company::factory()->create();
           for ($e=0; $e < 3; $e++){
               $client = Client::factory()->create();
               $company->clients()->attach(
                   $client->id
               );
           }
        }
          // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
