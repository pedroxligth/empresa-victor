<?php namespace App\Controllers;

use App\Models\TrabalhoModel;
use CodeIgniter\Controller;

class TrabalhoController extends Controller
{
    public function index()
{
    $trabalhoModel = new TrabalhoModel();

    // Recupera todos os trabalhos
    $trabalhos = $trabalhoModel->findAll();

    // Passa os trabalhos para a view
    return view('dashboard_admin', ['trabalhos' => $trabalhos]);
}

    public function create()
    {
        // Carrega a view da página de criação de trabalho
        return view('criar_trabalho');
    }

    public function store()
    {
        // Validação dos dados recebidos
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'protocolo' => 'required',
            'resumo' => 'required',
            'curso' => 'required',
            'modelo_avaliativo' => 'required',
            'avaliadores' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Redireciona de volta com os erros de validação
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Obtém os dados do formulário
        $data = [
            'protocolo' => $this->request->getPost('protocolo'),
            'resumo' => $this->request->getPost('resumo'),
            'curso' => $this->request->getPost('curso'),
            'modelo_avaliativo' => $this->request->getPost('modelo_avaliativo'),
            'avaliadores' => $this->request->getPost('avaliadores'),
        ];

        // Instancia o modelo de trabalho
        $trabalhoModel = new TrabalhoModel();

        // Salva os dados no banco
        if ($trabalhoModel->insert($data)) {
            // Redireciona para a página inicial com uma mensagem de sucesso
            return redirect()->to('admin/dashboard')->with('success', 'Trabalho criado com sucesso!');
        } else {
            // Redireciona de volta com uma mensagem de erro
            return redirect()->back()->with('error', 'Erro ao criar o trabalho. Tente novamente.');
        }
    }
    
    
    public function excluir($id)
    {
        // Acessando o banco de dados corretamente
        $db = \Config\Database::connect(); // Aqui você conecta ao banco de dados

        $trabalhoModel = new TrabalhoModel(); // Instancia o modelo

        // Exclui o trabalho
        if ($trabalhoModel->delete($id)) {
            // Após a exclusão, redefine o valor do AUTO_INCREMENT para 1
           

            // Retorna resposta de sucesso
            return $this->response->setJSON(['status' => 'success']);
        } else {
            // Caso haja erro na exclusão
            return $this->response->setJSON(['status' => 'error']);
        }
        

    }
}