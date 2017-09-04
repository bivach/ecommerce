<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $product = new \App\Category([
        'name' => 'Alaskan malamute'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Akita Inu'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'BullDog'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => ' Labrador'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Beagle'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => ' Pastor'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Bóxer'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Bull Terrier'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Caniche'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Chow chow'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Collie'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Dogo'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Doberman'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Galgo'
        ]);
      $product->save();
      $product = new \App\Category([
        'name' => 'Jack Russell Terrier'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Gran Danes'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Pitbull'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Rottweiler'
        ]);
      $product->save();

      $product = new \App\Category([
        'name' => 'Terrier'
        ]);
      $product->save();

    }
}
