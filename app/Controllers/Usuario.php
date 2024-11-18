<?php namespace App\Controllers;

use App\Models\UserModel;

class Usuario extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['usuarios'] = $model->findAll(); // Busca todos os usuários cadastrados
        return view('usuarios', $data); // Passa os dados para a view
    }
}
