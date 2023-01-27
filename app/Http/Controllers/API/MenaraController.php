<?php

namespace App\Http\Controllers\API;

use App\Models\Menara;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Menara::orderBy('id', 'Desc');
        return $data->when(request('search'), function ($query) {
            $query->where(request('searchField'), 'like', '%' . request('search') . '%');
        })->paginate(5);
    }

    public function menaraall()
    {
        return Menara::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'lokasi' => 'required',
            'altitude' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);
        Menara::create([
            'name' => $request->name,
            'name_menara' => $request->name_menara,
            'email' => $request->email,
            'nomor' => $request->nomor,
            'lokasi' => $request->lokasi,
            'altitude' => $request->altitude,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
        return response()->json(['tersimpan' => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_menara' => 'required',
            'email' => 'required',
            'nomor' => 'required',
            'lokasi' => 'required',
            'altitude' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'name_menara' => $request->name_menara,
            'email' => $request->email,
            'nomor' => $request->nomor,
            'lokasi' => $request->lokasi,
            'altitude' => $request->altitude,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ];
        $ubah = Menara::findOrFail($id);
        $ubah->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Menara::find($id);
        $hapus->delete();
    }
}
