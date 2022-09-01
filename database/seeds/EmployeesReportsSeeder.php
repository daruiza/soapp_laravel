<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_report')->insert(array(
            'employee_id' => '1',
            'report_id' => '1'
        ));

        DB::table('employee_report')->insert(array(
            'employee_id' => '2',
            'report_id' => '2'
        ));
    }
}
