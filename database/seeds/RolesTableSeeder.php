<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new Role)->getTable())->truncate();

        Role::insert([
            [
                'id'    => 1,
                'title' => 'Administrator',
                'description' => ''
            ],
            [
                'id'    => 2,
                'title' => 'User',
                'description' => ''
            ],
        ]);
    }
}
