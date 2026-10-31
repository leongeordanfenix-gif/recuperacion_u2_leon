<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autor;
use App\Models\Libro;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear los 3 autores exigidos
        $a1 = Autor::create([
            'nombres'          => 'Gabriel Garcia Marquez',
            'nacionalidad'     => 'Colombiana',
            'email'            => 'gabriel@email.com',
            'fecha_nacimiento' => '1927-03-06',
            'biografia'        => 'Premio Nobel de Literatura en 1982.',
            'estado'           => true,
        ]);

        $a2 = Autor::create([
            'nombres'          => 'Mario Vargas Llosa',
            'nacionalidad'     => 'Peruana',
            'email'            => 'mario@email.com',
            'fecha_nacimiento' => '1936-03-28',
            'biografia'        => 'Premio Nobel de Literatura en 2010.',
            'estado'           => true,
        ]);

        $a3 = Autor::create([
            'nombres'          => 'Isabel Allende',
            'nacionalidad'     => 'Chilena',
            'email'            => 'isabel@email.com',
            'fecha_nacimiento' => '1942-08-02',
            'biografia'        => 'Escritora chilena con nacionalidad estadounidense.',
            'estado'           => true,
        ]);

        // 2. Crear los 10 libros distribuidos entre los 3 autores
        $libros = [
            ['autor_id' => $a1->id, 'titulo' => 'Cien anos de soledad', 'isbn' => '978-0307474728', 'anio_publicacion' => 1967, 'precio' => 45.00, 'paginas' => 471, 'editorial' => 'Editorial Sudamericana', 'idioma' => 'Español', 'stock' => 15],
            ['autor_id' => $a1->id, 'titulo' => 'El amor en los tiempos del colera', 'isbn' => '978-0307387264', 'anio_publicacion' => 1985, 'precio' => 50.00, 'paginas' => 384, 'editorial' => 'Oveja Negra', 'idioma' => 'Español', 'stock' => 10],
            ['autor_id' => $a1->id, 'titulo' => 'Crónica de una muerte anunciada', 'isbn' => '978-1400034956', 'anio_publicacion' => 1981, 'precio' => 35.00, 'paginas' => 120, 'editorial' => 'Bruguera', 'idioma' => 'Español', 'stock' => 8],
            ['autor_id' => $a2->id, 'titulo' => 'La ciudad y los perros', 'isbn' => '978-8420471830', 'anio_publicacion' => 1963, 'precio' => 40.00, 'paginas' => 448, 'editorial' => 'Seix Barral', 'idioma' => 'Español', 'stock' => 12],
            ['autor_id' => $a2->id, 'titulo' => 'La fiesta del Chivo', 'isbn' => '978-8466338318', 'anio_publicacion' => 2000, 'precio' => 55.00, 'paginas' => 520, 'editorial' => 'Alfaguara', 'idioma' => 'Español', 'stock' => 6],
            ['autor_id' => $a2->id, 'titulo' => 'Conversación en La Catedral', 'isbn' => '978-8420471892', 'anio_publicacion' => 1969, 'precio' => 48.00, 'paginas' => 736, 'editorial' => 'Seix Barral', 'idioma' => 'Español', 'stock' => 5],
            ['autor_id' => $a2->id, 'titulo' => 'Los cachorros', 'isbn' => '978-8420472400', 'anio_publicacion' => 1967, 'precio' => 30.00, 'paginas' => 112, 'editorial' => 'Lumen', 'idioma' => 'Español', 'stock' => 20],
            ['autor_id' => $a3->id, 'titulo' => 'La casa de los espiritus', 'isbn' => '978-0307474729', 'anio_publicacion' => 1982, 'precio' => 42.00, 'paginas' => 496, 'editorial' => 'Plaza & Janés', 'idioma' => 'Español', 'stock' => 14],
            ['autor_id' => $a3->id, 'titulo' => 'Paula', 'isbn' => '978-0060927219', 'anio_publicacion' => 1994, 'precio' => 38.00, 'paginas' => 368, 'editorial' => 'HarperCollins', 'idioma' => 'Español', 'stock' => 9],
            ['autor_id' => $a3->id, 'titulo' => 'Largo petalo de mar', 'isbn' => '978-1984899156', 'anio_publicacion' => 2019, 'precio' => 52.00, 'paginas' => 384, 'editorial' => 'Plaza & Janés', 'idioma' => 'Español', 'stock' => 11],
        ];

        foreach ($libros as $libro) {
            Libro::create($libro);
        }
    }
}
