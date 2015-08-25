<?php

namespace App;

use Cache;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class Material extends Model
{

    protected $table = 'materials';

    protected $filename = 'ZPTF_COSTDATA.XLSX';


    protected $fillable = [

        'material',
        'material_description',
        'mtyp',
        'ext_material_grp',
        'standard_price'

    ];

    protected $hidden = [

//        'mtyp',
        'created_at',
        'updated_at'

    ];

    /**
     * Show Bases
     *
     * @param $query
     * @return mixed
     */
    public function scopeBase($query)
    {
        return $query->where('emg', '=', 'CSBS')
            ->orWhere('emg', '=', 'VLBS');
    }

    /**
     * Show 97m Materials
     *
     * @param $query
     * @return mixed
     */
    public function scopeFinished($query)
    {
        return $query->where('mtyp', '=', 'ZBND');
    }

    /**
     * Boms
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boms()
    {
        return $this->hasMany('App\Bom', 'material', 'material');
    }

    /**
     * Prices
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany('App\CustomerPrice', 'sap_material_number', 'material');
    }

    /**
     * CMIR
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customer_material()
    {
        return $this->hasMany('App\CustomerMaterial', 'material', 'material');
    }


    /**
     * Import Excel File.
     */
    public function import()
    {
        $this->delete();

        Excel::load('/storage/app/' . $this->filename, function ($reader) {


            $reader->each(function ($row) {

                $this->create($row->toArray());
            });

        });

        Session::flash('flash_success', 'Table successfully imported!');
    }
}
