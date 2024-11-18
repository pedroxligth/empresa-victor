<?php

namespace App\Controllers;

class TrabalhosController extends BaseController
{
    public function criar()
    {
        // Lógica para exibir o formulário de criação de trabalhos
        return view('admin/criar_trabalhos');
    }

}