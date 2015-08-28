<?php

namespace App;

use App\Material;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;


class Bom extends Model
{
    protected $table = 'boms';

    protected $filename = 'ZPTF_BOMDATA.XLSX';


    protected $fillable = [
        'material',
        'item_number',
        'component',
        'component_quantity',
        'component_unit_of_measure'
    ];

    protected $hidden = [

        'created_at',
        'updated_at',
        'material',
//        'component'

    ];

    /**
     * @param $value
     * @return string
     */
    public function getComponentQuantityAttribute($value)
    {
        return number_format($value, 3);
    }

    public function base()
    {
        return $this->belongsTo('App\Material', 'material', 'material')
            ->where('materials.ext_material_group', '=', 'CSBS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material()
    {
        return $this->belongsTo('App\Material', 'material', 'material');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function component()
    {
        return $this->belongsTo('App\Material', 'component', 'material');
    }




    /**
     * @throws \Exception
     */
    public function import()
    {
        $this->delete();

        Excel::load('/storage/app/'. $this->filename, function ($reader) {

            $reader->get($this->fillable);

            $reader->each(function ($row) {

                $this->create($row->toArray());
            });

        });
    }
}
