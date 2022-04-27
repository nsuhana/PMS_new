<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Route;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function isAdminRequest()
    {
        return Route::current()->getPrefix() === 'admin/';
    }

    public function isPublicSearchRequest()
    {
        return basename(URL::previous()) === 'search';

        // return URL::previous
        // $x = URL::previous();
        // dd(basename($x, "/").PHP_EOL);
        // return Route::current()->uri() === 'search';
    }
}
