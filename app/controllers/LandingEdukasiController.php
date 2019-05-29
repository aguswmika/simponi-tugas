<?php
class LandingEdukasiController
{
    private $kategoriPembelajaran, $edukasi;

    function __construct()
    {
        $this->kategoriPembelajaran = model('kategoripembelajaran');
        $this->edukasi = model('edukasi');
    }

    function index(){
        $data = [
            'title' => 'Edukasi',
            'kategori' => $this->kategoriPembelajaran->getKategori()
        ];
        return view('landing/edukasi/index', $data);
    }

    function detail($id, $slug = ''){

        $kategori = $this->kategoriPembelajaran->getBySlug($id);

        if($kategori === false){
            abort(404);
        }

        $data = [
            'title' => 'edukasi',
            'kategori' => $kategori,
            'edukasi' => $this->edukasi->getByCategory($kategori->id)
        ];


        if(!empty($slug)){
            $data['single'] = $this->edukasi->getBySlug($slug);
        }


        return view('landing/edukasi/detail', $data);
    }

}