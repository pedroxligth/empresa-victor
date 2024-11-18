<?php namespace App\Models;

use CodeIgniter\Model;

class AvaliacaoModel extends Model
{
    protected $table = 'avaliacoes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'trabalho_id',
        'elementosPainel',
        'clarezaInformacoes',
        'autoresDescritores',
        'distribuicaoInformacoes',
        'apresentacao',
        'pensamentoCientifico',
        'habilidade',
        'clareza',
        'minuciosidade',
        'conclusao',
        'media',
        'comentario'
    ];

   
}
