<?php

use App\User;
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
        DB::table((new User)->getTable())->truncate();

        User::insert([
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@v-learning.com',
                'password'       => '$2y$10$vBttSPf2uXjCb09Lbo17Z.rCDalvF7vWMEYzviFIdivP4sN6TSRoO',
                'role_id'        => 1,
                'level_id'        => 0         
            ],
        ]);
    }
}
