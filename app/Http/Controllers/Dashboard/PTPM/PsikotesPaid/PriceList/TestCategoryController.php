<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\PriceList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PriceList\TestCategory\StoreTestCategoryRequest;
use App\Http\Requests\Dashboard\PriceList\TestCategory\UpdateTestCategoryRequest;
use App\Models\TestCategory;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValue;

class TestCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testCategories = TestCategory::all();
        return view('dashboard.ptpm_psikotes-paid.price-lists.test-categories.index', compact('testCategories'));
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
    public function store(StoreTestCategoryRequest $request)
    {
        $validateData = $request->validated();
        TestCategory::category($validateData);

        return redirect()->route('dashboard.test-categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TestCategory $testCategory)
    {
        return view('dashboard.ptpm_psikotes-paid.price-lists.test-categories.show', compact('testCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestCategory $testCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestCategoryRequest $request, TestCategory $testCategory)
    {
        $validateData = $request->validated();
        $testCategory->update($validateData);

        return redirect()->route('dashboard.test-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestCategory $testCategory)
    {
        $testCategory->delete();

        return redirect()->route('dashboard.test-categories.index');
    }
}
