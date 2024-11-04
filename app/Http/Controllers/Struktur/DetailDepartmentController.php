<?php

namespace App\Http\Controllers\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Detail_departement;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DetailDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('struktur.detail_department.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('struktur.detail_department.create',compact('departments'));

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
            'name' => 'required',
            'code' => 'required',
            'departement_id' => 'required',
        ]);
        Detail_departement::create($validateData);
        return redirect()->route('detail.department')->with('success','Detail Department Berhasil ditambahkan!');
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
        $oldData = Detail_departement::find($id);
        $departments = Department::all();
        return view('struktur.detail_department.edit',compact('departments','oldData'));
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
        $oldData = Detail_departement::find($id);
        $validateData = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'departement_id' => 'required',
        ]);

        $oldData->update($validateData);
        return redirect()->route('detail.department')->with('success','Detail Department Berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Detail_departement::find($id);
        $deleteData->delete();
        return redirect()->route('detail.department')->with('success','Detail Department Berhasil dihapus!');;
    }

    public function detailDepartmentData(Request $request)
    {
        $data = Detail_departement::with('department')->get();
        return DataTables::of($data)->make(true);
    }
}
