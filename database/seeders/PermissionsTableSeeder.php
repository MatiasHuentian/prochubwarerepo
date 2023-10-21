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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 37,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 38,
                'title' => 'attachmentsfile_access',
            ],
            [
                'id'    => 39,
                'title' => 'attachments_type_create',
            ],
            [
                'id'    => 40,
                'title' => 'attachments_type_edit',
            ],
            [
                'id'    => 41,
                'title' => 'attachments_type_delete',
            ],
            [
                'id'    => 42,
                'title' => 'attachments_type_access',
            ],
            [
                'id'    => 43,
                'title' => 'attachments_category_create',
            ],
            [
                'id'    => 44,
                'title' => 'attachments_category_edit',
            ],
            [
                'id'    => 45,
                'title' => 'attachments_category_delete',
            ],
            [
                'id'    => 46,
                'title' => 'attachments_category_access',
            ],
            [
                'id'    => 47,
                'title' => 'processes_manual_access',
            ],
            [
                'id'    => 48,
                'title' => 'input_create',
            ],
            [
                'id'    => 49,
                'title' => 'input_edit',
            ],
            [
                'id'    => 50,
                'title' => 'input_delete',
            ],
            [
                'id'    => 51,
                'title' => 'input_access',
            ],
            [
                'id'    => 52,
                'title' => 'glossary_create',
            ],
            [
                'id'    => 53,
                'title' => 'glossary_edit',
            ],
            [
                'id'    => 54,
                'title' => 'glossary_delete',
            ],
            [
                'id'    => 55,
                'title' => 'glossary_access',
            ],
            [
                'id'    => 56,
                'title' => 'process_create',
            ],
            [
                'id'    => 57,
                'title' => 'process_edit',
            ],
            [
                'id'    => 58,
                'title' => 'process_show',
            ],
            [
                'id'    => 59,
                'title' => 'process_delete',
            ],
            [
                'id'    => 60,
                'title' => 'process_access',
            ],
            [
                'id'    => 61,
                'title' => 'process_menu_access',
            ],
            [
                'id'    => 62,
                'title' => 'output_create',
            ],
            [
                'id'    => 63,
                'title' => 'output_edit',
            ],
            [
                'id'    => 64,
                'title' => 'output_delete',
            ],
            [
                'id'    => 65,
                'title' => 'output_access',
            ],
            [
                'id'    => 66,
                'title' => 'obejctives_group_create',
            ],
            [
                'id'    => 67,
                'title' => 'obejctives_group_edit',
            ],
            [
                'id'    => 68,
                'title' => 'obejctives_group_delete',
            ],
            [
                'id'    => 69,
                'title' => 'obejctives_group_access',
            ],
            [
                'id'    => 70,
                'title' => 'risk_access',
            ],
            [
                'id'    => 71,
                'title' => 'control_access',
            ],
            [
                'id'    => 72,
                'title' => 'risks_controls_type_create',
            ],
            [
                'id'    => 73,
                'title' => 'risks_controls_type_edit',
            ],
            [
                'id'    => 74,
                'title' => 'risks_controls_type_delete',
            ],
            [
                'id'    => 75,
                'title' => 'risks_controls_type_access',
            ],
            [
                'id'    => 76,
                'title' => 'risks_controls_frecuency_create',
            ],
            [
                'id'    => 77,
                'title' => 'risks_controls_frecuency_edit',
            ],
            [
                'id'    => 78,
                'title' => 'risks_controls_frecuency_delete',
            ],
            [
                'id'    => 79,
                'title' => 'risks_controls_frecuency_access',
            ],
            [
                'id'    => 80,
                'title' => 'risks_controls_method_create',
            ],
            [
                'id'    => 81,
                'title' => 'risks_controls_method_edit',
            ],
            [
                'id'    => 82,
                'title' => 'risks_controls_method_delete',
            ],
            [
                'id'    => 83,
                'title' => 'risks_controls_method_access',
            ],
            [
                'id'    => 84,
                'title' => 'processes_upgrade_proposal_create',
            ],
            [
                'id'    => 85,
                'title' => 'processes_upgrade_proposal_edit',
            ],
            [
                'id'    => 86,
                'title' => 'processes_upgrade_proposal_show',
            ],
            [
                'id'    => 87,
                'title' => 'processes_upgrade_proposal_delete',
            ],
            [
                'id'    => 88,
                'title' => 'processes_upgrade_proposal_access',
            ],
            [
                'id'    => 89,
                'title' => 'attachment_create',
            ],
            [
                'id'    => 90,
                'title' => 'attachment_edit',
            ],
            [
                'id'    => 91,
                'title' => 'attachment_show',
            ],
            [
                'id'    => 92,
                'title' => 'attachment_delete',
            ],
            [
                'id'    => 93,
                'title' => 'attachment_access',
            ],
            [
                'id'    => 94,
                'title' => 'processes_activity_create',
            ],
            [
                'id'    => 95,
                'title' => 'processes_activity_edit',
            ],
            [
                'id'    => 96,
                'title' => 'processes_activity_show',
            ],
            [
                'id'    => 97,
                'title' => 'processes_activity_delete',
            ],
            [
                'id'    => 98,
                'title' => 'processes_activity_access',
            ],
            [
                'id'    => 99,
                'title' => 'activities_risk_create',
            ],
            [
                'id'    => 100,
                'title' => 'activities_risk_edit',
            ],
            [
                'id'    => 101,
                'title' => 'activities_risk_show',
            ],
            [
                'id'    => 102,
                'title' => 'activities_risk_delete',
            ],
            [
                'id'    => 103,
                'title' => 'activities_risk_access',
            ],
            [
                'id'    => 104,
                'title' => 'activities_risks_politic_create',
            ],
            [
                'id'    => 105,
                'title' => 'activities_risks_politic_edit',
            ],
            [
                'id'    => 106,
                'title' => 'activities_risks_politic_delete',
            ],
            [
                'id'    => 107,
                'title' => 'activities_risks_politic_access',
            ],
            [
                'id'    => 108,
                'title' => 'activities_risks_probability_create',
            ],
            [
                'id'    => 109,
                'title' => 'activities_risks_probability_edit',
            ],
            [
                'id'    => 110,
                'title' => 'activities_risks_probability_delete',
            ],
            [
                'id'    => 111,
                'title' => 'activities_risks_probability_access',
            ],
            [
                'id'    => 112,
                'title' => 'activities_risks_impact_create',
            ],
            [
                'id'    => 113,
                'title' => 'activities_risks_impact_edit',
            ],
            [
                'id'    => 114,
                'title' => 'activities_risks_impact_delete',
            ],
            [
                'id'    => 115,
                'title' => 'activities_risks_impact_access',
            ],
            [
                'id'    => 116,
                'title' => 'activities_risks_cause_create',
            ],
            [
                'id'    => 117,
                'title' => 'activities_risks_cause_edit',
            ],
            [
                'id'    => 118,
                'title' => 'activities_risks_cause_show',
            ],
            [
                'id'    => 119,
                'title' => 'activities_risks_cause_delete',
            ],
            [
                'id'    => 120,
                'title' => 'activities_risks_cause_access',
            ],
            [
                'id'    => 121,
                'title' => 'activities_risks_consequence_create',
            ],
            [
                'id'    => 122,
                'title' => 'activities_risks_consequence_edit',
            ],
            [
                'id'    => 123,
                'title' => 'activities_risks_consequence_show',
            ],
            [
                'id'    => 124,
                'title' => 'activities_risks_consequence_delete',
            ],
            [
                'id'    => 125,
                'title' => 'activities_risks_consequence_access',
            ],
            [
                'id'    => 126,
                'title' => 'risks_control_create',
            ],
            [
                'id'    => 127,
                'title' => 'risks_control_edit',
            ],
            [
                'id'    => 128,
                'title' => 'risks_control_show',
            ],
            [
                'id'    => 129,
                'title' => 'risks_control_delete',
            ],
            [
                'id'    => 130,
                'title' => 'risks_control_access',
            ],
            [
                'id'    => 131,
                'title' => 'processes_kpi_create',
            ],
            [
                'id'    => 132,
                'title' => 'processes_kpi_edit',
            ],
            [
                'id'    => 133,
                'title' => 'processes_kpi_show',
            ],
            [
                'id'    => 134,
                'title' => 'processes_kpi_delete',
            ],
            [
                'id'    => 135,
                'title' => 'processes_kpi_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
