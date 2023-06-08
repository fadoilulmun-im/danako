<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setResponse(
        $data = null, 
        $message = null,
        $code = 200
    ){
        return setResponse($data, $message, $code, ($_GET['removeMeta'] ?? null) == 'true' ? false : true);
    }
}
