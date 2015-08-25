<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerMaterial;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
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
        return $this->customer->where('customer', '=', $id)->firstOrFail();
    }


    /**
     * Return CMIR
     *
     * @param int $customer
     * @param int $material
     * @param object $customer_material
     * @return Response
     */
    public function cmir($customer, $material, CustomerMaterial $customer_material)
    {
        return $customer_material->where('customer', '=', $customer)
            ->where('material', '=', $material)
            ->firstOrFail();
    }


}
