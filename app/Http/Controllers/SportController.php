<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Sport;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::all();
        return view('sports.list', compact('sports'));
    }

    public function create()
    {
        return view('sports.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sports|max:255',
            'description' => 'nullable',
        ]);

        Sport::create($request->all());

        return redirect()->route('sports.index')->with('success', 'Sport created successfully.');
    }

    public function show(Sport $sport)
    {
        return view('sports.show', compact('sport'));
    }

    public function edit(Sport $sport)
    {
        return view('sports.edit', compact('sport'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
            'description' => 'nullable',
        ]);

        $sport = Sport::where('id',$id)->first();
        $sport->update($request->all());

        return redirect()->route('sports.index')->with('success', 'Sport updated successfully.');
    }


    public function destroy($id)
    {
        $id = base64_decode($id);
        $sport = Sport::where('id',$id)->first();
        $sport->delete();
        return redirect()->route('sports.index')->with('success', 'Sport deleted successfully.');
    }
}
