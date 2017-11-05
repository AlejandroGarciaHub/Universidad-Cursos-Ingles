<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

       $users = [
                   ['id' => 1, 'username' => 'MG','email'=>'mg@mg.com','password'=>bcrypt('123'),'type'=>'admin'],
                   ['id' => 2, 'username' => 'Miembro Normal','email'=>'member@member.com','password'=>bcrypt('123'),'type'=>'member']
               ];
       DB::table('users')->insert($users);

       $generations = [
                   ['id' => 1, 'year' => '2012'],
                   ['id' => 2, 'year' => '2013'],
                   ['id' => 3, 'year' => '2014'],
                   ['id' => 4, 'year' => '2015'],
                   ['id' => 5, 'year' => '2016'],
                   ['id' => 6, 'year' => '2017'],
                   ['id' => 7, 'year' => '2018']
               ];
       DB::table('generations')->insert($generations);


       $careers = [
                   ['id' => 1, 'nombre' => 'Ingenieria en Sistemas Computacionales'],
                   ['id' => 2, 'nombre' => 'Ingenieria en Quimica']
               ];
       DB::table('careers')->insert($careers);

       $students = [
                   ['id' => 1, 'nombres' => 'Miguel Alejandro','apellidos'=>'Garcia Piñon','numero_control'=>'13380557','carrera_id'=>'1','generacion_id'=>'1'],
                   ['id' => 2, 'nombres' => 'Ana Maria','apellidos'=>'Hernandez Solis','numero_control'=>'14380450','carrera_id'=>'2','generacion_id'=>'2']
               ];
       DB::table('students')->insert($students);

       $levels = [
                   ['id' => 1, 'descripcion_nivel' => '1 y 2'],
                   ['id' => 2, 'descripcion_nivel' => '3 y 4'],
                   ['id' => 3, 'descripcion_nivel' => '5 y 6'],
                   ['id' => 4, 'descripcion_nivel' => '7 y 8']
               ];
       DB::table('levels')->insert($levels);

       $teachers = [
                   ['id' => 1, 'nombres' => 'Diana Alejandra ','apellidos'=>'Martinez Solis','telefono'=>'8341213516'],
                   ['id' => 2, 'nombres' => 'Carlos Alfredo ','apellidos'=>'de la Torre Fuentes','telefono'=>'8342217516'],
                   ['id' => 3, 'nombres' => 'Mariana','apellidos'=>'Flores Zamora','telefono'=>'8347213552']
               ];
       DB::table('teachers')->insert($teachers);

    }
}
