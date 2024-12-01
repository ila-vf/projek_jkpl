<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;


class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = Outlet::where('id', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('alamat', 'like', "%$katakunci%")
                ->orWhere('hotline', 'like', "%$katakunci%")
                ->orWhere('email', 'like', "%$katakunci%")
                ->orderBy('id')
                ->paginate($jumlahbaris);
        } else {
            $data = Outlet::orderBy('id')
            ->paginate($jumlahbaris);
        }
        return view('outlet.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        Session::flash('hotline', $request->hotline);
        Session::flash('email', $request->hotline);

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'hotline' => 'required',
            'email' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'hotline.required' => 'Hotline wajib diisi',
            'email.required' => 'Email wajib diisi',
        ]);

        Outlet::create($request->all());

        return redirect()->to('outlet')->with('success', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Outlet::where('id', $id)->first();
        return view('outlet.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Outlet::where('id', $id)->first();
        return view('outlet.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'hotline' => 'required',
            'email' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'hotline.required' => 'Hotline wajib diisi',
            'email.required' => 'Email wajib diisi',
        ]);
        $data = [
            'nama'=> $request->nama,
            'alamat' => $request->alamat,
            'hotline'=> $request->hotline,
            'email'=> $request->email,
        ];
        Outlet::where('id', $id)->update($data);
        return redirect()->route('outlet.index')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Outlet::where('id', $id)->delete();
        return redirect()->to('outlet')->with('success', 'berhasil menghapus data');
    }
}
