<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserAdmin extends BaseController
{
    public function index()
    {
        return view('admin/cadastrar_usuario'); // Exibe o formulário de cadastro
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acesso negado');
        }
        return view('admin/cadastrar_usuario');
    }

    public function cadastrar()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'), // Role pode ser 'admin' ou 'avaliador'
        ];

        $model->save($data);

        return redirect()->to('admin/dashboard')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
