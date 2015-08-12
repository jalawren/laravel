<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UserTableSeeder::class);
         $this->call(FileTableSeeder::class);
         $this->call(MaterialTableSeeder::class);
         $this->call(CustomerTableSeeder::class);
         $this->call(CustomerMaterialTableSeeder::class);
//         $this->call(CustomerPriceTableSeeder::class);
//         $this->call(BomTableSeeder::class);
         $this->call(ConversionTableSeeder::class);

        Model::reguard();
    }
}
