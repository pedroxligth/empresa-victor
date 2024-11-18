<?php namespace App\Models;

use CodeIgniter\Model;

class TrabalhoModel extends Model
{
    protected $table = 'trabalhos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['protocolo', 'resumo', 'curso', 'modelo_avaliativo', 'avaliadores', 'created_at', 'updated_at', 'avaliado'];

    // Método para deletar um trabalho
    public function deleteTrabalho($id)
    {
        return $this->delete($id); // Utiliza o método 'delete' da própria classe Model
    }
}
