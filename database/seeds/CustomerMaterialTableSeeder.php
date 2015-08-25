<?php

use App\CustomerMaterial;
use Illuminate\Database\Seeder;

class CustomerMaterialTableSeeder extends Seeder
{

    protected $customer_material;


    public function __construct(CustomerMaterial $customer_material)
    {
        $this->customer_material = $customer_material;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->customer_material->import();

        $this->customer_material->import_cmir();
    }
}
