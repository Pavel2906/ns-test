<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserRolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminEmail = 'admin@admin.com';
        $isAdminExist = DB::table('users')
            ->where('email', $adminEmail)
            ->exists();

        if (!$isAdminExist) {
            User::factory()->unverified()->create([
                'name' => 'Admin',
                'email' => $adminEmail,
                'password' => 'admin123',
                'role' => UserRolesEnum::ADMIN->value,
            ]);
        }
    }
}
