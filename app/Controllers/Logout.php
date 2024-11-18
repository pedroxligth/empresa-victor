<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Logout extends Controller
{
    public function index()
    {
        // Destroi a sessão
        session()->destroy();

        // Redireciona para a página de login
        return redirect()->to('/');
    }
}