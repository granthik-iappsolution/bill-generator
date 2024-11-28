<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{

    protected $roles = [
        [
            'name' => 'Super Admin',
            'is_nd' => true,
        ],
        [
            'name' => 'Technician',
            'is_nd' => true
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role) {
            Role::updateOrCreate(['name' => $role['name']], $role);
        }
        $this->command->info('Roles Seeded successfully!');
    }
}
