<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        $adminPermissions = [
            'view subject',
            'add subject',
            'edit subject',
            'delete subject',
            'publish subject',
            'deactivate subject',
            'activate subject',
            'view user',
            'add user',
            'edit user',
            'delete user',
            'view student',
            'add student',
            'edit student',
            'delete student',
            'deactivate student',
            'add semester',
            'delete semeter',
            'view semester',
            'edit semester',
            'delete semester',
            'view grade',
            'input grade',
            'edit grade',
            'submit grade',
        ];

        foreach($adminPermissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        
        $registrarPermissions = [
            'view subject',
            'add subject',
            'edit subject',
            'delete subject',
            'view student',
            'add student', 
            'edit student',
            'delete student',
            'add semester',
            'edit semester',
            'view semester',
            'delete semester',
        ];

        $intructorPermissions = [
            'view student',
            'view subject',
            'input grade',
            'view grade',  
        ];

        $role0 = Role::create(['name' => 'Super Admin']);
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'IT admin']);
        $role3 = Role::create(['name' => 'registrar']);
        $role4 = Role::create(['name' => 'faculty']);
        $role5 = Role::create(['name' => 'clerk']);
        $role5 = Role::create(['name' => 'guest']);

    
        $crse1 = \App\Models\Courses::create([
            'crse_name'  => 'BSBA', 
        ]);
        $crse2 = \App\Models\Courses::create([
            'crse_name'  => 'BSIT', 
        ]);
        $crse3 = \App\Models\Courses::create([
            'crse_name'  => 'BSCS', 
        ]);

        $dept1 = \App\Models\Departments::create([
            'dept_name'  => 'Faculty Dept', 
        ]);
        $dept2 = \App\Models\Departments::create([
            'dept_name'  => 'Registrar Dept', 
        ]);
        $dept3 = \App\Models\Departments::create([
            'dept_name'  => 'Facility Dept', 
        ]);
        $dept4 = \App\Models\Departments::create([
            'dept_name'  => 'CCS Dept', 
        ]);
        $dept3 = \App\Models\Departments::create([
            'dept_name'  => 'IT Dept', 
        ]);
        
        
        
        // $dept1 = \App\Models\Departments::create([
        //     'crse_name'  => 'dept1', 
        // ]);
        // $dept2 = \App\Models\Departments::create([
        //     'crse_name'  => 'dept1', 
        // ]);
        // $dept3 = \App\Models\Departments::create([
        //     'crse_name'  => 'dept1', 
        // ]);

        $post1 = \App\Models\Positions::create([
            'post_name'  => 'Instructor', 
        ]);
        $post2 = \App\Models\Positions::create([
            'post_name'  => 'MIS Head', 
        ]);
        $post3 = \App\Models\Positions::create([
            'post_name'  => 'MIS', 
        ]);
        $post4 = \App\Models\Positions::create([
            'post_name'  => 'IT Coordinator', 
        ]);
        $post5 = \App\Models\Positions::create([
            'post_name'  => 'IT', 
        ]);
        $post6 = \App\Models\Positions::create([
            'post_name'  => 'Assistant Registrar', 
        ]);
        $post7 = \App\Models\Positions::create([
            'post_name'  => 'Head Registrar', 
        ]);
        $post8 = \App\Models\Positions::create([
            'post_name'  => 'administrator', 
        ]);


        $sem1 = \App\Models\Semesters::create([
            'semester_year'  => 'SY-2022-2022-1', 
        ]);
        $sem2 = \App\Models\Semesters::create([
            'semester_year'  => 'SY-2022-2022-2', 
        ]);


        $admin = \App\Models\User::create([
            'user_id' => 'administrator',
            'first_name' => 'system',
            'last_name' => 'administrator',
            'middle_name' => 'null',
            'suffix' => 'null',
            'title' => 'administrator',
            'gender' => 'null',
            'birthday' => 'null',
            'email' => 'administrator@example.com',
            'username' => 'administrator',
            'password' => Hash::make('administrator'),
            'role' => $role1->name,
            'post_id' => '8',
            'dept_id' => '1',
            'is_active' => 1
        ]);
        $role1->givePermissionTo($adminPermissions);
        $admin->assignRole($role1);

        $instructor = \App\Models\User::create([
            'user_id' => 'faculty',
            'first_name' => 'instructor',
            'last_name' => 'faculty',
            'middle_name' => 'null',
            'suffix' => 'null',
            'title' => 'instructor',
            'gender' => 'null',
            'birthday' => 'null',
            'email' => 'instructor@example.com',
            'username' => 'instructor',
            'password' => Hash::make('instructor'),
            'role' => $role3->name,
            'post_id' => '8',
            'dept_id' => '1',
            'is_active' => 1
        ]);
        $role3->givePermissionTo($intructorPermissions);
        $instructor->assignRole($role3);


        $registrar = \App\Models\User::create([
            'user_id' => 'registrar',
            'first_name' => 'registrar',
            'last_name' => 'admin',
            'middle_name' => 'null',
            'suffix' => 'null',
            'title' => 'registrar',
            'gender' => 'null',
            'birthday' => 'null',
            'email' => 'registrar@example.com',
            'username' => 'registrar',
            'password' => Hash::make('registrar'),
            'role' => $role4->name,
            'post_id' => '8',
            'dept_id' => '1',
            'is_active' => 1
        ]);
        $role4->givePermissionTo($registrarPermissions);
        $registrar->assignRole($role4);

        $subj1 = \App\Models\Subjects::create([
            'subj_name'  => 'Reading Phil History', 
            'subj_code'  => 'GE102', 
            'subj_description'  => 'Sample Desc', 
            'subj_units'  => '3', 
            'subj_type'  => 'GENED', 
            'subj_section'  => 'GE102', 
            'subj_instructor'  => '1', 
            'sem_id'  => '1',
        ]);

        $subj2 = \App\Models\Subjects::create([
            'subj_name'  => 'Networking Fundamentals', 
            'subj_code'  => 'NET101', 
            'subj_description'  => 'Sample Desc', 
            'subj_units'  => '3', 
            'subj_type'  => 'GENED', 
            'subj_section'  => 'NET101', 
            'subj_instructor'  => '2', 
            'sem_id'  => '1',
        ]);

        $subj3 = \App\Models\Subjects::create([
            'subj_name'  => 'Wika at Kultura', 
            'subj_code'  => 'FIL1', 
            'subj_description'  => 'Sample Desc', 
            'subj_units'  => '3', 
            'subj_type'  => 'GENED', 
            'subj_section'  => 'FIL1-A', 
            'subj_instructor'  => '1', 
            'sem_id'  => '1',
        ]);

        $std1 = \App\Models\Students::create([
            'std_number'  => '201010170',
            'first_name'  => 'Clarissa',
            'middle_name'  => 'M',
            'last_name'  => 'Dela Cruz',
            'course_id'  => '1', 
            'status' => 1
        ]);

        $std2 = \App\Models\Students::create([
            'std_number'  => '201110412',
            'first_name'  => 'Mira',
            'middle_name'  => 'M',
            'last_name'  => 'Malinaw',
            'course_id'  => '1', 
            'status' => 1
        ]);

        $std3 = \App\Models\Students::create([
            'std_number'  => '201110412',
            'first_name'  => 'Cedric',
            'middle_name'  => 'M',
            'last_name'  => 'Malabo',
            'course_id'  => '1', 
            'status' => 1
        ]);

        $clist1 = \App\Models\Classlists::create([
            'student_id'  => '1',
            'subject_id'  => '1',
            'sem_id'  => '1'
        ]);

        $clist2 = \App\Models\Classlists::create([
            'student_id'  => '1',
            'subject_id'  => '2',
            'sem_id'  => '1'
        ]);

        $clist3 = \App\Models\Classlists::create([
            'student_id'  => '1',
            'subject_id'  => '3',
            'sem_id'  => '1'
        ]);

        $clist4 = \App\Models\Classlists::create([
            'student_id'  => '2',
            'subject_id'  => '1',
            'sem_id'  => '1'
        ]);

        $clist5 = \App\Models\Classlists::create([
            'student_id'  => '2',
            'subject_id'  => '2',
            'sem_id'  => '1'
        ]);

        $clist5 = \App\Models\Classlists::create([
            'student_id'  => '2',
            'subject_id'  => '3',
            'sem_id'  => '1'
        ]);

        

        
        // $user = \App\Models\User::create([
        //     'company_id'  => '0',
        //     'first_name'  => 'system',
        //     'last_name'  => 'admin',
        //     'address'  => '8 Quincy Parkway', 
        //     'phone_number'  => '+46 (990) 985-2798',
        //     'username'  => 'administrator', 
        //     'email'  => 'administrator@example.com', 
        //     'password'  => Hash::make('password'),
        //     'role'  => 'system admin',
        // ]);
        // $user->assignRole($role1);

        // $user = \App\Models\User::create([
        //     'company_id'  => '0',
        //     'first_name'  => 'system',
        //     'last_name'  => 'editor',
        //     'address'  => '8 Quincy Parkway', 
        //     'phone_number'  => '+46 (990) 985-2798',
        //     'username'  => 'editor', 
        //     'email'  => 'editor@example.com', 
        //     'password'  => Hash::make('password'),
        //     'role'  => 'system editor',
        // ]);
        // $user->assignRole($role2);

        // $user = \App\Models\User::create([
        //     'company_id'  => '0',
        //     'first_name'  => 'system',
        //     'last_name'  => 'user',
        //     'address'  => '8 Quincy Parkway', 
        //     'phone_number'  => '+46 (990) 985-2798',
        //     'username'  => 'user', 
        //     'email'  => 'user@example.com', 
        //     'password'  => Hash::make('password'),
        //     'role'  => 'system user',
        // ]);
        // $user->assignRole($role3);

       

        // $user = \App\Models\User::create([
        //     'company_id'  => '1', 
        //     'first_name'  => 'company',
        //     'last_name'  => 'admin',
        //     'address'  => '8 Quincy Parkway', 
        //     'phone_number'  => '+46 (990) 985-2798',
        //     'username'  => 'compadmin', 
        //     'email'  => 'compadmin@example.com', 
        //     'password'  => Hash::make('password'),
        //     'role'  => 'company admin',
        // ]);
        // $user->assignRole($role4);

        // $user = \App\Models\User::create([
        //     'company_id'  => '2',  
        //     'first_name'  => 'company',
        //     'last_name'  => 'user',
        //     'address'  => '8 Quincy Parkway', 
        //     'phone_number'  => '+46 (990) 985-2798',
        //     'username'  => 'compuser', 
        //     'email'  => 'compuser@example.com', 
        //     'password'  => Hash::make('password'),
        //     'role'  => 'company user',
        // ]);
        // $user->assignRole($role5);


        
    }
}
