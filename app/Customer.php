<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Customer extends Model
{
    protected $table = 'customers';

    protected $filename = 'VCUST.XLSX';

    protected $fillable = [
        'customer',
        'name_1',
        'street',
        'city',
        'region',
        'postal_code',
        'country'
    ];

    protected $hidden = [

        'created_at',
        'updated_at'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials()
    {
        return $this->hasMany('App\CustomerMaterial', 'customer', 'customer');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany('App\CustomerPrice', 'sold_to', 'customer');
    }


    /**
     * Import Excel File.
     */
    public  function import()
    {
        $this->delete();

        Excel::load(storage_path('app/') . $this->filename, function ($reader) {

            $reader->each(function ($row) {

                $this->create($row->toArray());
            });

        });

    }
}
