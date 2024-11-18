<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTrabalhosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'protocolo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'resumo' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'curso' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'modelo_avaliativo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'avaliadores' => [
                'type' => 'VARCHAR',
                'constraint' => 255, // pode ajustar esse tamanho conforme necessário
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('trabalhos');
    }

    public function down()
    {
        $this->forge->dropTable('trabalhos');
    }
}
