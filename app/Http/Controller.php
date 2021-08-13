<?php

namespace App\Http;

use FunctionalCoding\Illuminate\Http\ControllerTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use ControllerTrait;
    use DispatchesJobs;
    use ValidatesRequests;
}
