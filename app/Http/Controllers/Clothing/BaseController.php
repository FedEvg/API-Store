<?php

namespace App\Http\Controllers\Clothing;

use App\Http\Controllers\Controller;
use App\Services\ClothingService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ClothingService $service)
    {
        $this->service = $service;
    }
}
