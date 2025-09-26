<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\VoucherCode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VoucherCode;

class VoucherCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = VoucherCode::orderByDesc('id')->get();
        return view('dashboard.ptpm_psikotes-paid.voucher-code.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vouchers = VoucherCode::all();
        return view('dashboard.ptpm_psikotes-paid.voucher-code.create', compact('vouchers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'code' => 'required',
            'percentage' => 'required',
            'name' => 'required',
            'voucher_type' => 'required|array',
            'detail' => 'required|array',
        ]);
        if (VoucherCode::where('code', $request->code)->exists()) {
            return redirect()->back()->withInput()->withErrors(['code' => 'Kode voucher sudah digunakan!']);
        }

        $data = $request->all();
        $data['voucher_type'] = json_encode($request->voucher_type);
        $data['detail'] = json_encode($request->detail);

        VoucherCode::create($data);
        return redirect()->route('dashboard.voucher-code.index')->with([
            'alert'   => true,
            'voucher_type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Kode voucher berhasil ditambahkan.',
            'icon'    => asset('assets/dashboard/images/success.png'),
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
    public function edit(string $id)
    {
        $voucher = VoucherCode::findOrFail($id);
        $vouchers = VoucherCode::where('id', '!=', $id)->get();
        return view('dashboard.ptpm_psikotes-paid.voucher-code.edit', compact('voucher', 'vouchers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'code' => 'required',
            'percentage' => 'required',
            'name' => 'required',
            'voucher_type' => 'required|array',
            'detail' => 'required|array',
        ]);

        if (VoucherCode::where('code', $request->code)->where('id', '!=', (int)$id)->exists()) {
            return redirect()->back()->withInput()->withErrors(['code' => 'Kode voucher sudah digunakan!']);
        }

        $voucher = VoucherCode::findOrFail($id);

        $data = $request->all();
        $data['voucher_type'] = json_encode($request->voucher_type);
        $data['detail'] = json_encode($request->detail);

        $voucher->update($data);

        return redirect()->route('dashboard.voucher-code.index')->with([
            'alert'   => true,
            'voucher_type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Kode voucher berhasil diupdate.',
            'icon'    => asset('assets/dashboard/images/success.png'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $voucher = VoucherCode::findOrFail($id);
        $voucher->delete();

        return redirect()->route('dashboard.voucher-code.index')->with([
            'alert'   => true,
            'voucher_type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Kode voucher berhasil dihapus',
            'icon'    => asset('assets/dashboard/images/success.png'),
        ]);
    }
}
