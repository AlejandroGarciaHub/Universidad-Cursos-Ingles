<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer(['admin.students.index','admin.students.create','admin.students.edit','admin.students.show',
        'home','login','logout',
        'admin.users.index','admin.users.create','admin.users.edit',
        'admin.generations.index','admin.generations.create','admin.generations.edit',
        'admin.careers.index','admin.careers.create','admin.careers.edit',
        'admin.levels.index','admin.levels.create','admin.levels.edit',
        'admin.aproved_levels.index','admin.aproved_levels.create','admin.aproved_levels.edit',
        'admin.payments.index','admin.payments.create','admin.payments.edit',
        'admin.students.todos',
        'admin.groups.index','admin.groups.create','admin.groups.edit',
        'admin.teachers.index','admin.teachers.create','admin.teachers.edit',
        'admin.group_students.index','admin.group_students.create','admin.group_students.edit','admin.group_students.calificaciones','admin.group_students.pagos'],
        'App\Http\ViewComposers\GenerationComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
