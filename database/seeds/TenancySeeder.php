<?php

use Illuminate\Database\Seeder;

class TenancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Tenancy::class, 200)->create()->each(function ($ten){
            $ten->gallery()->create(['path'=>'img/imoveis/1/1.jpg']);
            $ten->gallery()->create(['path'=>'img/imoveis/1/2.jpg']);
            $ten->gallery()->create(['path'=>'img/imoveis/1/3.jpg']);
            $ten->gallery()->create(['path'=>'img/imoveis/1/4.jpg']);
            $ten->gallery()->create(['path'=>'img/imoveis/1/5.jpg']);
            $ten->gallery()->create(['path'=>'img/imoveis/1/6.jpg']);
        });
    }
}
