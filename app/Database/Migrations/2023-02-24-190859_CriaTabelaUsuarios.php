<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriaTabelaUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nome'=>[
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'email'=>[
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'cpf'=>[
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => true,
                'unique' => true
            ],
            'telefone'=>[
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'is_admin'=>[
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => false

            ],
            'ativo'=>[
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => false

            ],
            'ativacao_hash'=>[
                'type' => 'VARCHAR',
                'constraint' => '64',
                'unique' => true,
                'null' => true

            ],
            'reset_hash'=>[
                'type' => 'VARCHAR',
                'constraint' => '64',
                'unique' => true,
                'null' => true
            ],
            'reset_expira_em'=>[
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ],
            'criado_em'=>[
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ],
            'atualizado_em'=>[
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ],
            'deletado_em'=>[
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ]


        ]);
        $this->forge->addPrimaryKey('id')->addUniqueKey('email');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
