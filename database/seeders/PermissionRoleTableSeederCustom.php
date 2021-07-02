<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run() {
        $superAdminRole = Role::where('name', 'super-admin')->firstOrFail();
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $moderatorRole = Role::where('name', 'moderator')->firstOrFail();
        $developerRole = Role::where('name', 'developer')->firstOrFail();

        $allPermissions = Permission::all();

        $superAdminRole->permissions()->sync(
            $allPermissions->pluck('id')->all()
        );

        $adminRole->permissions()->sync(
            $allPermissions->pluck('id')->all()
        );

        if ($moderatorRole) {
            $moderatorPermissionsFiltered = $allPermissions->filter(function ($moderatorPermission, $key) {
                return !in_array($moderatorPermission->key, [
                    // GENERAL
                    'browse_database',
                    'browse_media',
                    'browse_bread',
                    'browse_compass',
                    'browse_menus',
                    // PAGES
                    'edit_pages',
                    'add_pages',
                    'delete_pages',
                    // ROLES
                    'edit_roles',
                    'add_roles',
                    'delete_roles',
                    // USERS
                    'edit_users',
                    'add_users',
                    'delete_users',
                    // POSTS
                    'edit_posts',
                    'add_posts',
                    'delete_posts',
                    // CATEGORIES
                    'edit_categories',
                    'add_categories',
                    'delete_categories',
                    // SETTINGS
                    'browse_settings',
                    'read_settings',
                    'edit_settings',
                    'add_settings',
                    'delete_settings',
                    // TOOLS
                    'browse_tools',
                    'read_tools',
                    'edit_tools',
                    'add_tools',
                    'delete_tools',
                    // PERMISSIONS
                    'edit_permissions',
                    'add_permissions',
                    'delete_permissions',
                ]);
            });
            $moderatorRole->permissions()->sync(
                $moderatorPermissionsFiltered->pluck('id')->all()
            );
        }

        if ($developerRole) {
            $developerPermissionsFiltered = $allPermissions->filter(function ($developerPermission, $key) {
                return !in_array($developerPermission->key, [
                    // GENERAL
                    'browse_bread',
                    'browse_database',
                    'browse_media',
                    'browse_compass',
                    // MENUS
                    'browse_menus',
                    'read_menus',
                    'edit_menus',
                    'add_menus',
                    'delete_menus',
                    // PAGES
                    'read_pages',
                    'edit_pages',
                    'add_pages',
                    'delete_pages',
                    // ROLES
                    'browse_roles',
                    'read_roles',
                    'edit_roles',
                    'add_roles',
                    'delete_roles',
                    // USERS
                    'browse_users',
                    'read_users',
                    'edit_users',
                    'add_users',
                    'delete_users',
                    // POSTS
                    'browse_posts',
                    'read_posts',
                    'edit_posts',
                    'add_posts',
                    'delete_posts',
                    // CATEGORIES
                    'browse_categories',
                    'read_categories',
                    'edit_categories',
                    'add_categories',
                    'delete_categories',
                    // SETTINGS
                    'browse_settings',
                    'read_settings',
                    'edit_settings',
                    'add_settings',
                    'delete_settings',
                    // PERMISSIONS
                    'browse_permissions',
                    'read_permissions',
                    'edit_permissions',
                    'add_permissions',
                    'delete_permissions',
                ]);
            });
            $developerRole->permissions()->sync(
                $developerPermissionsFiltered->pluck('id')->all()
            );
        }
    }
}
