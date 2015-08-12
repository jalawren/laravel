<?php

use App\Bom;
use Illuminate\Database\Seeder;

class BomTableSeeder extends Seeder
{

    protected $bom;


    public function __construct(Bom $bom)
    {
        $this->bom = $bom;

    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->bom->import();
    }
}
