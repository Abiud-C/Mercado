<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->Nombre = "Supervisor";
        $role->Descripcion = "Encargado de toda la pagina web";
        $role->save();

        $role = new Role();
        $role->Nombre = "Encargado";
        $role->Descripcion = "Encargado de validar productos y usuarios";
        $role->save();

        $role = new Role();
        $role->Nombre = "Contador";
        $role->Descripcion = "Encargado de la contabilidad de la pagina web";
        $role->save();

        $role = new Role();
        $role->Nombre = "Comprador";
        $role->Descripcion = "Puede realizar compras en la pagina";
        $role->save();

        $role = new Role();
        $role->Nombre = "Vendedor";
        $role->Descripcion = "Puede poner a la venta productos";
        $role->save();
    }
}
