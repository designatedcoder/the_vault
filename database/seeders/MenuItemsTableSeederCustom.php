<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run() {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Users',
            'url'     => '',
            'route'   => 'voyager.users.index',
        ]);
        $menuItem->fill([
            'target'     => '_self',
            'icon_class' => 'voyager-person',
            'color'      => null,
            'parent_id'  => null,
            'order'      => 2,
        ])->save();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Roles',
            'url'     => '',
            'route'   => 'voyager.roles.index',
        ]);
        $menuItem->fill([
            'target'     => '_self',
            'icon_class' => 'voyager-lock',
            'color'      => null,
            'parent_id'  => null,
            'order'      => 3,
        ])->save();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Permissions',
            'url'     => '',
            'route'   => 'voyager.permissions.index',
        ]);
        $menuItem->fill([
            'target'     => '_self',
            'icon_class' => 'voyager-key',
            'color'      => null,
            'parent_id'  => null,
            'order'      => 4,
        ])->save();
    }
}
