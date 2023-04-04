<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\SubCategoria;
use App\Models\SubSubCategoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat1 = new Categoria;
        $cat1->Nombre = "marroquineria";
        $cat1->save();

        $subCat1 = new SubCategoria;
        $subCat1->Nombre = "billetera";
        $subCat1->Categoria = "marroquineria";
        $subCat1->save();
    }
}
