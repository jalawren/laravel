<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class Material extends Model
{

    protected $table = 'materials';


    protected $fillable = [
        'id',
        'description',
        'material_type',
        'emg',
        'cost',
        'created_at',
        'updated_at'
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeBase($query)
    {
        return $query->where('emg', '=', 'CSBS')
            ->orWhere('emg', '=', 'VLBS');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boms()
    {
        return $this->hasMany('App\Bom', 'material_id', 'id');
    }

    public function prices()
    {
        return $this->hasMany('App\CustomerPrice', 'material_id', 'id');
    }





protected function reader($reader)
{
    $reader->each(function ($row)
    {

        $array = [
            'id'            => $row->material,
            'description'   => $row->material_description,
            'material_type' => $row->mtyp,
            'emg'           => $row->ext_material_grp,
            'cost'          => $row->standard_price,
            'uom'           => $row->bun
        ];

        $this->create($array);
    });
}

    /**
     * @throws \Exception
     */
    public function import()
    {
        $file = 'ZPTF_COSTDATA.XLSX';

        if(Storage::exists($file)) {

            $this->delete();

            Excel::load(storage_path('app/') . $file, function ($reader) {

                $this->reader($reader);
            });

            Session::flash('flash_success', 'Table successfully imported!');
        }
        else {
            Session::flash('flash_danger', 'File: '. $file .' does not exist.');
        }

    }
}
