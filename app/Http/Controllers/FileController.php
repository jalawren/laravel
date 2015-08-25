<?php

namespace App\Http\Controllers;

use Auth;
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

        $this->middleware('permit');
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
        // Place File in Storage
        $filename = $upload->getClientOriginalName();

        Storage::put($filename, $upload);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
