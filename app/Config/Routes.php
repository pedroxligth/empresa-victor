<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

// Instancia as rotas
$routes = Services::routes();

// Carrega o arquivo de rotas do sistema
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

// Define o namespace padrão
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Inicio'); // Controlador padrão
$routes->setDefaultMethod('index'); // Método padrão

// Rota para a página inicial
$routes->get('/', 'Inicio::index'); // Acessa a página inicial

// Rota para o login do admin
$routes->get('login', 'Admin::login'); // Página de login do admin
$routes->post('login/authenticate', 'Admin::authenticate'); // Rota para autenticação do admin

// Rota para o login do avaliador
$routes->get('avaliador', 'Avaliador::login'); // Página de login do avaliador
$routes->post('avaliador/authenticate', 'Avaliador::authenticate'); // Rota para autenticação do avaliador

// Rota para as dashboards
$routes->get('admin/dashboard', 'Admin::dashboard'); // Página da dashboard do admin
$routes->get('avaliador/dashboard', 'Avaliador::dashboard'); // Página da dashboard do avaliador

// Rota para ver resumos aprovados
$routes->get('resumos', 'Resumos::index'); // Página para ver resumos aprovados

// Rota para ver os usuários cadastrados
$routes->get('usuarios', 'Usuario::index'); // Página para ver usuários cadastrados

$routes->get('simposio/iniciar', 'SimposioController::iniciar'); // Rota para iniciar simpósio
$routes->get('simposio/terminar', 'SimposioController::terminar'); // Rota para terminar simpósio

$routes->get('trabalhos/criar', 'TrabalhosController::criar'); // Rota para criar trabalhos


$routes->get('resultados', 'ResultadosController::index'); // Rota para ver os resultados

$routes->get('usuarios', 'Usuario::index'); // Rota para ver avaliadores cadastrados

$routes->get('avaliacao', 'AvaliacaoController::index');

$routes->get('useradmin', 'UserAdmin::index'); // Página de cadastro de usuários
$routes->post('useradmin/cadastrar', 'UserAdmin::cadastrar'); // Ação para cadastrar o usuário

// Rota para exibir a página de criação de trabalho
$routes->get('criar-trabalho', 'TrabalhoController::create');

// Rota para processar o formulário de criação de trabalho
$routes->post('criar-trabalho', 'TrabalhoController::store');

$routes->post('trabalho/avaliar', 'Avaliador::avaliar');

$routes->post('trabalho/avaliarOral', 'Avaliador::avaliarOral');

$routes->post('trabalho/excluir/(:num)', 'TrabalhoController::excluir/$1'); // Rota para excluir trabalhos do banco de dados

$routes->get('logout', 'Logout::index');



