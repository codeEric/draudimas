<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        return view('dashboard.owners.index', [
            'owners' => Owner::all()
        ]);
    }
}
