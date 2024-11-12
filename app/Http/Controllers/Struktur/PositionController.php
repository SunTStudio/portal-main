<?php

namespace App\Http\Controllers\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\SubWebsite;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function sinkron_status()
    {
        SubWebsite::query()->update(['status' => false]);
    }
    public function index()
    {
        if(!auth()->user()->hasRole('Admin')){
            return back()->with('error','Anda Tidak Mempunyai Akses Halaman Ini!');
        }
        return view('struktur.position.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasRole('Admin')){
            return back()->with('error','Anda Tidak Mempunyai Akses Halaman Ini!');
        }
        return view('struktur.position.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'position' => 'required',
            'code' => 'required',
        ]);

        Position::create($validateData);
        $this->sinkron_status();
        return redirect()->route('position')->with('success','Posisi Ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->hasRole('Admin')){
            return back()->with('error','Anda Tidak Mempunyai Akses Halaman Ini!');
        }
        $oldData = Position::find($id);
        return view('struktur.position.edit',compact('oldData'));

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
        $oldData = Position::find($id);
        $validateData = $request->validate([
            'position' => 'required',
            'code' => 'required',
        ]);
        $oldData->update($validateData);
        $this->sinkron_status();
        return redirect()->route('position')->with('success','Posisi Berhasil diPerbarui!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasRole('Admin')){
            return back()->with('error','Anda Tidak Mempunyai Akses Halaman Ini!');
        }
        $deleteData = Position::find($id);
        $deleteData->delete();
        $this->sinkron_status();
        return redirect()->route('position')->with('success','Posisi Berhasil diHapus!');

    }

    public function positionData(Request $request)
    {
        $data = Position::all();
        return DataTables::of($data)->make(true);
    }
}
