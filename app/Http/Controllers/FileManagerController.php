<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FileManager;

class FileManagerController extends Controller
{

    protected $file_manager;

    public function __construct(FileManager $file_manager) {

        $this->file_manager = $file_manager;

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
        return view('files.index');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');

        $orig_file_name = $file->getClientOriginalName();

        $key = strtolower(str_replace('.XLSX', '', $orig_file_name));

        $this->file_manager->getExcelFileContents($file, $key);


        // Back up DB table
        // Run Excel Import Update Database
        // Consistency check
        // Update import table for upload scheduling
//        $import->create(['name' => $file->file_name, 'user_id' => Auth
//::user()->id ]);
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
