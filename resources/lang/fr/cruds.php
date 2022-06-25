<?php

return [
    'userManagement' => [
        'title'          => 'Gestion des utilisateurs',
        'title_singular' => 'Gestion des utilisateurs',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Titre',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Rôles',
        'title_singular' => 'Rôle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Titre',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'date_naissance'           => 'Date Naissance',
            'date_naissance_helper'    => ' ',
            'entreprise'               => 'Entreprise',
            'entreprise_helper'        => ' ',
        ],
    ],
    'beneficiaire' => [
        'title'          => 'Beneficiaires',
        'title_singular' => 'Beneficiaire',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'nom'                   => 'Nom Complet',
            'nom_helper'            => ' ',
            'date_naissance'        => 'Date Naissance',
            'date_naissance_helper' => ' ',
            'lien_parente'          => 'Lien Parenté',
            'lien_parente_helper'   => ' ',
            'statut'                => 'Statut',
            'statut_helper'         => ' ',
            'document'              => 'Document Justificatif',
            'document_helper'       => '(Acte de naissance, Acte de marriage...)',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'created_by'            => 'Adhérent',
            'created_by_helper'     => ' ',
        ],
    ],
    'dossier' => [
        'title'          => 'Dossiers Médicaux',
        'title_singular' => 'Dossiers Médicaux',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'beneficiaire'              => 'Bénéficiaire',
            'beneficiaire_helper'       => ' ',
            'date_soins'                => 'Date Soins',
            'date_soins_helper'         => ' ',
            'frais_consultation'        => 'Frais Consultation',
            'frais_consultation_helper' => ' ',
            'frais_analyse'             => 'Frais Analyses',
            'frais_analyse_helper'      => ' ',
            'frais_pharmacie'           => 'Frais Pharmacie',
            'frais_pharmacie_helper'    => ' ',
            'statut'                    => 'Statut dossier',
            'statut_helper'             => ' ',
            'documents'                 => 'Documents',
            'documents_helper'          => 'Images justificatif (Analyses, médicaments, Radios...)',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'created_by'                => 'Adhérent',
            'created_by_helper'         => ' ',
            'medicament'                => 'Medicament',
            'medicament_helper'         => ' ',
            'num_dossier'               => 'Numero Dossier',
            'num_dossier_helper'        => ' ',
        ],
    ],
    'accident' => [
        'title'          => 'Accidents de travail',
        'title_singular' => 'Accidents de travail',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'lieu'              => 'Lieu d\'accident',
            'lieu_helper'       => ' ',
            'heure'             => 'Heure d\'accident',
            'heure_helper'      => ' ',
            'cause'             => 'Commentaire',
            'cause_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Adhérent',
            'created_by_helper' => ' ',
        ],
    ],
    'prise' => [
        'title'          => 'Prises en charge',
        'title_singular' => 'Prises en charge',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'beneficiaire'          => 'Bénéficiaire',
            'beneficiaire_helper'   => ' ',
            'type_operation'        => 'Type Operation',
            'type_operation_helper' => ' ',
            'document'              => 'Dossier Pc',
            'document_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'created_by'            => 'Adhérent',
            'created_by_helper'     => ' ',
            'clinique'              => 'Clinique',
            'clinique_helper'       => ' ',
            'statut'                => 'Statut',
            'statut_helper'         => ' ',
        ],
    ],
    'clinique' => [
        'title'          => 'Cliniques',
        'title_singular' => 'Clinique',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nom'               => 'Nom Clinique',
            'nom_helper'        => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'telephone'         => 'Telephone',
            'telephone_helper'  => ' ',
            'adresse'           => 'Adresse',
            'adresse_helper'    => ' ',
            'ville'             => 'Ville',
            'ville_helper'      => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'medicament' => [
        'title'          => 'Medicaments',
        'title_singular' => 'Medicament',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'nom'                 => 'Nom',
            'nom_helper'          => ' ',
            'presentation'        => 'Presentation',
            'presentation_helper' => ' ',
            'prix'                => 'Prix',
            'prix_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'code'                => 'Code',
            'code_helper'         => ' ',
            'taux'                => 'Taux Remboursé',
            'taux_helper'         => ' ',
        ],
    ],
    'medecin' => [
        'title'          => 'Médecins',
        'title_singular' => 'Médecin',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nom'               => 'Nom',
            'nom_helper'        => ' ',
            'prenom'            => 'Prenom',
            'prenom_helper'     => ' ',
            'adress'            => 'Adresse professionnelle',
            'adress_helper'     => ' ',
            'ville'             => 'Ville',
            'ville_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'specialite'        => 'Specialite',
            'specialite_helper' => ' ',
        ],
    ],
    'sante' => [
        'title'          => 'Santé',
        'title_singular' => 'Santé',
    ],
    'specialite' => [
        'title'          => 'Specialités',
        'title_singular' => 'Specialité',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'libelle'           => 'Libelle',
            'libelle_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'facture' => [
        'title'          => 'Factures',
        'title_singular' => 'Facture',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'dossier'                => 'Dossier',
            'dossier_helper'         => ' ',
            'frais_rembourse'        => 'Frais Remboursé',
            'frais_rembourse_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'created_by'             => 'Adhérent',
            'created_by_helper'      => ' ',
            'mode_paiement'          => 'Mode de Paiement',
            'mode_paiement_helper'   => ' ',
        ],
    ],
];
