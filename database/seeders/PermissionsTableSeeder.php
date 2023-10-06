<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'tablas_maestra_access',
            ],
            [
                'id'    => 19,
                'title' => 'direction_create',
            ],
            [
                'id'    => 20,
                'title' => 'direction_edit',
            ],
            [
                'id'    => 21,
                'title' => 'direction_delete',
            ],
            [
                'id'    => 22,
                'title' => 'direction_access',
            ],
            [
                'id'    => 23,
                'title' => 'dependency_create',
            ],
            [
                'id'    => 24,
                'title' => 'dependency_edit',
            ],
            [
                'id'    => 25,
                'title' => 'dependency_delete',
            ],
            [
                'id'    => 26,
                'title' => 'dependency_access',
            ],
            [
                'id'    => 27,
                'title' => 'process_access',
            ],
            [
                'id'    => 28,
                'title' => 'processes_state_create',
            ],
            [
                'id'    => 29,
                'title' => 'processes_state_edit',
            ],
            [
                'id'    => 30,
                'title' => 'processes_state_delete',
            ],
            [
                'id'    => 31,
                'title' => 'processes_state_access',
            ],
            [
                'id'    => 32,
                'title' => 'propuesta_mejora_access',
            ],
            [
                'id'    => 33,
                'title' => 'upgrade_proposals_state_create',
            ],
            [
                'id'    => 34,
                'title' => 'upgrade_proposals_state_edit',
            ],
            [
                'id'    => 35,
                'title' => 'upgrade_proposals_state_delete',
            ],
            [
                'id'    => 36,
                'title' => 'upgrade_proposals_state_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
