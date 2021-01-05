<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idpjl' => [
				'type'  => 'VARCHAR',
				'constraint' => 50
			],
			'name' => [
				'type'  => 'VARCHAR',
				'constraint' => 50
			],
			'total' => [
				'type'  => 'INT',
				'constraint' => 11
			],
			'alamat' => [
				'type'  => 'TEXT'
			],
			'kecamatan' => [
				'type'  => 'VARCHAR',
				'constraint' => 50
			],
			'kota' => [
				'type'  => 'VARCHAR',
				'constraint' => 50
			],
			'hp' => [
				'type'  => 'VARCHAR',
				'constraint' => 50
			],
			'status' => [
				'type'  => 'INT',
				'constraint' => 3
			],
			'tgl' => [
				'type'  => 'DATETIME',
			]
		]);
		$this->forge->addKey('idpjl');
		$this->forge->createTable('penjualan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
