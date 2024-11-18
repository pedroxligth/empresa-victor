<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TrabalhoModel;
use App\Models\AvaliacaoOralModel;

class Avaliador extends BaseController
{
    // Método para exibir o dashboard do avaliador
    public function dashboard()
    {
        // Instancia o modelo de Trabalho
        $trabalhoModel = new TrabalhoModel();
        $trabalhos = $trabalhoModel->findAll(); // Busca todos os trabalhos

        // Retorna a view do dashboard com os trabalhos
        return view('avaliador/dashboard', ['trabalhos' => $trabalhos]);

        

    
    }

    // Método para exibir a página de login do avaliador
    public function login()
    {
        return view('login_avaliador'); // Página de login do avaliador
    }
    

    // Método para autenticar o avaliador
    public function authenticate()
    {
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $model->where('username', $username)->first();

        // Verifica se o usuário existe e se a senha está correta
        if ($user && password_verify($password, $user['password'])) {
            // Sucesso no login, inicia a sessão
            session()->set(['user_id' => $user['id'], 'role' => $user['role']]);

            // Redireciona com base no papel do usuário
            return redirect()->to('/avaliador/dashboard');
        } else {
            // Credenciais inválidas
            return redirect()->back()->with('error', 'Credenciais inválidas');
        }
    }

    // Método para logout do avaliador
    public function logout()
    {
        session()->destroy(); // Destrói a sessão
        return redirect()->to('/avaliador/login')->with('success', 'Logout realizado com sucesso.');
    }
    
    public function avaliar()
{
    $trabalhoModel = new \App\Models\TrabalhoModel();
    $avaliacaoModel = new \App\Models\AvaliacaoModel();

    
    // Obtém os dados do POST
    $trabalho_id = $this->request->getPost('trabalho_id');
    $comentario = $this->request->getPost('comentario');
    $notas = [
        'elementosPainel' => $this->request->getPost('elementosPainel'),
        'clarezaInformacoes' => $this->request->getPost('clarezaInformacoes'),
        'autoresDescritores' => $this->request->getPost('autoresDescritores'),
        'distribuicaoInformacoes' => $this->request->getPost('distribuicaoInformacoes'),
        'apresentacao' => $this->request->getPost('apresentacao'),
        'pensamentoCientifico' => $this->request->getPost('pensamentoCientifico'),
        'habilidade' => $this->request->getPost('habilidade'),
        'clareza' => $this->request->getPost('clareza'),
        'minuciosidade' => $this->request->getPost('minuciosidade'),
        'conclusao' => $this->request->getPost('conclusao')
    ];

    // Calcular a média
    $media = array_sum($notas) / count($notas);

    // Salvar a avaliação no banco de dados
    $avaliacaoModel->save([
        'trabalho_id' => $trabalho_id,
        'elementosPainel' => $notas['elementosPainel'],
        'clarezaInformacoes' => $notas['clarezaInformacoes'],
        'autoresDescritores' => $notas['autoresDescritores'],
        'distribuicaoInformacoes' => $notas['distribuicaoInformacoes'],
        'apresentacao' => $notas['apresentacao'],
        'pensamentoCientifico' => $notas['pensamentoCientifico'],
        'habilidade' => $notas['habilidade'],
        'clareza' => $notas['clareza'],
        'minuciosidade' => $notas['minuciosidade'],
        'conclusao' => $notas['conclusao'],
        'media' => $media,
        'comentario' => $comentario
    ]);

    // Atualizar o trabalho para marcar como avaliado
    $trabalhoModel->update($trabalho_id, ['avaliado' => 1]);

    // Redireciona de volta para a dashboard com uma mensagem de sucesso
    return redirect()->to('avaliador/dashboard')->with('message', 'Trabalho avaliado com sucesso!');
}

        public function avaliarOral()
        {

            $trabalhoModel = new \App\Models\TrabalhoModel();
            $AvaliacaoOralModel = new \App\Models\AvaliacaoOralModel();
            

            // Obtém os dados do POST
            $trabalho_id = $this->request->getPost('trabalho_id');
            $comentario = $this->request->getPost('comentario');
            $notas = [
                'introducao_clareza_objetividade' => $this->request->getPost('introducao_clareza_objetividade'),
                'habilidade_organizacao_logica' => $this->request->getPost('habilidade_organizacao_logica'),
                'repeticoes_digressoes' => $this->request->getPost('repeticoes_digressoes'),
                'clareza_minuciosidade' => $this->request->getPost('clareza_minuciosidade'),
                'conclusao_objetiva' => $this->request->getPost('conclusao_objetiva'),
                'independencia_raciocinio' => $this->request->getPost('independencia_raciocinio'),
                'tempo_satisfatorio' => $this->request->getPost('tempo_satisfatorio'),
            ];

            // Calcular a média
            $media = array_sum($notas) / count($notas);

            // Salvar a avaliação no banco de dados
            $AvaliacaoOralModel->save([
                'trabalho_id' => $trabalho_id,
                'introducao_clareza_objetividade' => $notas['introducao_clareza_objetividade'],
                'habilidade_organizacao_logica' => $notas['habilidade_organizacao_logica'],
                'repeticoes_digressoes' => $notas['repeticoes_digressoes'],
                'clareza_minuciosidade' => $notas['clareza_minuciosidade'],
                'conclusao_objetiva' => $notas['conclusao_objetiva'],
                'independencia_raciocinio' => $notas['independencia_raciocinio'],
                'tempo_satisfatorio' => $notas['tempo_satisfatorio'],
                'media' => $media,
                'comentario' => $comentario
            ]);

            // Atualizar o trabalho para marcar como avaliado
            $trabalhoModel->update($trabalho_id, ['avaliado' => 1]);

            // Redireciona de volta para a dashboard com uma mensagem de sucesso
            return redirect()->to('avaliador/dashboard')->with('message', 'Trabalho avaliado com sucesso!');
        }


        // Controller
       
}

        
        

