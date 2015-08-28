<?php

namespace App;


use App\Bom;
use App\Customer;
use App\CustomerMaterial;
use App\CustomerPrice;
use App\Material;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class FileManager
{



    protected $column_array = [

        'vcust' => ['customer', 'name_1', 'street', 'city', 'region', 'postal_code', 'country'],
        'zptf_bomdata' => ['material', 'item_number', 'component', 'component_quantity', 'component_unit_of_measure'],
        'zotcr_custprice' => ['sold_to', 'sap_material_number', 'price', 'per', 'uom', 'scale', 'mg4'],
        'zotc_vd59' => ['customer', 'material', 'customer_material_number', 'customers_description_of_material'],
        'zptf_costdata' => ['material', 'material_description', 'mtyp', 'ext_material_grp', 'standard_price']
    ];



    public function check()
    {
        return 1;
    }





    /**
     * Check Cache to see if file exists.
     *
     * @param $file
     * @return int
     */
    protected function checkCache($key)
    {
        if(Cache::has($key)) {

            return Cache::get($key);
        }
        return "not found in cache.";
    }

    /**
     * Return Excel Data to Array.
     *
     * @param $file
     * @return mixed
     */
    public function getExcelFileContents($file, $key)
    {

            $columns = $this->column_array[$key];

            $contents = Excel::load($file, function ($reader) {
            })->get($columns)->toArray();

            Cache::put($key, $contents, 10);

        return "success";
    }

    public function validateKey($key)
    {
        if (isset($key) == true)
        {
            $model = null;

            if ($key == 'vcust')
            {
                $model = new Customer();
            }
            elseif ($key == 'zptf_bomdata')
            {
                $model = new Bom();

            }
            elseif ($key == 'zptf_costdata')
            {
                $model = new Material();
            }
            elseif ($key == 'zotc_vd59')
            {
                $model = new CustomerMaterial();
            }
            elseif ($key == 'zotcr_custprice')
            {
                $model = new CustomerPrice();
            }
        }

        if ($model == null)
        {
            return false;
        }

        return $model;
    }


    /**
     * Import Excel Data into database
     *
     * @param $model
     * @param $file
     */
    public function importExcelData($key)
    {
        if ( $this->validateKey($key) )
        {
            $model = $this->validateKey($key);

            $contents = $this->checkCache($key);


            $model->truncate();

            foreach ($contents as $content):

                $model->create($content);
            endforeach;

            return "success";
        }
    }
}