<?php namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        // Aqui você pode retornar a view da dashboard do admin
        return view('admin/dashboard');
    }

    public function login()
    {
        return view('login_admin'); // Página de login do admin
    }

    public function authenticate()
    {
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password']) && $user['role'] == 'admin') {
            // Sucesso no login
            session()->set(['user_id' => $user['id'], 'role' => $user['role']]);
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Credenciais inválidas');
        }
    }

   

}
