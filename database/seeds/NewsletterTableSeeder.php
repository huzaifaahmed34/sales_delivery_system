<?php

use Illuminate\Database\Seeder;
 

class NewsletterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $faker = Faker\Factory::create();

    for($i = 0; $i < 10000; $i++) {
        DB::table('orders')->insert([
            
           
            'customer_id' => 1,
            'product_id' => 1,
           
        'total_polyster_wt'=>0, 'total_poly_wt'=>0, 't_m_polyster_wt'=>0, 't_m_bopp_wt'=>0, 't_bopp_wt'=>0 ,
             'remarks' =>$faker->name,

        ]);
    }
    }
}
