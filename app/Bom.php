<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Bom extends Model
{
    protected $table = 'boms';

    protected $fillable = [
        'material_id',
        'item_number',
        'component_id',
        'component_quantity',
        'component_unit'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'material_id'
    ];

    /**
     * @param $value
     * @return string
     */
    public function getComponentQuantityAttribute($value)
    {
        return number_format($value, 3);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeSales($query)
    {
        return $query->where('bom_usage', '=', '5');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeBase($query)
    {
        return $query->where('component_id', '>=', '57000000')
                        ->where('component_id', '<=', '58000000');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeProduction()
    {
        return $this->where('bom_usage', '=', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material()
    {
        return $this->belongsTo('App\Material', 'material_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function component()
    {
        return $this->belongsTo('App\Material', 'component_id', 'id');
    }


    /**
     * @throws \Exception
     */
    public function import()
    {
        $file = 'ZPTF_BOMDATA5.XLSX';

        if(Storage::exists($file)) {

            $this->delete();

            \Excel::load('/storage/app/'. $file, function ($reader) {

                $reader->each(function ($row) {

                    $array = [
                        'bom_usage'          => $row->bom_usage,
                        'material_id'        => $row->material,
                        'item_number'        => $row->item_number,
                        'component_id'       => $row->component,
                        'component_quantity' => $row->component_quantity,
                        'component_unit'     => $row->component_unit_of_measure
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
