<?php

namespace App\Http\Controllers\API;

use App\Models\Menara;
use App\Mail\SendEmail;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use PDF;

class TagihanController extends Controller
{

    public function index()
    {
        $data = Menara::query()->join('tagihans', 'tagihans.menara_id', '=', 'menaras.id');
        return $data->when(request('search'), function ($query) {
            $query->where(request('searchField'), 'like', '%' . request('search') . '%');
        })->where('tagihans.status', 'Belum Lunas')->orderBy('menaras.id', 'Desc')->paginate(5);
    }
    public function tagihanLunas()
    {
        $data = Menara::query()->join('tagihans', 'tagihans.menara_id', '=', 'menaras.id');
        return $data->when(request('search'), function ($query) {
            $query->where(request('searchField'), 'like', '%' . request('search') . '%');
        })->where('tagihans.status', 'Lunas')->orderBy('menaras.id', 'Desc')->paginate(5);
    }

    public function sendEmail($email)
    {
        $data = Menara::join('tagihans', 'tagihans.menara_id', '=', 'menaras.id')->where('menaras.email', $email)->first();
        $hasil = Mail::to($email)->send(new SendEmail($data));
        return $hasil;
    }

    public function bayar($id)
    {
        $data = [
            'status' => 'Lunas'
        ];
        $bayar = Tagihan::findOrFail($id);
        $bayar->update($data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'menara_id' => 'required',
            'tarif' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);
        Tagihan::create([
            'menara_id' => $request->menara_id,
            'tarif' => $request->tarif,
            'status' => 'Belum Lunas',
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);
        return response()->json(['tersimpan' => false]);
    }

    public function printPdf($id)
    {
        $data = Menara::join('tagihans', 'tagihans.menara_id', '=', 'menaras.id')->where('tagihans.id', $id)->get();
        view()->share('data', $data);
        $pdf = PDF::loadView('pdf/printPdf');
        return $pdf->download('Pembayaran.pdf');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'menara_id' => 'required',
            'tarif' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);
        $data = [
            'menara_id' => $request->menara_id,
            'tarif' => $request->tarif,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ];
        $ubah = Tagihan::findOrFail($id);
        $ubah->update($data);
    }


    public function destroy($id)
    {
        $hapus = Tagihan::find($id);
        $hapus->delete();
    }
}
