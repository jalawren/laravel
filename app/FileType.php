<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class FileType extends Model
{
    protected $table = 'file_types';

    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    /**
     * @throws flash
     */
    public function import()
    {
        $file = 'BR_FILETYPES.XLSX';

        if(Storage::exists($file))
        {

            $this->delete();

            Excel::load('/storage/app/'. $file, function ($reader)
            {

                $reader->each(function ($row) {

                    $array = [

                        'id'       => $row->id,
                        'name'       => $row->name,
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
