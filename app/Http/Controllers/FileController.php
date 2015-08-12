<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use App\Import;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
    public function store(FileUploadRequest $request, Import $import)
    {
        $name = $request->input('file_name');
        $file = $request->file('file');
        // Place File in Storage
        Storage::put($name, $file);

        // Back up DB table
        // Run Excel Import Update Database
        // Consistency check
        // Update import table for upload scheduling
        $import->create(['name' => $file->file_name, 'user_id' => Auth::user()->id ]);
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
