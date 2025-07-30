<?php

namespace App\Http\Controllers\Dashboard\PTPM\PriceList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestType;
use App\Models\TestCategory;

class TestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testTypes = TestType::all();
        return view('dashboard.ptpm.price-lists.test-types.index', compact('testTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($categoryId)
    {
        $category = TestCategory::findOrFail($categoryId);
        return view('dashboard.ptpm.price-lists.test-types.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $categoryId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
        TestType::create([
            'test_category_id' => $categoryId,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return redirect()->route('dashboard.test-types.by-category', $categoryId)->with('success', 'Jenis test berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($categoryId, $id)
    {
        $category = TestCategory::findOrFail($categoryId);
        $testType = TestType::findOrFail($id);
        return view('dashboard.ptpm.price-lists.test-types.edit', compact('category', 'testType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categoryId, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
        $testType = TestType::findOrFail($id);
        $testType->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return redirect()->route('dashboard.test-types.by-category', $categoryId)->with('success', 'Jenis test berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryId, $id)
    {
        $testType = TestType::findOrFail($id);
        $testType->delete();
        return redirect()->route('dashboard.test-types.by-category', $categoryId)->with('success', 'Jenis test berhasil dihapus.');
    }

    public function byCategory($categoryId)
    {
        $testTypes = TestType::where('test_category_id', $categoryId)->get();
        $category = TestCategory::findOrFail($categoryId);
        return view('dashboard.ptpm.price-lists.test-types.index', compact('testTypes', 'category'));
    }
}
