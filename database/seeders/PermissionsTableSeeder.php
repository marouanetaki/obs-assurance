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
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'beneficiaire_create',
            ],
            [
                'id'    => 18,
                'title' => 'beneficiaire_edit',
            ],
            [
                'id'    => 19,
                'title' => 'beneficiaire_show',
            ],
            [
                'id'    => 20,
                'title' => 'beneficiaire_delete',
            ],
            [
                'id'    => 21,
                'title' => 'beneficiaire_access',
            ],
            [
                'id'    => 22,
                'title' => 'dossier_create',
            ],
            [
                'id'    => 23,
                'title' => 'dossier_edit',
            ],
            [
                'id'    => 24,
                'title' => 'dossier_show',
            ],
            [
                'id'    => 25,
                'title' => 'dossier_delete',
            ],
            [
                'id'    => 26,
                'title' => 'dossier_access',
            ],
            [
                'id'    => 27,
                'title' => 'accident_create',
            ],
            [
                'id'    => 28,
                'title' => 'accident_edit',
            ],
            [
                'id'    => 29,
                'title' => 'accident_show',
            ],
            [
                'id'    => 30,
                'title' => 'accident_delete',
            ],
            [
                'id'    => 31,
                'title' => 'accident_access',
            ],
            [
                'id'    => 32,
                'title' => 'prise_create',
            ],
            [
                'id'    => 33,
                'title' => 'prise_edit',
            ],
            [
                'id'    => 34,
                'title' => 'prise_show',
            ],
            [
                'id'    => 35,
                'title' => 'prise_delete',
            ],
            [
                'id'    => 36,
                'title' => 'prise_access',
            ],
            [
                'id'    => 37,
                'title' => 'clinique_create',
            ],
            [
                'id'    => 38,
                'title' => 'clinique_edit',
            ],
            [
                'id'    => 39,
                'title' => 'clinique_show',
            ],
            [
                'id'    => 40,
                'title' => 'clinique_delete',
            ],
            [
                'id'    => 41,
                'title' => 'clinique_access',
            ],
            [
                'id'    => 42,
                'title' => 'medicament_create',
            ],
            [
                'id'    => 43,
                'title' => 'medicament_edit',
            ],
            [
                'id'    => 44,
                'title' => 'medicament_show',
            ],
            [
                'id'    => 45,
                'title' => 'medicament_delete',
            ],
            [
                'id'    => 46,
                'title' => 'medicament_access',
            ],
            [
                'id'    => 47,
                'title' => 'medecin_create',
            ],
            [
                'id'    => 48,
                'title' => 'medecin_edit',
            ],
            [
                'id'    => 49,
                'title' => 'medecin_show',
            ],
            [
                'id'    => 50,
                'title' => 'medecin_delete',
            ],
            [
                'id'    => 51,
                'title' => 'medecin_access',
            ],
            [
                'id'    => 52,
                'title' => 'sante_access',
            ],
            [
                'id'    => 53,
                'title' => 'specialite_create',
            ],
            [
                'id'    => 54,
                'title' => 'specialite_edit',
            ],
            [
                'id'    => 55,
                'title' => 'specialite_show',
            ],
            [
                'id'    => 56,
                'title' => 'specialite_delete',
            ],
            [
                'id'    => 57,
                'title' => 'specialite_access',
            ],
            [
                'id'    => 58,
                'title' => 'facture_create',
            ],
            [
                'id'    => 59,
                'title' => 'facture_edit',
            ],
            [
                'id'    => 60,
                'title' => 'facture_show',
            ],
            [
                'id'    => 61,
                'title' => 'facture_delete',
            ],
            [
                'id'    => 62,
                'title' => 'facture_access',
            ],
            [
                'id'    => 63,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 64,
                'title' => 'can_import',
            ],
            [
                'id'    => 65,
                'title' => 'edit_statut',
            ],
        ];

        Permission::insert($permissions);
    }
}
