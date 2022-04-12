<?php

namespace App\Http\Controllers\Api\Tag;

use App\Http\Controllers\Controller;
use App\Services\Api\Tag\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
