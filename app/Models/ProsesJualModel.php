<?php

namespace App\Models;

use CodeIgniter\Model;

class ProsesJualModel extends Model
{

    protected $table = "proses_jual";
    // protected $primaryKey = "idpjl";

    public function getProsesJual($id)
    {
        return $this->db->table($this->table)->where('id', $id)->get()->getRowArray();
    }

    public function insertData($data)
    {
        $id = $data['id_penjualan'];
        $items = $data['items'];

        foreach ($items as $key => $item) {
            $productId = $item['id'];
            $productPrice = $item['price'];
            $productQty = $item['quantity'];

            $productStock = $this->db->table('products')->where('id', $productId)->get()->getRowArray();
            $nowStock = $productStock['stock'] - $productQty;

            $this->db->query("UPDATE products SET stock = '$nowStock' where id = '$productId'");
            $this->db->query("INSERT INTO proses_jual(id_pjl, id, price, jml) VALUES ('$id','$productId','$productPrice','$productQty')");
        }
    }
}
