<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ManageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
