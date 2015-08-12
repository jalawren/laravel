<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class File extends Model
{
    protected $table = 'files';

    protected $fillable = [

        'file_name',
        'file_type_id',
        'file_extension',
        'model',
        'schedule',
        'description'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file_types()
    {
        return $this->belongsTo('App\FileType', 'file_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material()
    {
        return $this->belongsTo('App\Material', 'material_id', 'id');
    }
    /**
     * Concatenate File Name and File Extension
     *
     * @param $value
     * @return string
     */
    public function getFullFileNameAttribute()
    {
        $value = $this->attributes['file_name'] .
            '.'. $this->attributes['file_extension'];

        return strtoupper($value);
    }

    public function scopeData()
    {
        return $this->where('file_type_id', '=', 2);
    }

    /**
     * Check whether files exist in Storage.
     *
     * @param $file
     * @return string
     */
    public function file_exists($file)
    {

        if(Storage::exists($file))
        {
            return 1;
        }
    }


    /**
     * @throws flash
     */
    public function import()
    {
        $file = 'BR_FILES.XLSX';

        if(Storage::exists($file))
        {

            $this->delete();

            Excel::load('/storage/app/'. $file, function ($reader)
            {

                $reader->each(function ($row) {

                    $array = [

                        'file_name'       => $row->file_name,
                        'file_extension'       => $row->file_extension,
                        'file_type_id'       => $row->file_type_id,
                        'model'             => $row->model,
                        'schedule'        => $row->schedule,
                        'description'   => $row->description,
                    ];

                    $this->create($array);
                });
            });

            Session::flash('flash_success', 'Table successfully imported!');
        }
        else
        {
            Session::flash('flash_danger', 'File: '. $file .' does not exist.');
        }


    }
}
