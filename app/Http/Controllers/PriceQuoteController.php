<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceQuoteRequest;
use App\PriceQuote;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PriceQuoteController extends Controller
{

    protected $price_quote;

    public function __construct(PriceQuote $price_quote)
    {
        $this->price_quote = $price_quote;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->price_quote->limit(50)->get();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PriceQuoteRequest $request)
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
        //
    }



}
