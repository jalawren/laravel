<?php

use App\Material;
use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{

    protected $material;


    public function __construct(Material $material)
    {
        $this->material = $material;
    }



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->material->import();
    }
}
