<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;



























































use DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Teacher::factory()->count(20)->create();

     //  DB::table('teachers')->insert([
     //     'name' => Str::random(10),
     //     'email' => Str::random(10).'@gmail.com',
     //     'password' => Hash::make('password'),
     // ]);


     // $data= [
     //     [
     //         'name' => Str::random(10),
     //         'email' => Str::random(10).'@gmail.com',
     //         'address' => Str::random(30),
     //        // 'address' => bcrypt('password'),
     //     ],
     //     [
     //         'name' => Str::random(10),
     //         'email' => Str::random(10).'@gmail.com',
     //         'address' => Str::random(30),
     //        // 'address' => bcrypt('password'),
     //     ],
     //     [
     //         'name' => Str::random(10),
     //         'email' => Str::random(10).'@gmail.com',
     //         'address' => Str::random(30),
     //        // 'address' => bcrypt('password'),
     //     ],
     //     [
     //         'name' => Str::random(10),
     //         'email' => Str::random(10).'@gmail.com',
     //         'address' => Str::random(30),
     //        // 'address' => bcrypt('password'),
     //     ],
     //     [
     //         'name' => Str::random(10),
     //         'email' => Str::random(10).'@gmail.com',
     //         'address' => Str::random(30),
     //        // 'address' => bcrypt('password'),
     //     ],
     // ];
     //
     // DB::table('teachers')->insert($data);
    }
}
