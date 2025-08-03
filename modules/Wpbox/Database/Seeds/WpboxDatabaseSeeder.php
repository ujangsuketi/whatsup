<?php

namespace Modules\Wpbox\Database\Seeds;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class WpboxDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       
        if(config('settings.app_code_name')!='wpbox'){
            return;
        }

        //Insert landing page data
        $this->call(LandingSeeder::class);

       //if project is not in demo mode, don't insert demo data
       if(!config('settings.is_demo',false)){
            return;
        }

       
        Model::unguard();


        //Insert company
        $this->call(PricingPlansTableSeeder::class);

        //Insert company
        $this->call(CompanyTableSeeder::class);

        //Insert contacts and messages
        $this->call(ContactsAndMessagesTableSeeder::class);

        //Insert journies
        $this->call(JourniesDatabaseSeeder::class);

        //Insert reservations
        $this->call(ReservationsTableSeeder::class);
        
        Model::reguard();
    }
}
