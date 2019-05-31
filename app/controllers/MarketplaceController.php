<?php
class MarketplaceController
{
    private $akun, $produk, $jml_keranjang;

    function __construct()
    {
        $this->akun = model('akun');
        $this->produk = model('produk');

        @$this->jml_keranjang = $this->produk->getJmlKeranjang(Akun::getLogin()->id)->jml;
    }

    function index(){
        $data = [
            'title' => 'marketplace',
            'produk' => $this->produk->getData(),
            'jml_keranjang' => $this->jml_keranjang
        ];
        return view('landing/marketplace/index',$data);
    }

    function detail($id){
        $produk = $this->produk->getBySlug($id);

        if($produk === false){
            abort(404);
        }

        $data = [
            'title'     => $produk->nama,
            'produk'    => $produk,
            'produk_rekomen' => $this->produk->getDataByRand(),
            'jml_keranjang' => $this->jml_keranjang
        ];
        return view('landing/marketplace/detail',$data);
    }

    function addCart($id){
        checkIfNotLogin();
        $config = [
            'jumlah' => [
                'required' => true,
                'integer' => true
            ]
        ];

        $valid = new Validation($config);

        if($valid->run()) {

            $this->produk->tambahKeranjang($id);

        }else{
            msg($valid->getErrors(), 'danger');

        }

        redirect('produk/'.$id);
    }

    function cart(){
        checkIfNotLogin();
        $data = [
            'title' => 'Keranjang belanja',
            'keranjang' => $this->produk->getKeranjang(Akun::getLogin()->id),
            'jml_keranjang' => $this->jml_keranjang
        ];
        return view('landing/marketplace/shopping-cart',$data);
    }

    function bayar(){
        checkIfNotLogin();


        $this->produk->bayar(Akun::getLogin()->id);
        msg('Berhasil dibayarkan');


        redirect('keranjang');
    }


}