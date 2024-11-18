<?php namespace App\Models;

use CodeIgniter\Model;

class AvaliacaoOralModel extends Model {
    protected $table = 'avaliacoes_orais';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'trabalho_id',
        'introducao_clareza_objetividade',
        'habilidade_organizacao_logica',
        'repeticoes_digressoes',
        'clareza_minuciosidade',
        'conclusao_objetiva',
        'independencia_raciocinio',
        'tempo_satisfatorio',
        'comentario',
        'media'
    ];

    public function getByTrabalho($trabalho_id) {
        return $this->where('trabalho_id', $trabalho_id)->first();
    }
}
