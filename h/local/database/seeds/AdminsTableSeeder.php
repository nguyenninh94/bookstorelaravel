<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Admin::create([
          'name'=>'Nguyễn Văn Ninh',
          'username'=>'nguyenninh',
          'password'=>bcrypt('12345678'),
          'email'=>'nguyenninhdt94@gmail.com'
        ]);
    }
}
