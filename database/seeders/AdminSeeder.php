<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("adminCaridadeValentim!"),
            'permissao' => "admin",
            'username' => "adminValentim2004",
            'photo' => "38290r3287r39h3rn32983jinu.jpg",
            'data_nasc' => date("Y-m-d"),
        ]);
    }
}
