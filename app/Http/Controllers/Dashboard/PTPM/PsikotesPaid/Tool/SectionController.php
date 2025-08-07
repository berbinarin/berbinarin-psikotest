<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Http\Requests\Dashboard\PriceList\TestType\StoreTestTypeRequest;
use App\Http\Requests\Dashboard\PriceList\TestType\UpdateTestTypeRequest;
use App\Models\TestCategory;
use App\Models\TestType;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tool $tool)
    {
        $tool->load('sections');

        return view('dashboard.ptpm_psikotes-paid.tools.data.sections.index', compact('tool'));
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
    public function store(StoreTestTypeRequest $request, TestCategory $testCategory)
    {
        $validateData = $request->validated();
        $valiatedData['test_category_id'] = $testCategory->id;
        TestType::create($validateData);

        return redirect()->route('dashboard.test-category.show', $testCategory->id);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestTypeRequest $request, TestCategory $testCategory, TestType $testType)
    {
        $validateData = $request->validated();
        $testType->update($validateData);

        return redirect()->route('dashboard.test-categories.show', $testCategory->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestCategory $testCategory, TestType $testType)
    {
        $testType->delete();

        return redirect()->route('dashboard.test-categories.show', $testCategory->id);
    }
}
