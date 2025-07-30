<?php

namespace App\Http\Controllers\Dashboard\PTPM\Tool;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = Tool::all();
        return view('dashboard.ptpm_psikotes-paid.tools.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.ptpm.tools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no_alat_test' => 'required|string|max:50|unique:tools,no_alat_test',
        ]);

        $tool = new Tool();
        $tool->name = $validated['name'];
        $tool->no_alat_test = $validated['no_alat_test'];
        $tool->token = Str::random(8);
        $tool->save();

        return redirect()->route('dashboard.tools.index')->with('success', 'Alat test berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        return view('dashboard.ptpm.tools.show', compact('tool'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        // Tampilkan form edit dengan data dari database
        return view('dashboard.ptpm.tools.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no_alat_test' => 'required|string|max:50|unique:tools,no_alat_test,' . $tool->id,
        ]);

        $tool->name = $validated['name'];
        $tool->no_alat_test = $validated['no_alat_test'];
        $tool->save();

        return redirect()->route('dashboard.tools.index')->with('success', 'Alat test berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        $tool->delete();
        return redirect()->route('dashboard.tools.index')->with('success', 'Alat test berhasil dihapus.');
    }

    /**
     * generate token for psikotes tool
     */
    public function generateToken(Tool $tool)
    {
        $tool = Tool::findOrFail($tool->id);
        $tool->token = Str::random(8);
        $tool->save();

        return redirect()->back()->with('success', 'Token generated successfully!');
    }
}
