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

    public function create()
    {
        return view('dashboard.owners.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'surname' => 'required',
        ]);

        Owner::create($attributes);

        return redirect('/dashboard/owners');
    }

    public function edit(Owner $owner)
    {
        return view('dashboard.owners.edit', [
            'owner' => $owner
        ]);
    }

    public function update(Owner $owner)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'surname' => 'required',
        ]);

        $owner->update($attributes);

        return redirect('/dashboard/owners');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return back();
    }
}
