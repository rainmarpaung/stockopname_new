<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $limit = 10000;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('transactions')->insert([ //,
                'vehicle_no' => 'BK ' + $faker->numberBetween(1000,9000),
                'id_product' => $faker->numberBetween(1,11),
                'driver_name' => $faker->name,
                'transporter' => $faker->randomElement([6, 12, 14, 15]),
                'wb1' => $faker->numberBetween(10000,15000),
                'date1' => $faker->dateTime($max = '2019-12-30 00:00:00'),
                'id_user1' => ' ',
                'ticket1' => 'WIN ' + $faker->numberBetween(1903000090,1912015000),
                'wb2' => $faker->numberBetween(20000,55000),
                'date2' => $faker->dateTime($max = '2019-12-30 00:00:00'),
                'id_user2' => ' ',
                'ticket2' => 'WOT ' + $faker->numberBetween(1903000090,1912015000),
                'netto' => $faker->numberBetween(10000,30000),
                'tolerance' => $faker->numberBetween(0,0.5),
                'remark' => ' ',
                'bag' => $faker->numberBetween(10,50),
                'inputbag' => $faker->numberBetween(1000,10000),
                'customer' => $faker->randomElement([1, 2, 8, 13]),
                'id_shipment' => ' ',
                'palka' => ' ',
                'sealno' => ' ',
                'pono' => ' ',
                'sjno' => ' ',
                'sjno' => ' ',
                'productname' => ' ',
                'created_at' => $faker->dateTime($max = '2019-12-30 00:00:00'),
                'updated_at' => $faker->dateTime($max = '2019-12-30 00:00:00'),
            ]);
        }
    }
}
