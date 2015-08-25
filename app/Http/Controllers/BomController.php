<?php

namespace App\Http\Controllers;

use App\Bom;
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
//            ->where('component.prices.customer_id', '=', $customer)
            ->orderBy('item_number')->get();
    }


}
