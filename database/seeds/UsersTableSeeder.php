<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
        'id' => 1,
        'name' => 'guille',
        'email' => 'gtamborero@iproject.cat',
        'password' => Hash::make('iProject77')
        ],
        [
        'id' => 2,
        'name' => 'xavi',
        'email' => 'xavier@iproject.cat',
        'password' => Hash::make('iProject77')
        ],
        [
        'id' => 3,
        'name' => 'pedro',
        'email' => 'pedro@iproject.cat',
        'password' => Hash::make('iProject77')
        ],
        [
        'id' => 4,
        'name' => 'jorge',
        'email' => 'jorge@iproject.cat',
        'password' => Hash::make('iProject77')
        ],
        [
        'id' => 5,
        'name' => 'paco',
        'email' => 'paco@iproject.cat',
        'password' => Hash::make('iProject77')
        ],

      ]);
    }
}
