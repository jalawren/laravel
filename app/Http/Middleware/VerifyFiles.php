<?php

namespace App\Http\Middleware;

use App\FileManager;
use Closure;
use Flash;

class VerifyFiles
{

    protected $files;

    public function __construct(FileManager $files)
    {
        $this->files = $files;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($this->files->check() == 0) {

            Flash::error('There are files that need to be imported');

            return redirect()->route('ZFM00');
        }

        return $next($request);
    }
}
