<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerAPIController extends Controller
{

    public function index()
    {
        return Owner::all();
    }

    public function create()
    {
        //
    }

    public function store()
    {
        $owner = new Owner();
        $owner->name = request('name');
        $owner->surname = request('surname');
        $owner->save();

        return $owner;
    }

    public function show($id)
    {
        return Owner::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Owner $owner)
    {
        $attributes = [
            'name' => request('name') ?? $owner->name,
            'surname' => request('surname') ?? $owner->surname
        ];

        $owner->update($attributes);

        return $owner;
    }

    public function destroy($id)
    {
        Owner::destroy($id);
        return true;
    }
}
