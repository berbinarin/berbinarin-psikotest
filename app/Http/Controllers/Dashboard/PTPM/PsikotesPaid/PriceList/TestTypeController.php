<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\PriceList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestType;
use App\Models\TestCategory;
use App\Models\RegistrantProfile;
use Illuminate\Support\Facades\Validator;

class TestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testTypes = TestType::all();
        return view('dashboard.ptpm_psikotes-paid.price-lists.test-types.index', compact('testTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($categoryId)
    {
        $category = TestCategory::findOrFail($categoryId);
        return view('dashboard.ptpm_psikotes-paid.price-lists.test-types.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $categoryId)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            return redirect()->back()->withInput()->with([
                'alert'   => true,
                'type'    => 'error',
                'title'   => 'Form belum lengkap',
                'message' => implode(' ', $messages),
                'icon'    => asset('assets/dashboard/images/error.webp'),
            ]);
        }

        TestType::create([
            'test_category_id' => $categoryId,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.price-list.test-types.by-category', $categoryId)->with([
            'alert'   => true,
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Jenis Tes berhasil ditambahkan.',
            'icon'    => asset('assets/dashboard/images/success.webp'),
        ]);
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
        return view('dashboard.ptpm_psikotes-paid.price-lists.test-types.edit', compact('category', 'testType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categoryId, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            return redirect()->back()->withInput()->with([
                'alert'   => true,
                'type'    => 'error',
                'title'   => 'Form belum lengkap',
                'message' => implode(' ', $messages),
                'icon'    => asset('assets/dashboard/images/error.webp'),
            ]);
        }

        $testType = TestType::findOrFail($id);
        $testType->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.price-list.test-types.by-category', $categoryId)->with([
            'alert'   => true,
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Jenis Tes berhasil diupdate.',
            'icon'    => asset('assets/dashboard/images/success.webp'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($categoryId, $id)
    // {
    //     $testType = TestType::findOrFail($id);
    //     $testType->delete();
    //     return redirect()->route('dashboard.test-types.by-category', $categoryId)->with('success', 'Jenis test berhasil dihapus.');
    // }

    public function destroy($categoryId, $testTypeId)
    {
        $count = RegistrantProfile::where('test_type_id', $testTypeId)->count();
        if ($count > 0) {
            return redirect()->back()->with([
            'alert'   => true,
            'type'    => 'error',
            'title'   => 'Gagal!',
            'message' => 'Data ini tidak bisa dihapus karena masih digunakan di registrant profile.',
            'icon'    => asset('assets/dashboard/images/error.webp'),
        ]);
        }

        $testType = TestType::findOrFail($testTypeId);
        $testType->delete();

        return redirect()->route('dashboard.price-list.test-types.by-category', $categoryId)
            ->with([
            'alert'   => true,
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Jenis Tes berhasil dihapus.',
            'icon'    => asset('assets/dashboard/images/success.webp'),
        ]);
    }

    public function byCategory($categoryId)
    {
        $testTypes = TestType::where('test_category_id', $categoryId)->get();
        $category = TestCategory::findOrFail($categoryId);
        return view('dashboard.ptpm_psikotes-paid.price-lists.test-types.index', compact('testTypes', 'category'));
    }
}
