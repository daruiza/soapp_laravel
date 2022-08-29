<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert(array(
            'name' => 'Pedro',
            'commerce_id' => null
        ));

        DB::table('employees')->insert(array(
            'name' => 'Jose',
            'commerce_id' => null
        ));
    }
}
