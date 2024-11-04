<?php

namespace App\Console\Commands;

use App\Models\Department;
use App\Models\Detail_departement;
use App\Models\Position;
use App\Models\SubWebsite;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class updateAllDataWebsite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:allWebsite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $subWebsites = SubWebsite::all();
        $UserData = User::all();
        $DeptData = Department::all();
        $DetailDeptData = Detail_departement::all();
        $PositionData = Position::all();
        // foreach($subWebsites as $subWebsite){
            $client = new Client();
            // Menyiapkan data yang akan dikirimkan
            $data = [
                'users' => $UserData->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role, // Pastikan role ada dalam data user
                        'permissions' => $user->permissions, // Tambahkan permissions
                    ];
                }),
                'departments' => $DeptData,
                'detail_departments' => $DetailDeptData,
                'positions' => $PositionData,
            ];

            // Mengirimkan request POST
            $response = $client->post('http://10.14.179.250:4444/api/updateDataAPI', [
                'json' => $data // Menggunakan 'json' untuk otomatis mengatur Content-Type ke application/json
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
        // }
        return 0;
    }
}
