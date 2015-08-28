<?php

namespace App\Http\Controllers;

use App\CustomerMaterial;
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




    public function getByCustomer(CustomerMaterial $customer_material, $id)
    {
        return $customer_material->with('customer', 'material.boms.component')
            ->where('customer', '=', $id)
            ->firstOrFail();
    }



    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import()
    {
        $this->material->truncate();

        $this->material->import();

        return redirect()->route('ZD00');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->material->where('material', '=', $id)->firstOrFail();

//        return view('materials.show', compact('material'));
    }


}
