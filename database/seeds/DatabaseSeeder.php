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
                   ['id' => 1, 'username' => 'Admin','email'=>'admin@admin.com','password'=>bcrypt('123'),'type'=>'admin'],
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
                   ['id' => 1, 'nombres' => 'Armando','apellidos'=>'Fernandez Hernandez','numero_control'=>'13380123','carrera_id'=>'1','generacion_id'=>'1','promedio'=>89],
                   ['id' => 2, 'nombres' => 'Ana Maria','apellidos'=>'Hernandez Solis','numero_control'=>'14380450','carrera_id'=>'2','generacion_id'=>'2','promedio'=>0],
                   ['id' => 3, 'nombres' => 'Carlos Rodrigo','apellidos'=>'Salinas de la Cruz','numero_control'=>'13380651','carrera_id'=>'1','generacion_id'=>'1','promedio'=>0]
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

       $groups = [
                   ['id' => 1, 'nivel_id' => 1,'profesor_id'=>2,'aula'=>'H5','tipo_curso'=>'normal'],
                   ['id' => 2, 'nivel_id' => 2,'profesor_id'=>1,'aula'=>'K2','tipo_curso'=>'normal'],
                   ['id' => 3, 'nivel_id' => 3,'profesor_id'=>3,'aula'=>'J2','tipo_curso'=>'normal'],
                   ['id' => 4, 'nivel_id' => 4,'profesor_id'=>2,'aula'=>'H3','tipo_curso'=>'normal']
               ];
       DB::table('groups')->insert($groups);

       $group_students = [
                   ['id' => 1, 'grupo_id' => 1,'alumno_id'=>1],
                   ['id' => 2, 'grupo_id' => 2,'alumno_id'=>1],
                   ['id' => 3, 'grupo_id' => 3,'alumno_id'=>1],
                   ['id' => 4, 'grupo_id' => 4,'alumno_id'=>1],
                   ['id' => 5, 'grupo_id' => 1,'alumno_id'=>2],
                   ['id' => 6, 'grupo_id' => 3,'alumno_id'=>2]
               ];
       DB::table('group_students')->insert($group_students);

       $aproved_levels = [
                   ['id' => 1, 'calif' => 100,'alumno_grupo_id'=>1,'numero_nivel'=>1],
                   ['id' => 2, 'calif' => 100,'alumno_grupo_id'=>1,'numero_nivel'=>2],
                   ['id' => 3, 'calif' => 80,'alumno_grupo_id'=>2,'numero_nivel'=>3],
                   ['id' => 4, 'calif' => 80,'alumno_grupo_id'=>2,'numero_nivel'=>4],
                   ['id' => 5, 'calif' => 95,'alumno_grupo_id'=>3,'numero_nivel'=>5],
                   ['id' => 6, 'calif' => 95,'alumno_grupo_id'=>3,'numero_nivel'=>6],
                   ['id' => 7, 'calif' => 80,'alumno_grupo_id'=>4,'numero_nivel'=>7],
                   ['id' => 8, 'calif' => 80,'alumno_grupo_id'=>4,'numero_nivel'=>8],
                   ['id' => 9, 'calif' => 88,'alumno_grupo_id'=>5,'numero_nivel'=>1],
                   ['id' => 10, 'calif' => 88,'alumno_grupo_id'=>5,'numero_nivel'=>2],
                   ['id' => 11, 'calif' => 78,'alumno_grupo_id'=>6,'numero_nivel'=>5],
                   ['id' => 12, 'calif' => 78,'alumno_grupo_id'=>6,'numero_nivel'=>6]
               ];
       DB::table('aproved_levels')->insert($aproved_levels);
    }
}
