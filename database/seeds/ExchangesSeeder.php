<?php

use Illuminate\Database\Seeder;

class ExchangesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('exchanges')->insert([
          'id_seller' => 1,
          'id_buyer' => 2,
          'status' => 1,
          'concept'=> 'Perfectly well!',
          'accepted_time' => date("Y-m-d H:i:s"),
          'finished_time' => date("Y-m-d H:i:s"),
          'cancelled_time' => date("Y-m-d H:i:s"),
          'amount' => 120,
      ]);
      DB::table('exchanges')->insert([
          'id_seller' => 3,
          'id_buyer' => 5,
          'status' => 0,
          'concept'=> 'Curso guitarra',
          'accepted_time' => date("Y-m-d H:i:s"),
          'finished_time' => date("Y-m-d H:i:s"),
          'cancelled_time' => date("Y-m-d H:i:s"),
          'amount' => 140,
      ]);
    }
}
