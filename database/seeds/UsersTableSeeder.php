<?php

use Carbon\Carbon;
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
        $user = \App\User::create([
            'name' => 'super admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'password' => bcrypt('12345678')
        ]);

        $role_admin_id = \App\Role::where('name', 'admin')->value('id');

        $user->roles()->sync([$role_admin_id]);
    }
}