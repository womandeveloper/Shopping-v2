<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        User::create([
            'fullname' => 'Çağla Öztürk',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'activation_key' => Str::random(60),
            'is_active' => 1
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
