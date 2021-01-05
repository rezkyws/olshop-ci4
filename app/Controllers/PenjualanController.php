<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\PenjualanModel;
use App\Models\ProsesJualModel;
use DateTime;
// memanggil library / package WFcart
use Wildanfuady\WFcart\WFcart;

class PenjualanController extends BaseController
{

    public function __construct()
    {

        // memanggil product model
        $this->product = new ProductModel;
        $this->penjualan = new PenjualanModel;
        $this->proses_jual = new ProsesJualModel;
        // membuat variabel untuk menampung class WFcart
        $this->cart = new WFcart();
        // memanggil form helper
        helper('form');
    }

    public function index()
    {
        // Get all data that user inputted in form add data
        $data = [
            'nama' => $this->request->getVar('nama'),
            'hp' => $this->request->getVar('hp'),
            'alamat' => $this->request->getVar('alamat'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kota' => $this->request->getVar('kota'),
            'items' => $this->cart->totals(),
            'title' => 'Konfirmasi Order',
            'total' => $this->cart->count_totals()
        ];

        // $this->beritaModel->insertData($data);


        // // membuat variabel untuk menampung total keranjang belanja
        // $data['items'] = $this->cart->totals();
        // $data['title'] = 'Cart';
        // // menampilkan total belanja dari semua pembelian
        // $data['total'] = $this->cart->count_totals();
        // // menampilkan halaman view cart
        return view('buy/index', $data);
    }

    public function saving_order()
    {
        // $product = $this->product->getProduct($id);
        // Get all data that user inputted in form add mahasiswa data
        $data = [
            'id_penjualan' => $this->idPenjualan(),
            'nama' => $this->request->getPost('nama'),
            'hp' => $this->request->getPost('hp'),
            'alamat' => $this->request->getPost('alamat'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kota' => $this->request->getPost('kota'),
            'items' => $this->cart->totals(),
            // 'title' => 'Konfirmasi Order',
            'status' => 1,
            'total' => $this->cart->count_totals()
        ];

        $this->penjualan->insertData($data);
        $this->proses_jual->insertData($data);

        unset($_SESSION['cart']);

        // Will redirect to display mahasiswa data page
        return redirect()->to('/cart');
    }

    public function show_form_checkout()
    {
        $data['title'] = 'Form Checkout';
        return view('cart/form_checkout', $data);
    }

    //Mengembalikan id penjualan dengan prefix TRX
    public function idPenjualan()
    {
        $get_id = $this->penjualan->get_idmax();

        return $get_id; //TRX00001
    }

    // function untuk update cart berdasarkan id dan quantity
    public function update()
    {
        // update cart
        $this->cart->update();
        return redirect()->to('/cart');
    }

    // function untuk menghapus cart berdasarkan id
    public function remove($id = null)
    {

        // cari product berdasarkan id
        $product = $this->product->getProduct($id);
        // cek data product
        if ($product != null) { // jika product tidak kosong
            // hapus keranjang belanja berdasarkan id
            $this->cart->remove($id);
            // success flashdata
            session()->setFlashdata('success', "Berhasil menghapus product dari keranjang belanja");
        } else { // product tidak ditemukan
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data product");
        }
        return redirect()->to('/cart');
    }
}
