<?php

namespace App\Http\Controllers;

use App\Import;
use App\Material;
use Cache;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{

    protected $material;


    public function __construct(Material $material)
    {
        $this->material = $material;

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
        $materials = $this->material->all();
        $lb = Cache::get('LB');
        return view('materials.index', compact('materials', 'lb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function excel(Import $import)
    {
       // $this->material->import($import);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->material->find($id);

//        return view('materials.show', compact('material'));
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
