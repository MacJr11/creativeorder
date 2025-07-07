<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Creative;

class CreativeController extends Controller
{
    public function index()
    {
        $creatives = Creative::all();
        return view('creatives', compact('creatives'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);

        Creative::create([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return redirect()->back()->with('success', 'Creative added!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);

        $creative = Creative::findOrFail($id);
        $creative->update([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return redirect()->back()->with('success', 'Creative updated!');
    }

    public function destroy($id)
    {
        $creative = Creative::findOrFail($id);
        $creative->delete();

        return redirect()->back()->with('success', 'Creative deleted!');
    }
}
