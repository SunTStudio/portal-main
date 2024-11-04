<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Detail_departement;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ImportController extends Controller
{
    public function importRole(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathName());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Lewati baris pertama jika itu adalah header
        foreach ($rows as $index => $row) {
            if ($index < 2) {
                continue;
            }
            Role::updateOrCreate(['name' => $row[1]],[ 'name' => $row[1] , 'guard_name' => $row[2]]);
        }

        return back()->with('success', 'Data berhasil diimport!');
    }

    public function importPermissions(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathName());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Lewati baris pertama jika itu adalah header
        foreach ($rows as $index => $row) {
            if ($index < 2) {
                continue;
            }
            Permission::updateOrCreate(['name' => $row[1]],[ 'name' => $row[1] , 'guard_name' => $row[2]]);
        }

        return back()->with('success', 'Data berhasil diimport!');
    }

    public function importUsers(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathName());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();
        // Lewati baris pertama jika itu adalah header
        foreach ($rows as $index => $row) {
            if ($index < 2) {
                continue;
            }
            $dept = Department::where('name', $row[8])->first();
            $detailDept = Detail_departement::where('name', $row[10])->first();
            $position = Position::where('position', $row[9])->first();

            User::updateOrCreate(
                ['npk' => $row[3]],
                [
                'name' => $row[1],
                'email' => $row[2],
                'username' => $row[4],
                'password' => bcrypt($row[12]),
                'tgl_lahir' => $row[7],
                'gender' => $row[5],
                'tgl_masuk' => $row[6],
                'dept_id' => $dept->id,
                'detail_dept_id' => $detailDept->id,
                'position_id' => $position->id,
                'golongan' => $row[11],
                'npk' => $row[3],
            ]);
        }

        return back()->with('success', 'Data berhasil diimport!');
    }
}
