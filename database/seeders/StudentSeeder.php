<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'email' => 'mail@mail.com',
            'name' => 'Hanafi Abdilah',
            'password' => Hash::make('123'),
        ]);
    }
}
