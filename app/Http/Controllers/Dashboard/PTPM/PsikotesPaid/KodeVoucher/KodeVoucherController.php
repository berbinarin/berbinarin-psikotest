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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'      => 'required|string',
            'nama_voucher'  => 'required|string',
            'code'          => 'required',
            'percentage'    => 'required|integer',
            'tipe'          => 'required',
            'detail'        => 'required',
        ]);

        KodeVoucher::create([
            'category'      => $request->category,
            'nama_voucher'  => $request->nama_voucher,
            'code'          => $request->code,
            'percentage'    => $request->percentage,
            'tipe'          => $request->tipe,
            'detail'        => $request->detail,
        ]);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $voucher = KodeVoucher::findOrFail($id);

        $request->validate([
            'category'      => 'required|string|max:100',
            'nama_voucher'  => 'required|string|max:100',
            'code'          => 'required|string|max:100|unique:kode_voucher,code,' . $voucher->id,
            'percentage'    => 'required|integer|min:1|max:100',
            'tipe'          => 'required|string',
            'detail'        => 'required|string',
        ]);

        $voucher->update([
            'category'      => $request->category,
            'nama_voucher'  => $request->nama_voucher,
            'code'          => $request->code,
            'percentage'    => $request->percentage,
            'tipe'          => $request->tipe,
            'detail'        => $request->detail,
        ]);

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
