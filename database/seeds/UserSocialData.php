<?php

use Illuminate\Database\Seeder;

class UserSocialData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('user_social_data')->insert([
        [
        'id' => 1,
        'phone' => '639402399',
        'whatsapp' => '639402399',
        'linkedin' => 'https://www.linkedin.com/in/guillermotamborero/'
        ],
        [
        'id' => 2,
        'phone' => '739402399',
        'whatsapp' => '739402399',
        'linkedin' => 'https://www.linkedin.com/in/'
        ],
        [
        'id' => 3,
        'phone' => '56464645',
        'whatsapp' => '35353535',
        'linkedin' => 'https://www.linkedin.com/in/ped'
        ],
        [
        'id' => 4,
        'phone' => '639402399d',
        'whatsapp' => '639402399d',
        'linkedin' => 'https://www.linkedin.com/in'
        ],
      ]);
    }
}
