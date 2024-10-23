<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'code' => 'MKT',
            'name' => 'Marketing',
        ]);

        Department::create([
            'code' => 'PE',
            'name' => 'Process Engineering',
        ]);

        Department::create([
            'code' => 'PRODENG',
            'name' => 'Product Engineering',
        ]);

        Department::create([
            'code' => 'PROD',
            'name' => 'Produksi',
        ]);

        Department::create([
            'code' => 'HRGAEI',
            'name' => 'HRGA EHS IT',
        ]);

        Department::create([
            'code' => 'PUR',
            'name' => 'Purchasing',
        ]);

        Department::create([
            'code' => 'FA',
            'name' => 'Finance',
        ]);

        Department::create([
            'code' => 'QUALITY',
            'name' => 'Quality',
        ]);

        Department::create([
            'code' => 'PPIC',
            'name' => 'Product Plan Inventory Control',
        ]);

        Department::create([
            'code' => 'ME',
            'name' => 'Maintenance Engineering',
        ]);

        Department::create([
            'code' => 'BOD',
            'name' => 'Board Of Director',
        ]);

        Department::create([
            'code' => 'PPM',
            'name' => 'PRODPPICME',
        ]);

        Department::create([
            'code' => 'PEQA',
            'name' => 'PEQUALITY',
        ]);

        Department::create([
            'code' => 'PM',
            'name' => 'PEME',
        ]);

        Department::create([
            'code' => 'QA',
            'name' => 'Quality Assurance',
        ]);

    }
}
