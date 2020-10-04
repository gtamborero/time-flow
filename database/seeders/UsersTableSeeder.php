<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        'password' => Hash::make('iProject77'),
        'user_data' => 'informatica, bicicleta',
        'country' => 'spain',
        'city' => 'barcelona',
        'town' => 'barcelona',
        'phone' => '639402399',
        'whatsapp' => '639402399',
        'linkedin' => 'https://www.linkedin.com/in/guillermotamborero/'
        ],
        [
        'id' => 2,
        'name' => 'xavi',
        'email' => 'xavier@iproject.cat',
        'password' => Hash::make('iProject77'),
        'user_data' => 'informatica, bicicleta',
        'country' => 'spain',
        'city' => 'barcelona',
        'town' => 'barcelona',
        'phone' => '639402399',
        'whatsapp' => '639402399',
        'linkedin' => 'https://www.linkedin.com/in/guillermotamborero/'
        ],
        [
        'id' => 3,
        'name' => 'pedro',
        'email' => 'pedro@iproject.cat',
        'password' => Hash::make('iProject77'),
        'user_data' => 'informatica, bicicleta',
        'country' => 'spain',
        'city' => 'barcelona',
        'town' => 'barcelona',
        'phone' => '639402399',
        'whatsapp' => '639402399',
        'linkedin' => 'https://www.linkedin.com/in/guillermotamborero/'
        ],
        [
        'id' => 4,
        'name' => 'jorge',
        'email' => 'jorge@iproject.cat',
        'password' => Hash::make('iProject77'),
        'user_data' => 'informatica, bicicleta',
        'country' => 'spain',
        'city' => 'barcelona',
        'town' => 'barcelona',
        'phone' => '639402399',
        'whatsapp' => '639402399',
        'linkedin' => 'https://www.linkedin.com/in/guillermotamborero/'
        ],
        [
        'id' => 5,
        'name' => 'paco',
        'email' => 'paco@iproject.cat',
        'password' => Hash::make('iProject77'),
        'user_data' => 'informatica, bicicleta',
        'country' => 'spain',
        'city' => 'barcelona',
        'town' => 'barcelona',
        'phone' => '639402399',
        'whatsapp' => '639402399',
        'linkedin' => 'https://www.linkedin.com/in/guillermotamborero/'
        ]

      ]);
    }
}
