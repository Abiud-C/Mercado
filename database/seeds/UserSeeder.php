<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_supervisor= Role::where('Nombre','=','Supervisor')->first();
        $role_encargado = Role::where('Nombre','=','Encargado')->first();
        $role_contador = Role::where('Nombre','=','Contador')->first();
        $role_vendedro = Role::where('Nombre','=','Vendedor')->first();
        $role_comprador = Role::where('Nombre','=','Comprador')->first();

        $user = new User();
        $user->name = "Mario";
        $user->paterno ="Esponda";
        $user->materno ="Velasquez";
        $user->email = "MarioSuper@mercado.es";
        $user->password = Hash::make("esponda1102");
        $user->foto = "img/JmiVmxGkQwkGeJkYtcbqZkNk3VGGOpJuk0ZNZr2S.jpeg";
        $user->save();
        $user->roles()->attach($role_supervisor);

        $user = new User();
        $user->name = "Abiud";
        $user->paterno ="Alvarez";
        $user->materno ="Lopez";
        $user->email = "AbiudEncar@mercado.es";
        $user->password = Hash::make("esponda1102");
        $user->foto = "img/JmiVmxGkQwkGeJkYtcbqZkNk3VGGOpJuk0ZNZr2S.jpeg";
        $user->save();
        $user->roles()->attach($role_encargado);
        

        $user = new User();
        $user->name = "Abiud";
        $user->paterno ="Alvarez";
        $user->materno ="Lopez";
        $user->email = "AbiudConta@mercado.es";
        $user->password = Hash::make("esponda1102");
        $user->foto = "img/JmiVmxGkQwkGeJkYtcbqZkNk3VGGOpJuk0ZNZr2S.jpeg";
        $user->save();
        $user->roles()->attach($role_contador);

        $user = new User();
        $user->name = "Marisol";
        $user->paterno ="Orantes";
        $user->materno ="Lopez";
        $user->email = "MarisolO@mercado.es";
        $user->password = Hash::make("cliente111");
        $user->foto = "img/JmiVmxGkQwkGeJkYtcbqZkNk3VGGOpJuk0ZNZr2S.jpeg";
        $user->save();
        $user->roles()->attach($role_vendedro);
        $user->roles()->attach($role_comprador);

        $user = new User();
        $user->name = "Luis";
        $user->paterno ="Chacon";
        $user->materno ="Velasquez";
        $user->email = "luisC@mercado.es";
        $user->password = Hash::make("cliente222");
        $user->foto = "img/JmiVmxGkQwkGeJkYtcbqZkNk3VGGOpJuk0ZNZr2S.jpeg";
        $user->save();
        $user->roles()->attach($role_comprador);
    }
}
