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
          'id_seller' => 2,
          'id_buyer' => 1,
          'id_creator' => 1,
          'status' => 0,
          'concept'=> 'Perfectly well!',
          'accepted_time' => date("Y-m-d H:i:s"),
          'finished_time' => date("Y-m-d H:i:s"),
          'cancelled_time' => date("Y-m-d H:i:s"),
          'amount' => 120,
      ]);
      DB::table('exchanges')->insert([
          'id_seller' => 2,
          'id_buyer' => 5,
          'id_creator' => 2,
          'status' => 0,
          'concept'=> 'Instalación Windows',
          'accepted_time' => date("Y-m-d H:i:s"),
          'finished_time' => date("Y-m-d H:i:s"),
          'cancelled_time' => date("Y-m-d H:i:s"),
          'amount' => 60,
      ]);
      DB::table('exchanges')->insert([
          'id_seller' => 2,
          'id_buyer' => 1,
          'id_creator' => 2,
          'status' => 0,
          'concept'=> 'Clases informática',
          'accepted_time' => date("Y-m-d H:i:s"),
          'finished_time' => date("Y-m-d H:i:s"),
          'cancelled_time' => date("Y-m-d H:i:s"),
          'amount' => 140,
      ]);
      DB::table('exchanges')->insert([
          'id_seller' => 1,
          'id_buyer' => 5,
          'id_creator' => 1,
          'status' => 0,
          'concept'=> 'Curso guitarra',
          'accepted_time' => date("Y-m-d H:i:s"),
          'finished_time' => date("Y-m-d H:i:s"),
          'cancelled_time' => date("Y-m-d H:i:s"),
          'amount' => 210,
      ]);
    }
}
