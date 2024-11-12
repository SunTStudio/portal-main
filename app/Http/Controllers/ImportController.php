<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Detail_departement;
use App\Models\Position;
use App\Models\SubWebsite;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ImportController extends Controller
{
    private function sinkron_status()
    {
        SubWebsite::query()->update(['status' => false]);
    }
    public function importRole(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        try {
            $file = $request->file('file');
            $spreadsheet = IOFactory::load($file->getPathName());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Lewati baris pertama jika itu adalah header
            foreach ($rows as $index => $row) {
                if ($index < 2) {
                    continue;
                }
                Role::updateOrCreate(['name' => $row[1]], ['name' => $row[1], 'guard_name' => $row[2]]);
            }

        $this->sinkron_status();
        return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }

    public function importPermissions(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        try {
            $file = $request->file('file');
            $spreadsheet = IOFactory::load($file->getPathName());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Lewati baris pertama jika itu adalah header
            foreach ($rows as $index => $row) {
                if ($index < 2) {
                    continue;
                }
                Permission::updateOrCreate(['name' => $row[1]], ['name' => $row[1], 'guard_name' => $row[2]]);
            }

        $this->sinkron_status();
        return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }

    public function importUsers(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        try {
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
                    ],
                );
            }

        $this->sinkron_status();
        return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }

    public function importDepartment(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        try {
            $file = $request->file('file');
            $spreadsheet = IOFactory::load($file->getPathName());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Lewati baris pertama jika itu adalah header
            foreach ($rows as $index => $row) {
                if ($index < 2) {
                    continue;
                }
                Department::updateOrCreate(
                    ['name' => $row[1]],
                    [
                        'name' => $row[1],
                        'code' => $row[2],
                    ],
                );
            }

        $this->sinkron_status();
        return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }

    public function importDetailDepartment(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        try {
            $file = $request->file('file');
            $spreadsheet = IOFactory::load($file->getPathName());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Lewati baris pertama jika itu adalah header
            foreach ($rows as $index => $row) {
                if ($index < 2) {
                    continue;
                }

                $department = Department::where('name', $row[2])->first();
                if ($department != null) {
                    Detail_departement::updateOrCreate(
                        ['name' => $row[1]],
                        [
                            'departement_id' => $department->id,
                            'name' => $row[1],
                            'code' => $row[3],
                        ],
                    );
                }
            }

        $this->sinkron_status();
        return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            // Tangkap error dan kembalikan pesan error
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }

    public function importPosition(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        try {
            $file = $request->file('file');
            $spreadsheet = IOFactory::load($file->getPathName());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Lewati baris pertama jika itu adalah header
            foreach ($rows as $index => $row) {
                if ($index < 2) {
                    continue;
                }
                Position::updateOrCreate(
                    ['position' => $row[1]],
                    [
                        'position' => $row[1],
                        'code' => $row[2],
                    ],
                );
            }

        $this->sinkron_status();
        return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data:' . $e->getMessage());
        }
    }
}
