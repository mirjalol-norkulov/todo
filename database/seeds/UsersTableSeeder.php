<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * use     *
     * @return void
     */
    public function run()
    {
        app('service')
            ->repository('user')
            ->create([
                'name' => 'John Doe',
                'email' => 'john.doe@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('123456789')
            ]);
    }
}
