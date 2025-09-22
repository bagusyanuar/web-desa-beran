<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $jsonPath = database_path('seeders/data/users.json');
            $json = File::get($jsonPath);
            $data = json_decode($json, true);
            foreach ($data as $datum) {
                $dataUser = [
                    'id' => $datum['id'],
                    'username' => $datum['username'],
                    'password' => bcrypt($datum['password']),
                ];
                $user = User::updateOrCreate(
                    ['id' => $dataUser['id']],
                    $dataUser
                );
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("error seed users" . $th->getMessage());
        }
    }
}
