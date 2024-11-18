<?php namespace App\Controllers;

use App\Models\UserModel;

class Inicio extends BaseController
{
    public function index()
    {
        return view('inicio'); // Tela com botões para admin e avaliador
    }

    
    public function authenticate()

{
    $model = new UserModel();
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    $user = $model->where('username', $username)->first();

    if ($user && password_verify($password, $user['password'])) {
        // Sucesso no login
        session()->set(['user_id' => $user['id'], 'role' => $user['role']]);
        
        // Permitir que o avaliador acesse a área do admin
        if ($user['role'] == 'admin') {
            return redirect()->to('/admin/dashboard');
        } elseif ($user['role'] == 'avaliador') {
            return redirect()->to('/avaliador/dashboard');
        }
    } else {
        return redirect()->back()->with('error', 'Credenciais inválidas');
    }
}

}
