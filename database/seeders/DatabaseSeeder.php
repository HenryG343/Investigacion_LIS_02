<?php

namespace Database\Seeders;

use App\Models\Productos;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $productos = new Productos();
            $productos->nombre = "Producto ".$i;
            $productos->cantidad = $i * 10;
            $productos->precio = $i * 2.5;
            $productos->descripcion = "Descripcion";
            $productos->imagen = "Producto.jpg";

            $productos->save();
        }
        
        $user = new User();
        $user -> nombre = "Juan";
        $user -> password = bcrypt("1234");
        $user -> email = "juan@correo.com";
        $user -> telefono = "2222-2222";
        $user -> username = "Juan";
        $user -> nacimiento = "2000-01-01";
        $user->save();
    }
}
