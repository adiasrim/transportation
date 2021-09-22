<?php

namespace App\Http\Controllers\Api\Transportation;

use App\Http\Controllers\Controller;
use App\Models\Transportation;
use App\Models\User;
use Illuminate\Http\Request;

class TransportationController extends Controller
{
    public function index()
    {
        return Transportation::all();
    }
}
