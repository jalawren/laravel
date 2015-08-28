<?php

namespace App\Http\Controllers;

use Auth;
use Cache;
use Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    protected $file;


    public function __construct(File $file)
    {
        $this->file = $file;

        $this->middleware('auth');

//        $this->middleware('permit');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $files = $this->file->data()->get();

        return view('files.index', compact('files'));
    }



    public function import()
    {
        $files = $this->file->data()->get();

        return view('files.import', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function move(Request $request)
    {
        $upload = $request->file('file');

        $filename = $upload->getClientOriginalName();

        $file = str_replace('.XLSX', '', $filename);


        Cache::put($file, $file, 10);

        // Back up DB table
        // Run Excel Import Update Database
        // Consistency check
        // Update import table for upload scheduling
//        $import->create(['name' => $file->file_name, 'user_id' => Auth::user()->id ]);
        // Move file to Archive

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    public function test($file)
    {
        $filename = strtoupper($file);

        return Excel::load('/storage/app/' . $filename . '.XLSX', function ($reader) {

        })->get()->toArray();

    }


}
