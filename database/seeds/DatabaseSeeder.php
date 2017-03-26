<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsuarioSeeder::class);
      $this->call(FuncionSeeder::class);
      $this->call(RolSeeder::class);
      $this->call(TareaSeeder::class);
      $this->call(UsuarioTareaSeeder::class);
      $this->call(TareaRolSeeder::class);
    }
}
