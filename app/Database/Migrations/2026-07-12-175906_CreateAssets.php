<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAssets extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'auto_increment'=>true
            ],

            'category_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true
            ],

            'title'=>[
                'type'=>'VARCHAR',
                'constraint'=>150
            ],

            'description'=>[
                'type'=>'TEXT',
                'null'=>true
            ],

            'file_name'=>[
                'type'=>'VARCHAR',
                'constraint'=>255
            ],

            'file_path'=>[
                'type'=>'VARCHAR',
                'constraint'=>255
            ],

            'file_type'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],

            'file_size'=>[
                'type'=>'INT',
                'constraint'=>20
            ],

            'uploaded_by'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true
            ],

            'created_at'=>[
                'type'=>'DATETIME',
                'null'=>true
            ],

            'updated_at'=>[
                'type'=>'DATETIME',
                'null'=>true
            ],

        ]);

        $this->forge->addKey('id',true);

        $this->forge->createTable('assets');
    }

    public function down()
    {
        $this->forge->dropTable('assets');
    }
}