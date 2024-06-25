<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = hash::make('123456');
        $AdminsRecord = [
            ['id'=>1,'name'=>'admin','email'=>'admin@gmail.com','password'=>$password,
              'type'=>'admin','status'=>1] 
        ];
        Admin::insert($AdminsRecord);
    }
}
