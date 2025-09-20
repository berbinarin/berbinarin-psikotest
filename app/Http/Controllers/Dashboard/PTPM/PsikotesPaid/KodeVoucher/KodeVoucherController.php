<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\KodeVoucher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeVoucher;

class KodeVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = KodeVoucher::orderByDesc('id')->get();
        return view('dashboard.ptpm_psikotes-paid.kode_voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vouchers = KodeVoucher::all();
        return view('dashboard.ptpm_psikotes-paid.kode_voucher.create', compact('vouchers'));
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
            'nama_voucher' => 'required',
            'tipe' => 'required|array',
            'detail' => 'required|array',
        ]);
        if (KodeVoucher::where('code', $request->code)->exists()) {
            return redirect()->back()->withInput()->withErrors(['code' => 'Kode voucher sudah digunakan!']);
        }

        $data = $request->all();
        $data['tipe'] = json_encode($request->tipe);
        $data['detail'] = json_encode($request->detail);

        return redirect()->route('dashboard.kode_voucher.index')->with([
            'alert'   => true,
            'type'    => 'success',
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
        $voucher = KodeVoucher::findOrFail($id);
        $vouchers = KodeVoucher::where('id', '!=', $id)->get();
        return view('dashboard.ptpm_psikotes-paid.kode_voucher.edit', compact('voucher', 'vouchers'));
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
            'nama_voucher' => 'required',
            'tipe' => 'required|array',
            'detail' => 'required|array',
        ]);

        if (KodeVoucher::where('code', $request->code)->where('id', '!=', (int)$id)->exists()) {
            return redirect()->back()->withInput()->withErrors(['code' => 'Kode voucher sudah digunakan!']);
        }

        $voucher = KodeVoucher::findOrFail($id);

        $data = $request->all();
        $data['tipe'] = json_encode($request->tipe);
        $data['detail'] = json_encode($request->detail);

        $voucher->update($data);

        return redirect()->route('dashboard.kode_voucher.index')->with([
            'alert'   => true,
            'type'    => 'success',
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
        $voucher = KodeVoucher::findOrFail($id);
        $voucher->delete();

        return redirect()->route('dashboard.kode_voucher.index')->with([
            'alert'   => true,
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Kode voucher berhasil dihapus',
            'icon'    => asset('assets/dashboard/images/success.png'),
        ]);
    }
}
