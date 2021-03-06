<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.io',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('adminadmin'),
            'remember_token' => Str::random(10),
            'permission' => 'admin',
        ]);

    }
}
