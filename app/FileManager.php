<?php

namespace App;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class FileManager
{

    protected $results = [];



    public function check()
    {
        //Check file existence, expiration

        return 1;
//        return 0;
    }


}