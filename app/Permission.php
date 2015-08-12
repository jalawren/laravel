<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Permission extends EntrustPermission
{

    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    public function roles()
    {

        return $this->belongsToMany('App\Role', 'permission_role');
    }



    public function import()
    {
        $file = 'BR_PERMS.XLSX';

        if ( Storage::exists($file))
        {

            $this->delete();

            Excel::load('/storage/app/'. $file, function($reader) {

                $reader->each(function ($row) {

                    $array = [
                        'id'           => $row->id,
                        'name'         => $row->name,
                        'display_name' => $row->display_name,
                        'description'  => $row->description
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
