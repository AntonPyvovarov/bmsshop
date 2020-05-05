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
        $data = [


            [   'name' => 'Pyvovarov Anton',
                'email'=> 'author@g.g',
                'password' => bcrypt('123'),
                'admin'=>'1'

            ],
            [   'name' => 'Pyvovarov Anton',
                'email'=> 'anton@g.g',
                'password' => bcrypt('123'),
                'admin'=>'0'

            ],

        ];
        \DB::table('users')->insert($data);
    }
}
