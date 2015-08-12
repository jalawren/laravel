<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CustomerPrice extends Model
{
    protected $table = 'customer_prices';

    protected $fillable = [

        'customer_id',
        'material_id',
        'price',
        'price_unit',
        'unit_of_measure',
        'scale',
        'material_group'
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
     * @throws flash
     */
    public function import()
    {
        $file = 'ZOTCR_CUSTPRICE.XLSX';

        if(Storage::exists($file)) {

            $this->delete();

            Excel::load('/storage/app/'. $file, function ($reader) {

                $reader->each(function ($row) {

                    $array = [
                        'customer_id'       => $row->sold_to,
                        'material_id'       => $row->sap_material_number,
                        'price'             => $row->price,
                        'price_unit'        => $row->per,
                        'unit_of_measure'   => $row->uom,
                        'scale'             => $row->scale,
                        'material_group'   => $row->mg4_description

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
