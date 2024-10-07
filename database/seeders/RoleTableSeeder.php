<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create(['name' => 'admin']);
       Role::create(['name' => 'user']);
        
        

    //    $adminRole->givePermissionTo([
    //     'create-user',
    //     'edit-user',
    //     'delete-user',
    //     'create-product',
    //     'edit-product',
    //     'delete-product'
    // ]);
    }
}
