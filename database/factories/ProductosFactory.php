<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Producto::class;


    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
             'marca' => $this->faker->name(),
             'categoria'=> $this->faker->name(),
             'descripcion'=> $this->faker->text(),
            'precio'=> $this->faker->randomFloat(2, 0, 5000),
            'tipo'=> $this->faker->name(),
            'tono'=> $this->faker->hexcolor(),
            'web'=> $this->faker->url(),
            'ean' => $this->faker->ean13(),
            'id_ultima_modificacion' => 1
        ];
    }
}
