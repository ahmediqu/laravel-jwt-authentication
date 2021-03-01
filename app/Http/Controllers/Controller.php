<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Services\BaseService;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $service;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
