<?php
class MarketplaceController
{
    private $akun, $produk;

    function __construct()
    {
        $this->akun = model('akun');
        $this->produk = model('produk');
    }

    function index(){
        $data = [
            'title' => 'marketplace',
            'produk' => $this->produk->getData()
        ];
        return view('landing/marketplace/index',$data);
    }

    function detail($id){
        $data = [
            'title' => 'detail'
        ];
        return view('landing/marketplace/detail',$data);
    }


}