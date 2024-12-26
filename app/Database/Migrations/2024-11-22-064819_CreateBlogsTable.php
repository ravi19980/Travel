<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'blog_tittle' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'blog_image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'blog_metatag' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'blog_meta_description' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'blog_meta_tittle' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'blog_Status' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'published_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'published_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blogs');
    }

    public function down()
    {
        $this->forge->dropTable('blogs');
    }
}
