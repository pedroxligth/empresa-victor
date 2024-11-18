<?php

namespace App\Controllers;

class SimposioController extends BaseController
{
    public function iniciar()
    {
        // Lógica para iniciar o simpósio (ex: alterar status no banco de dados)
        return view('admin/simposio_iniciar');
    }

    public function terminar()
    {
        // Lógica para terminar o simpósio (ex: alterar status no banco de dados)
        return view('admin/simposio_terminar');
    }
}
