<?php

namespace App\Http\Controllers;

use App\Models\Drug;

class DrugController extends Controller
{
    public function index()
    {
        return view('welcome', [

        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|int',
            'description' => 'required|string|max:255',
            'image' => 'required|image|max:2058',
        ]);

        Drug::create([
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'image' => request()->file('image')->store('img/drugs'),
        ]);

        return redirect()->back();
    }
}
