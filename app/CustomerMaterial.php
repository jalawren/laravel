<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CustomerMaterial extends Model
{

    protected $table = 'customer_materials';

    protected $filename = 'ZOTC_VD59.XLSX';

    protected $fillable = [

        'customer',
        'material',
        'customer_material_number',
        'customers_description_of_material'

    ];

    protected $hidden = [

        'customer',
        'material',
        'created_at',
        'updated_at'

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
            $this->delete();

            Excel::load('/storage/app/'. $this->filename, function ($reader) {

                $reader->each(function ($row) {

                    $this->create($row->toArray());
                });

            });
    }


    public function import_cmir()
    {
        $file = 'ZOTCR_CUSTPRICE.XLSX';

            $this->delete();

            Excel::load('/storage/app/'. $file, function ($reader) {

                $reader->each(function ($row) {

                    if($row->cmir != "") {

                        $key_array = [
                            'customer_id'                       => $row->sold_to,
                            'material_id'                       => $row->sap_material_number,
                            'customer_material_number'          => $row->cmir,
                            'customers_description_of_material' => $row->cmir_desc
                        ];

                        $this->create($key_array);
                    }
                });

            });
    }
}
