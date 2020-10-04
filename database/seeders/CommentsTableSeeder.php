<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('comments')->insert([
          'id_exchange' => 1,
          'rating' => '5',
          'comment' => 'todo bien!'
      ]);
      DB::table('comments')->insert([
          'id_exchange' => 2,
          'rating' => '4',
          'comment' => 'bastante bien !'
      ]);

    }
}
