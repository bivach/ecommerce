<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      for ($i=1; $i < 30; $i++) {
        $product = new \App\Product([
          'name' => 'BullDog Ingles 3 meses',
          'price' => 4500.00,
          'imageurl' => 'https://i2.wp.com/www.mundoperro.net/wp-content/uploads/Cachorro-blanco-bulldog-ingles.jpg?w=552&h=480&crop&ssl=1',
          'description' => 'BULLDOG INGLES CACHORROS LISTOS PARA SU ENTREGA, ULTIMA CAMADA EN VENTA  DEBIDO A SU TERCER PARICION DE LA PERRA POR CESARIA',
          'category_id'=> 3,
          'user_id'=> 2
          ]);
        $product->save();

        $product = new \App\Product([
          'name' => ' Labrador 2 meses',
          'price' => 5400.00,
          'imageurl' => 'https://www.petdarling.com/articulos/wp-content/uploads/2015/05/cachorro-labrador-chocolate.jpg',
          'description' => 'Criadero Zakurtegui vende excelentes cachorros LABRADORES, puros, con PEDIGREE . En este momento disponemos de hembras',
          'category_id'=> 4,
          'user_id'=> 1
          ]);
        $product->save();

        $product = new \App\Product([
          'name' => ' Pastor Suizo',
          'price' => 7500.00,
          'imageurl' => 'https://misanimales.com/wp-content/uploads/2015/08/pastor-suizo.jpg',
          'description' => 'Ultimos cachorros pastor blanco suizos edad 58 dias nacidos el 10-03-2017 vacunados dosis segun edad ,,desparacitados',
          'category_id'=> 6,
          'user_id'=> 4
          ]);
        $product->save();

      }
           
    }
}
