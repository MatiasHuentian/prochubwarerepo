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
                'title' => 'processes_state_create',
            ],
            [
                'id'    => 28,
                'title' => 'processes_state_edit',
            ],
            [
                'id'    => 29,
                'title' => 'processes_state_delete',
            ],
            [
                'id'    => 30,
                'title' => 'processes_state_access',
            ],
            [
                'id'    => 31,
                'title' => 'propuesta_mejora_access',
            ],
            [
                'id'    => 32,
                'title' => 'upgrade_proposals_state_create',
            ],
            [
                'id'    => 33,
                'title' => 'upgrade_proposals_state_edit',
            ],
            [
                'id'    => 34,
                'title' => 'upgrade_proposals_state_delete',
            ],
            [
                'id'    => 35,
                'title' => 'upgrade_proposals_state_access',
            ],
            [
                'id'    => 36,
                'title' => 'activity_access',
            ],
            [
                'id'    => 37,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 38,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 39,
                'title' => 'attachmentsfile_access',
            ],
            [
                'id'    => 40,
                'title' => 'attachments_type_create',
            ],
            [
                'id'    => 41,
                'title' => 'attachments_type_edit',
            ],
            [
                'id'    => 42,
                'title' => 'attachments_type_show',
            ],
            [
                'id'    => 43,
                'title' => 'attachments_type_delete',
            ],
            [
                'id'    => 44,
                'title' => 'attachments_type_access',
            ],
            [
                'id'    => 45,
                'title' => 'attachments_category_create',
            ],
            [
                'id'    => 46,
                'title' => 'attachments_category_edit',
            ],
            [
                'id'    => 47,
                'title' => 'attachments_category_show',
            ],
            [
                'id'    => 48,
                'title' => 'attachments_category_delete',
            ],
            [
                'id'    => 49,
                'title' => 'attachments_category_access',
            ],
            [
                'id'    => 50,
                'title' => 'processes_manual_access',
            ],
            [
                'id'    => 51,
                'title' => 'input_create',
            ],
            [
                'id'    => 52,
                'title' => 'input_edit',
            ],
            [
                'id'    => 53,
                'title' => 'input_show',
            ],
            [
                'id'    => 54,
                'title' => 'input_delete',
            ],
            [
                'id'    => 55,
                'title' => 'input_access',
            ],
            [
                'id'    => 56,
                'title' => 'glossary_create',
            ],
            [
                'id'    => 57,
                'title' => 'glossary_edit',
            ],
            [
                'id'    => 58,
                'title' => 'glossary_show',
            ],
            [
                'id'    => 59,
                'title' => 'glossary_delete',
            ],
            [
                'id'    => 60,
                'title' => 'glossary_access',
            ],
            [
                'id'    => 61,
                'title' => 'process_create',
            ],
            [
                'id'    => 62,
                'title' => 'process_edit',
            ],
            [
                'id'    => 63,
                'title' => 'process_show',
            ],
            [
                'id'    => 64,
                'title' => 'process_delete',
            ],
            [
                'id'    => 65,
                'title' => 'process_access',
            ],
            [
                'id'    => 66,
                'title' => 'process_menu_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
