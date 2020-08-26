<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $restURL = 'https://b24-qsr7js.bitrix24.com.br/rest/1/nm8f3vki8q5smbqt/';
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
