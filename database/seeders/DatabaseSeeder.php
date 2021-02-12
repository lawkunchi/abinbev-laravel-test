<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        $faker = Faker::create('en_ZA');


        


         print "----------------------------------------------------------------------------------------------------\r\n";
        print "-------------------SEEDING CLIENTS TABLE\r\n";            
        print "----------------------------------------------------------------------------------------------------\r\n";

    	foreach (range(1,500) as $index) {
            DB::table('clients')->insert([
                'name' => $faker->firstname. " " .$faker->lastname,
                'cod' => $faker->postcode,
                'city' => $faker->city,
                'created_at' => $faker->date($format = 'y-m-d h:i:s', $max = '2021',$min = '2020'),
                'updated_at' => $faker->date($format = 'y-m-d h:i:s', $max = '2021',$min = '2020'),
                
            ]);
                print "--- " .$faker->firstname." ".$faker->lastname." ADDED\r\n";

        }
        sleep(1);

        print "--- CLIENT DATABASE COMPLETED\r\n";

        print "--- \r\n";
        print "--- \r\n";
        print "--- \r\n";
        print "--- \r\n";
        print "--- \r\n";

        sleep(1);


         print "----------------------------------------------------------------------------------------------------\r\n";
        print "-------------------SEEDING CITIES TABLE\r\n";            
        print "----------------------------------------------------------------------------------------------------\r\n";
        sleep(1);

        foreach (range(1, 500) as $index) {
            DB::table('cities')->insert([
                'cod' => $faker->postcode,
                'name' => $faker->city,
                'created_at' => $faker->date($format = 'y-m-d h:i:s', $max = '2021',$min = '2020'),
                'updated_at' => $faker->date($format = 'y-m-d h:i:s', $max = '2021',$min = '2020')
            ]);

            print "--- " .$faker->city." ADDED\r\n";
        }

         print "--- CITIES DATABASE COMPLETED\r\n";
         sleep(1);


         print "----------------------------------------------------------------------------------------------------\r\n";
        print "-------------------SEEDING USERS TABLE\r\n";            
        print "----------------------------------------------------------------------------------------------------\r\n";


        foreach (range(1,500) as $index) {
            DB::table('users')->insert([
                'name' => $faker->firstname. " " .$faker->lastname,
                'email' => $faker->email,
                'created_at' => $faker->date($format = 'y-m-d h:i:s', $max = '2021',$min = '2020'),
                'updated_at' => $faker->date($format = 'y-m-d h:i:s', $max = '2021',$min = '2020')
            ]);

            print "--- " .$faker->firstname." ".$faker->lastname." ADDED\r\n";
        }

         print "--- USER DATABASE COMPLETED\r\n";
         sleep(1);


          print "-----------------------------------------------------------------------------------\r\n";
        print "--------   DB SEEDING COMPLETED  \r\n";
        print "-----------------------------------------------------------------------------------\r\n";
        print "\r\n";

        sleep(1);
    }
}

