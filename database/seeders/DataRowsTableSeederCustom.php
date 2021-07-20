<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class DataRowsTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run() {

        $userDataType = DataType::where('slug', 'users')->firstOrFail();
        $menuDataType = DataType::where('slug', 'menus')->firstOrFail();
        $roleDataType = DataType::where('slug', 'roles')->firstOrFail();
        $permissionDataType = DataType::where('slug', 'permissions')->firstOrFail();

        $dataRow = $this->dataRow($userDataType, 'name');
        $dataRow->fill([
            'type'         => 'text',
            'display_name' => 'Name',
            'required'     => 1,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'validation' => [
                    'rule' => 'required|min:3|max:25'
                ]
            ],
            'order'        => 2,
        ])->save();

        $dataRow = $this->dataRow($userDataType, 'email');
        $dataRow->fill([
            'type'         => 'text',
            'display_name' => 'Email',
            'required'     => 1,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'validation' => [
                    'rule' => 'required|email|min:3|max:25'
                ]
            ],
            'order'        => 3,
        ])->save();

        $dataRow = $this->dataRow($userDataType, 'password');
        $dataRow->fill([
            'type'         => 'password',
            'display_name' => 'Password',
            'required'     => 1,
            'browse'       => 0,
            'read'         => 0,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 0,
            'details'      => [
                'validation' => [
                    'rule' => 'min:8',
                    'edit' => [
                        'rule' => 'nullable'
                    ],
                    'add' => [
                        'rule' => 'required'
                    ]
                ]
            ],
            'order'        => 4,
        ])->save();

        $dataRow = $this->dataRow($userDataType, 'avatar');
        $dataRow->fill([
            'type'         => 'image',
            'display_name' => 'Avatar',
            'required'     => 0,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'order'        => 8,
        ])->save();

        $dataRow = $this->dataRow($menuDataType, 'name');
        $dataRow->fill([
            'type'         => 'text',
            'display_name' => 'Name',
            'required'     => 1,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'validation' => [
                    'rule' => 'required|min:3|max:25'
                ]
            ],
            'order'        => 2,
        ])->save();

        $dataRow = $this->dataRow($roleDataType, 'name');
        $dataRow->fill([
            'type'         => 'text',
            'display_name' => 'Name',
            'required'     => 1,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'validation' => [
                    'rule' => 'required|min:3|max:25'
                ]
            ],
            'order'        => 2,
        ])->save();

        $dataRow = $this->dataRow($roleDataType, 'display_name');
        $dataRow->fill([
            'type'         => 'text',
            'display_name' => 'Display Name',
            'required'     => 1,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'validation' => [
                    'rule' => 'required|min:3|max:25'
                ]
            ],
            'order'        => 5,
        ])->save();

        $dataRow = $this->dataRow($permissionDataType, 'key');
        $dataRow->fill([
            'type'         => 'text',
            'display_name' => 'Key',
            'required'     => 1,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'validation' => [
                    'rule' => 'required|min:3|max:25'
                ]
            ],
            'order'        => 2,
        ])->save();

        $dataRow = $this->dataRow($permissionDataType, 'created_at');
        $dataRow->fill([
            'type'         => 'timestamp',
            'display_name' => 'Created At',
            'required'     => 0,
            'browse'       => 0,
            'read'         => 0,
            'edit'         => 0,
            'add'          => 0,
            'delete'       => 0,
            'order'        => 3,
        ])->save();

        $dataRow = $this->dataRow($permissionDataType, 'updated_at');
        $dataRow->fill([
            'type'         => 'timestamp',
            'display_name' => 'Updated At',
            'required'     => 0,
            'browse'       => 0,
            'read'         => 0,
            'edit'         => 0,
            'add'          => 0,
            'delete'       => 0,
            'order'        => 4,
        ])->save();

        $dataRow = $this->dataRow($permissionDataType, 'table_name');
        $dataRow->fill([
            'type'         => 'text',
            'display_name' => 'Table Name',
            'required'     => 1,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'validation' => [
                    'rule' => 'required|min:3|max:25'
                ]
            ],
            'order'        => 5,
        ])->save();
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }
}
