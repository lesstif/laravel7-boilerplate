<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rc = new \App\Helpers\RoleNameConstant;

        $roles = get_class_vars(get_class($rc));

        foreach ($roles as $name => $value) {
            $name = Role::create(['name' => $value]);
        }

        $pm_role = Role::where('name', \App\Helpers\RoleNameConstant::$ROLE_PROJECT_MANAGER)->first();

        $permission = Permission::create([
                'name' => 'edit project',
            ]);

        $pm_role->givePermissionTo($permission);
    }
}
