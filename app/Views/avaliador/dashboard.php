<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Trabalhos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Adicione seus estilos personalizados aqui */
        .logo-header {
            height: 50px;
        }

        .logo-footer {
            height: 30px;
        }

        .search-bar {
            background-color: #f8f9fa;
        }

        .trabalho {
            transition: all 0.3s ease-in-out;
        }

        .trabalho:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white py-3">
        <div class="container d-flex align-items-center justify-content-between">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa" class="logo-header">
            <div>
                
                <a href="<?= site_url('logout') ?>" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </header>

    <main class="container py-5">
    <h1 class="text-center mb-5">Avaliação de Trabalhos</h1>

    <!-- Barra de filtros com botão para ativar pesquisa -->
    <div class="mb-4 text-center">
        <button id="btnSearch" class="btn btn-outline-primary" onclick="toggleSearchBar()">
            <i class="fas fa-search"></i> Buscar
        </button>
    </div>

    <!-- Filtro que aparece ao clicar no botão -->
    <div id="searchBar" class="d-none mb-4 card p-4 shadow">
        <div class="row">
            <div class="col-md-5">
                <input type="text" id="filtroProtocolo" class="form-control" placeholder="Buscar por protocolo">
            </div>
            <div class="col-md-5">
                <input type="text" id="filtroAvaliador" class="form-control" placeholder="Buscar por avaliador">
            </div>
            <div class="col-md-2 text-center">
                <button class="btn btn-primary btn-block" onclick="filtrarTrabalhos()">Filtrar</button>
            </div>
        </div>
    </div>

    <!-- Lista de trabalhos -->
    <div class="trabalhos-list">
        <div class="row">
            <?php foreach ($trabalhos as $trabalho): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm <?= $trabalho['avaliado'] ? 'border-success' : 'border-warning'; ?>" 
                         data-protocolo="<?= esc($trabalho['protocolo']); ?>" 
                         data-avaliador="<?= esc($trabalho['avaliadores']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($trabalho['resumo']); ?></h5>
                            <p><strong>Curso:</strong> <?= esc($trabalho['curso']); ?></p>
                            <p><strong>Protocolo:</strong> <?= esc($trabalho['protocolo']); ?></p>
                            <p><strong>Modelo Avaliativo:</strong> <?= esc($trabalho['modelo_avaliativo']); ?></p>
                            <p><strong>Avaliadores:</strong> <?= esc($trabalho['avaliadores']); ?></p>

                            <div class="d-flex justify-content-between align-items-center">
                                <?php if (!$trabalho['avaliado']): ?>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#avaliarPosterModal" 
                                                data-trabalho-id="<?= $trabalho['id']; ?>" 
                                                data-resumo="<?= esc($trabalho['resumo']); ?>">Avaliar Pôster</button>
                                        <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#avaliarOralModal" 
                                                data-trabalho-id="<?= $trabalho['id']; ?>" 
                                                data-resumo="<?= esc($trabalho['resumo']); ?>">Avaliar Oral</button>
                                    </div>
                                <?php else: ?>
                                    <span class="badge badge-success">✓ Avaliado</span>
                                <?php endif; ?>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" 
                                        data-trabalho-id="<?= $trabalho['id']; ?>">
                                    <i class="fas fa-trash-alt"></i> Excluir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este trabalho?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Avaliação do Pôster -->
    <div class="modal fade" id="avaliarPosterModal" tabindex="-1" role="dialog" aria-labelledby="avaliarPosterModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="avaliarPosterModalLabel">Avaliar Trabalho - Pôster</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="avaliacaoForm" method="post" action="<?= site_url('trabalho/avaliar'); ?>">
                                    <div class="modal-body">
                                        <input type="hidden" name="trabalho_id" id="trabalho_id" value="">
                                        <div class="form-group">
                                            <label for="comentario">Comentário</label>
                                            <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="elementosPainel">Elementos do Painel</label>
                                            <input type="number" class="form-control" name="elementosPainel" id="elementosPainel" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="clarezaInformacoes">Clareza nas Informações</label>
                                            <input type="number" class="form-control" name="clarezaInformacoes" id="clarezaInformacoes" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="autoresDescritores">Autores e seus descritores</label>
                                            <input type="number" class="form-control" name="autoresDescritores" id="autoresDescritores" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="distribuicaoInformacoes">Distribuição das Informações</label>
                                            <input type="number" class="form-control" name="distribuicaoInformacoes" id="distribuicaoInformacoes" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="apresentacao">Apresentação Oral do Pôster</label>
                                            <input type="number" class="form-control" name="apresentacao" id="apresentacao" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="pensamentoCientifico">Pensamento Científico</label>
                                            <input type="number" class="form-control" name="pensamentoCientifico" id="pensamentoCientifico" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="habilidade">Habilidade</label>
                                            <input type="number" class="form-control" name="habilidade" id="habilidade" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="clareza">Clareza</label>
                                            <input type="number" class="form-control" name="clareza" id="clareza" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="minuciosidade">Minuciosidade</label>
                                            <input type="number" class="form-control" name="minuciosidade" id="minuciosidade" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="conclusao">Conclusão</label>
                                            <input type="number" class="form-control" name="conclusao" id="conclusao" min="0" max="10">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar Avaliação</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

    <!-- Modal de Avaliação Oral -->
   <div class="modal fade" id="avaliarOralModal" tabindex="-1" role="dialog" aria-labelledby="avaliarOralModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="avaliarOralModalLabel">Avaliar Trabalho - Oral</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="avaliacaoOralForm" method="post" action="<?= site_url('trabalho/avaliarOral'); ?>">
                                <div class="modal-body">
                                    <input type="hidden" name="trabalho_id" id="trabalho_id_oral" value="">
                                    <!-- Campos específicos para avaliação oral -->
                                    <div class="form-group">
                                            <label for="introducao_clareza_objetividade">Introdução: Clareza e Objetividade</label>
                                            <input type="number" class="form-control" name="introducao_clareza_objetividade" id="introducao_clareza_objetividade" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="habilidade_organizacao_logica">Habilidade (Organização lógica da apresentação)</label>
                                            <input type="number" class="form-control" name="habilidade_organizacao_logica" id="habilidade_organizacao_logica" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="repeticoes_digressoes">repeticoes_digressoes</label>
                                            <input type="number" class="form-control" name="repeticoes_digressoes" id="repeticoes_digressoes" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="clareza_minuciosidade">Clareza e Minuciosidade</label>
                                            <input type="number" class="form-control" name="clareza_minuciosidade" id="clareza_minuciosidade" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="conclusao_objetiva">Conclusão e/ou Considerações Finais</label>
                                            <input type="number" class="form-control" name="conclusao_objetiva" id="conclusao_objetiva" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="independencia_raciocinio">Independência do Material e Raciocínio Lógico</label>
                                            <input type="number" class="form-control" name="independencia_raciocinio" id="independencia_raciocinio" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="tempo_satisfatorio">Tempo de Apresentação Satisfatório</label>
                                            <input type="number" class="form-control" name="tempo_satisfatorio" id="tempo_satisfatorio" min="0" max="10">
                                        </div>

                                    <!-- Outros critérios da avaliação oral -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar Avaliação</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        

    <footer class="bg-dark text-white py-4 text-center">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa" class="logo-footer">
        <p>&copy; 2024 Todos os direitos reservados</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#avaliarPosterModal').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                var trabalhoId = button.data('trabalho-id');
                $(this).find('input[name="trabalho_id"]').val(trabalhoId);
            });

            $('#avaliarOralModal').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                var trabalhoId = button.data('trabalho-id');
                $(this).find('input[name="trabalho_id"]').val(trabalhoId);
            });

            $('#confirmDeleteModal').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                var trabalhoId = button.data('trabalho-id');
                $('#confirmDeleteButton').click(function () {
                    window.location.href = '<?= site_url('trabalho/excluir'); ?>/' + trabalhoId;
                });
            });
        });
        function toggleSearchBar() {
        const searchBar = document.getElementById('searchBar');
        searchBar.classList.toggle('d-none');
    }
    </script>
</body>
</html>
