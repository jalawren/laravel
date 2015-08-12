<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{

    protected $customer;

    function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->customer->import();
    }
}
