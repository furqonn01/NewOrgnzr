<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new User();
        $data->name = 'Furqon Nugroho';
        $data->email = 'frqnnugroho@gmail.com';
        $data->password = Hash::make('telkom123');
        $data->level = 'admin';
        $data->save();


        $data = new User();
        $data->name = 'Admin';
        $data->email = 'admin@gmail.com';
        $data->password = Hash::make('password');
        $data->level = 'admin';
        $data->save();


        for ($i=0; $i < 15; $i++) {
            $data = new User();
            $data->name = 'User ' . $i;
            $data->email = 'user' . $i . '@gmail.com';
            $data->password = Hash::make('password');
            $data->level = 'user';
            $data->save();
        }
    }
}
