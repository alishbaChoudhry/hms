<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Admin Permissions
        |--------------------------------------------------------------------------
        */

        $adminPermissions = [

            // Doctors
            'view doctors',
            'create doctors',
            'edit doctors',
            'delete doctors',

            // Patients
            'view patients',
            'create patients',
            'edit patients',
            'delete patients',

            // Departments
            'view departments',
            'create departments',
            'edit departments',
            'delete departments',

            // Medicines
            'view medicines',
            'create medicines',
            'edit medicines',
            'delete medicines',

            // Symptoms
            'view symptoms',
            'create symptoms',
            'edit symptoms',
            'delete symptoms',

            // Medical Tests
            'view medical tests',
            'create medical tests',
            'edit medical tests',
            'delete medical tests',

            // Dosages
            'view dosages',
            'create dosages',
            'edit dosages',
            'delete dosages',

            // Appointments
            'view appointments',
            'create appointments',
            'edit appointments',
            'delete appointments',

            // Checkups
            'view checkups',
            'create checkups',
            'edit checkups',
            'delete checkups',

            // Prescriptions
            'view prescriptions',
            'create prescriptions',
            'edit prescriptions',
            'delete prescriptions',

            // Patient Notes
            'view patient notes',
            'create patient notes',
            'edit patient notes',
            'delete patient notes',
        ];


        /*
        |--------------------------------------------------------------------------
        | Doctor Permissions
        |--------------------------------------------------------------------------
        */

        $doctorPermissions = [

            // Patients
           'view patients',


            // Appointments
            'view appointments',
            'create appointments',
            'edit appointments',


            // Checkups
            'view checkups',
            'create checkups',
            'edit checkups',

            // Prescriptions
            'view prescriptions',
            'create prescriptions',
            'edit prescriptions',

            // Patient Notes
            'view patient notes',
            'create patient notes',
            'edit patient notes',
        ];


        /*
        |--------------------------------------------------------------------------
        | Create Permissions
        |--------------------------------------------------------------------------
        */

        foreach (array_unique(
            array_merge($adminPermissions, $doctorPermissions)
        ) as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Create Roles
        |--------------------------------------------------------------------------
        */

        $admin = Role::firstOrCreate([
            'name' => 'Admin',
        ]);

        $doctor = Role::firstOrCreate([
            'name' => 'Doctor',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Assign Permissions to Roles
        |--------------------------------------------------------------------------
        */

        $admin->syncPermissions($adminPermissions);

        $doctor->syncPermissions($doctorPermissions);
    }
}