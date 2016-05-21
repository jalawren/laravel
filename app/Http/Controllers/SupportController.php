<?php

namespace App\Http\Controllers;

use App\Browser;
use Cache;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class SupportController extends Controller
{


    /**
     * Returns View
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('support.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        if (Cache::has('key'))
        {
            $key = Cache::get('key');

            if ($key == $id)
            {
                return view('support.show');
            }
        }
        Session::flash('message', 'key has expired');
        return redirect('/support');
    }

    /**
     * Generate an auth key
     *
     * @return string
     */
    public function generateKey()
    {
        $key = str_random(10);
        Cache::put('key', $key, 1);
        return $key;
    }


    /**
     * API Call for browser data
     *
     * @param Browser $browser
     * @return mixed
     */
    public function browserDetect(Browser $browser)
    {
        return $browser->getInfo();
    }
}
