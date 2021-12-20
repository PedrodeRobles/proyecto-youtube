<?php

namespace App\Http\Controllers;

use App\Models\Comentary;
use Illuminate\Http\Request;

class ComentaryController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'comentary' => 'required'
        ]);

        Comentary::create([
            'user_id' => auth()->user()->id,
        ] + $request->all());

        return redirect()->route('video/{video}');
    }

    public function show(Comentary $comentary)
    {
        //
    }

    public function edit(Comentary $comentary)
    {
        //
    }

    public function update(Request $request, Comentary $comentary)
    {
        //
    }

    public function destroy(Comentary $comentary)
    {
        //
    }
}
