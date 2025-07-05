<?php

namespace App\Http\Controllers\Dashboard\PTPM;

use App\Http\Controllers\Controller;
use App\Models\PsikotesTool;
use Illuminate\Http\Request;
Use Illuminate\Support\Str;

class PsikotesToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = PsikotesTool::all();
        return view('dashboard.ptpm.psikotes-tools.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PsikotesTool $psikotesTool)
    {
        return view('dashboard.ptpm.psikotes-tools.show', compact('psikotesTool'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PsikotesTool $psikotesTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PsikotesTool $psikotesTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PsikotesTool $psikotesTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function generateToken(PsikotesTool $psikotesTool)
    {
        $tool = PsikotesTool::findOrFail($psikotesTool->id);
        $tool->token = Str::random(8);
        $tool->save();

        return redirect()->back()->with('success', 'Token generated successfully!');
    }
}
