<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{

    protected $table = "penjualan";
    protected $primaryKey = "idpjl";

    public function getPenjualan($id)
    {
        return $this->db->table($this->table)->where('id', $id)->get()->getRowArray();
    }

    public function get_idmax()
    {
        $results = $this->countAllResults();
        return $results + 1;
    }

    public function insertData($data)
    {
        $idpjl = $data['id_penjualan'];
        $nama = $data['nama'];
        $hp = $data['hp'];
        $alamat = $data['alamat'];
        $kecamatan = $data['kecamatan'];
        $kota = $data['kota'];
        $status = $data['status'];
        $date = date('Y-m-d H:i:s');
        $total = $data['total'];

        $this->db->query("INSERT INTO " . $this->table . "(idpjl, name, hp, alamat, kecamatan, kota, status, tgl, total) VALUES ('$idpjl','$nama', '$hp', '$alamat', '$kecamatan', '$kota', '$status', '$date', '$total')");
    }
}
