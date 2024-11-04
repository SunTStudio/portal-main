<?php

namespace App\Http\Controllers\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('struktur.department.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('struktur.department.create');

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
        ]);

        Department::create($validateData);

        return redirect()->route('department')->with('success','Department Baru berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return view('struktur.department.index');

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oldData = Department::find($id);
        return view('struktur.department.edit',compact('oldData'));

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
        $oldData = Department::find($id);
        $validateData = $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $oldData->update($validateData);
        return redirect()->route('department')->with('success', 'Data Department Barhasil Diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Department::find($id);
        $deleteData->delete();
        return redirect()->route('department')->with('success', 'Data Department Barhasil Dihapus!');

    }

    public function departmentData(Request $request)
    {
        $data = Department::all();
        return DataTables::of($data)->make(true);
    }
}