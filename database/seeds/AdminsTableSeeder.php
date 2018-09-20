<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@simpleblog.vn',
            'password' => bcrypt('admin'),
        ]);
    }
}
