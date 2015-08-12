<?php


use App\Conversion;
use Illuminate\Database\Seeder;

class ConversionTableSeeder extends Seeder
{
    protected $conversion;


    public function __construct(Conversion $conversion)
    {
        $this->conversion = $conversion;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->conversion->create(['uom' => 'LB', 'conversion_rate' => '0.454', 'base_uom' => 'KG']);
        Cache::forget('LB');
        Cache::forever('LB', 0.454);
    }
}
