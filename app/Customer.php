<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'id',
        'name',
        'street',
        'city',
        'region',
        'postal_code',
        'country'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials()
    {
        return $this->hasMany('App\CustomerMaterial', 'customer_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany('App\CustomerPrice', 'customer_id', 'id');
    }






    /**
     * Import Excel File.
     */
    public  function import()
    {
        $file = 'VCUST.XLSX';

        if(Storage::exists($file)) {

            $this->delete();

            Excel::load(storage_path('app/') . $file, function ($reader) {

                $reader->each(function ($row) {

                    $array = [
                        'id'            => $row->customer,
                        'name'          => $row->name_1,
                        'street'        => $row->street,
                        'city'          => $row->city,
                        'region'        => $row->region,
                        'postal_code'   => $row->postal_code,
                        'country'       => $row->country
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
