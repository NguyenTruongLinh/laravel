<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \DB::table('admins')->insert([
            'name' => 'Nguyễn Linh',
            'email' => 'nhokkuteo1996@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
