<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles = [
           'Beheerder' => [3, 4, 5, 6 ],
           'Webadmin' => [1, 2, 3, 4, 5, 6],
           'Moderator' => [5, 6],
           'Gebruiker' => [4]
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::create(['name' => $roleName]);

            foreach ($rolePermissions as $permission_id) {
                DB::table('role_has_permission')->insert([
                    'permission_id' => $permission_id,
                    'role_id' => $role->id
                ]);
            }
        }
    }
}
