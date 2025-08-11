<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //disable forgein yang ada ditable
        Schema::disableForeignKeyConstraints();
        //reset table user
        User::truncate();
        //enable forgein yang ada di table
        Schema::enableForeignKeyConstraints();
        $data = [
            [
                'nama_lengkap' => 'Ranggi',
                'email' => 'admin1@gmail.com',
                'password' =>Hash::make('admin123'),
                'hak_akses' => 'admin'

            ],
            [
                'nama_lengkap' => 'Renggi',
                'email' => 'kasir123@gmail.com',
                'password' =>Hash::make('kasir123'),
                'hak_akses' => 'kasir'
            ]
            ];

            //multiple inser ke table user
            foreach ($data as $value) {
                User::create([
                    'nama_lengkap' => $value['nama_lengkap'],
                    'email' => $value['email'],
                    'password' => $value['password'],
                    'hak_akses' => $value['hak_akses'],
                ]);
            }

            // User::create([
            // 'nama_lengkap' => 'lordrangga',
            // 'email' => 'admin3@gmail.com',
            // 'password' => Hash::make(12345),
            // 'hak_akses' => 'admin',

            // ]);

        //input data ke tabel user
        // DB::table('users')->insert([
        //     'nama_lengkap' => 'lordrangga',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make(12345),
        //     'hak_akses' => 'admin',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}

