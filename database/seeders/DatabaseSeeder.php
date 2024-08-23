<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Book;
use App\Models\Author;
use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = User::factory()->count(10)->make();
        DB::table('Usuario')->insert($usuarios->toArray());

        // $estudiantes = Student::factory()->count(10)->make();
        // DB::table('Estudiante')->insert($estudiantes->toArray());

        // $profesores = Teacher::factory()->count(10)->make();
        // DB::table('Profesor')->insert($profesores->toArray());

        // $libros = Book::factory()->count(10)->make();
        // DB::table('Libro')->insert($libros->toArray());

        // $autores = Author::factory()->count(10)->make();
        // DB::table('Autor')->insert($autores->toArray());

        $administradores = Admin::factory()->count(10)->make();
        DB::table('Administrador')->insert($administradores->toArray());

        // $libros = Book::factory()->count(10)->make();
        // DB::table('CAMBIAME')->insert($libros->toArray());
    }
}
