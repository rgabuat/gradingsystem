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


        //subject
        Permission::create(['name' => 'view subject']);
        Permission::create(['name' => 'add subject']);
        Permission::create(['name' => 'edit subject']);
        Permission::create(['name' => 'delete subject']);
        Permission::create(['name' => 'publish subject']);
        Permission::create(['name' => 'deactivate subject']);
        Permission::create(['name' => 'activate subject']);

        //user
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'publish user']);
        Permission::create(['name' => 'deactivate user']);
        Permission::create(['name' => 'activate user']);

        //grades
        Permission::create(['name' => 'view grade']);
        Permission::create(['name' => 'add grade']);
        Permission::create(['name' => 'edit grade']);
        Permission::create(['name' => 'delete grade']);
        Permission::create(['name' => 'submit grade']);
        Permission::create(['name' => 'deactivate grade']);
        Permission::create(['name' => 'activate grade']);

         //semester
         Permission::create(['name' => 'view semester']);
         Permission::create(['name' => 'add semester']);
         Permission::create(['name' => 'edit semester']);
         Permission::create(['name' => 'delete semester']);
         Permission::create(['name' => 'publish semester']);
         Permission::create(['name' => 'deactivate semester']);
         Permission::create(['name' => 'activate semester']);

          //student
          Permission::create(['name' => 'view student']);
          Permission::create(['name' => 'add student']);
          Permission::create(['name' => 'edit student']);
          Permission::create(['name' => 'delete student']);
          Permission::create(['name' => 'publish student']);
          Permission::create(['name' => 'deactivate student']);
          Permission::create(['name' => 'activate student']);


          //permission
          Permission::create(['name' => 'view permission']);
          Permission::create(['name' => 'add permission']);
          Permission::create(['name' => 'edit permission']);
          Permission::create(['name' => 'delete permission']);
          Permission::create(['name' => 'publish permission']);
          Permission::create(['name' => 'deactivate permission']);
          Permission::create(['name' => 'activate permission']);

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'IT admin']);
        $role3 = Role::create(['name' => 'registrar']);
        $role4 = Role::create(['name' => 'faculty']);
        $role5 = Role::create(['name' => 'clerk']);
        $role5 = Role::create(['name' => 'guest']);



        
        

        $crse1 = \App\Models\Courses::create([
            'crse_name'  => 'crse1', 
        ]);
        $crse2 = \App\Models\Courses::create([
            'crse_name'  => 'crse2', 
        ]);
        $crse3 = \App\Models\Courses::create([
            'crse_name'  => 'crse3', 
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

        $subj1 = \App\Models\Subjects::create([
            'subj_name'  => 'Reading Phil History', 
            'subj_code'  => 'GE102', 
            'subj_description'  => 'Sample Desc', 
            'subj_units'  => '3', 
            'subj_type'  => 'GENED', 
            'subj_section'  => 'SECTION1', 
            'subj_instructor'  => '1', 
            'sem_id'  => '1',
        ]);

        $subj2 = \App\Models\Subjects::create([
            'subj_name'  => 'Networking Fundamentals', 
            'subj_code'  => 'NET101', 
            'subj_description'  => 'Sample Desc', 
            'subj_units'  => '3', 
            'subj_type'  => 'GENED', 
            'subj_section'  => 'SECTION1', 
            'subj_instructor'  => '1', 
            'sem_id'  => '1',
        ]);

        $subj3 = \App\Models\Subjects::create([
            'subj_name'  => 'Wika at Kultura', 
            'subj_code'  => 'FIL1', 
            'subj_description'  => 'Sample Desc', 
            'subj_units'  => '3', 
            'subj_type'  => 'GENED', 
            'subj_section'  => 'SECTION1', 
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
            'first_name'  => 'Cedric',
            'middle_name'  => 'M',
            'last_name'  => '2',
            'course_id'  => '1', 
            'status' => 1
        ]);

        $std3 = \App\Models\Students::create([
            'std_number'  => '201110412',
            'first_name'  => 'Cedric',
            'middle_name'  => 'M',
            'last_name'  => '2',
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

        $user = \App\Models\User::create([
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
        $role1->givePermissionTo(Permission::all());
        $user->assignRole($role1);
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
