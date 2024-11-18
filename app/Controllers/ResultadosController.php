<?php

namespace App\Controllers;

class ResultadosController extends BaseController
{
    public function index()
    {
        // Lógica para exibir os resultados do simpósio
        return view('admin/resultados');
    }
}
