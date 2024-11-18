<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTableAndInsertUsers extends Migration
{
    public function up()
    {
        // Criar a tabela users
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'    => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
            ],
            'password'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'role'        => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'avaliador'],
            ],
            'created_at'  => [
                'type'       => 'TIMESTAMP',
                'null'       => true,
                'default'    => null,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');

        // Inserir usuários
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('123', PASSWORD_DEFAULT), // Senha: 123
                'role'     => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'avaliador1',
                'password' => password_hash('123', PASSWORD_DEFAULT), // Senha: 123
                'role'     => 'avaliador',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }

    public function down()
    {
        // Remover a tabela e os usuários se necessário
        $this->forge->dropTable('users');
    }
}
