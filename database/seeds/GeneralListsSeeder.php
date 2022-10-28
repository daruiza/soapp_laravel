<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_lists')->insert(array(
            'name' => 'boolean',
            'value' => 'Si'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'boolean',
            'value' => 'No'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'sexo',
            'value' => 'Masculino'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'sexo',
            'value' => 'Femenino'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'estadocivil',
            'value' => 'Soltero'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'estadocivil',
            'value' => 'Casado'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'estadocivil',
            'value' => 'Divorciado'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'documenttype',
            'value' => 'Cédula Ciudadanía'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'documenttype',
            'value' => 'Cedula Extranjera'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'documenttype',
            'value' => 'Pasaporte'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'documenttype',
            'value' => 'Tarjeta Identidad'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'documenttype',
            'value' => 'NIT'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'employee_state',
            'value' => 'Nuevo'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'employee_state',
            'value' => 'Producción'
        ));
    }
}
