<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{

    protected $table = "products";
    protected $primaryKey = "id";

    public function getProduct($id)
    {
        return $this->db->table($this->table)->where('id', $id)->get()->getRowArray();
    }
}
