<?php

namespace App\Http\Controllers;

use App\Bom;
use App\Material;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BomController extends Controller
{
    protected $bom;

    public function __construct(Bom $bom)
    {
        $this->bom = $bom;

        $this->middleware('auth');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->bom->with('component')
            ->where('material', '=', $id)
            ->where('component_quantity', '!=', 100.000)
            ->orderBy('item_number')
            ->get();

    }

    public function showBase($id)
    {
        return $this->bom->with('component')
            ->where('material', '=', $id)
            ->where('component_quantity', '=', 100.000)
            ->orderBy('item_number')
            ->get();

//        return $this->with('component')->where('material', '=', $id)
//            ->whereHas('component', function($query)
//            {
//                $query->where('ext_material_grp', '=', 'CSBS');
//            })->orderBy('item_number')->get();

    }




}
