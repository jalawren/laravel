<?php

namespace App;

use Cache;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CustomerPrice extends Model
{
    protected $table = 'customer_prices';

    protected $filename = 'ZOTCR_CUSTPRICE.XLSX';

    protected $fillable = [

        'sold_to',
        'sap_material_number',
        'price',
        'per',
        'uom',
        'scale',
        'mg4'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer', 'sold_to');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material()
    {
        return $this->belongsTo('App\Material', 'material', 'sap_material_number');
    }



    /**
     * Import
     */
    public function import()
    {
        $this->delete();

        Excel::load('/storage/app/'. $this->filename, function ($reader) {

            $reader->each(function ($row) {

                $this->create($row->toArray());
            });

        });
    }


}
