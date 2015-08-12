<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CustomerMaterial extends Model
{
    protected $table = 'customer_materials';

    protected $fillable = [

        'customer_id',
        'material_id',
        'material',
        'description'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material()
    {
        return $this->belongsTo('App\Material', 'material_id', 'id');
    }

    /**
     * @throws \Exception
     */
    public function import()
    {
        $file = 'ZOTC_VD59.XLSX';

        if(Storage::exists($file)) {

            $this->delete();

            Excel::load('/storage/app/'. $file, function ($reader) {

                $reader->each(function ($row) {

                    $array = [
                        'customer_id'            => $row->customer,
                        'material_id'            => $row->material,
                        'material'   => $row->customer_material_number,
                        'description'   => $row->customers_description_of_material

                    ];

                    $this->create($array);
                });
            });

            Session::flash('flash_success', 'Table successfully imported!');
        }
        else {
            Session::flash('flash_danger', 'File: '. $file .' does not exist.');
        }


    }
}
