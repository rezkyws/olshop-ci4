<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProsesJual extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pjl' => [
				'type'  => 'VARCHAR',
				'constraint' => 50,
			],
			'id' => [
				'type'  => 'INT',
				'constraint' => 11,
			],
			'price' => [
				'type'  => 'INT',
				'constraint' => 11
			],
			'jml' => [
				'type'  => 'INT',
				'constraint' => 11
			],
		]);
		$this->forge->addForeignKey('id_pjl', 'penjualan', 'idpjl');
		$this->forge->addForeignKey('id', 'products', 'id');
		$this->forge->createTable('proses_jual');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
