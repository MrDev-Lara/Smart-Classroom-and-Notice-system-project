<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Teacher::create([
        	'name' => 'Md.Abdur Rahman',
        	'email' => 'moniuddin045@gmail.com',
        	'password' => bcrypt(12345678),
        ]);
    }
}
