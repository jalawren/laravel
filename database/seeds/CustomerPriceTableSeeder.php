<?php

use App\CustomerPrice;
use Illuminate\Database\Seeder;

class CustomerPriceTableSeeder extends Seeder
{

    protected $customer_price;


    public function __construct(CustomerPrice $customer_price)
    {
        $this->customer_price = $customer_price;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->customer_price->import();
    }
}
