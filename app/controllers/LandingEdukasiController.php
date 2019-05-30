<?php
class LandingEdukasiController
{
    private $kategoriPembelajaran, $edukasi, $akun;

    function __construct()
    {
        $this->kategoriPembelajaran = model('kategoripembelajaran');
        $this->edukasi = model('edukasi');
        $this->akun = model('akun');
    }

    function index(){
        $data = [
            'title' => 'Edukasi',
            'kategori' => $this->kategoriPembelajaran->getKategori()
        ];
        return view('landing/edukasi/index', $data);
    }

    function detail($id){
        $kategori = $this->kategoriPembelajaran->getBySlug($id);

        if($kategori === false){
            abort(404);
        }

        $data = [
            'title' => 'Kelas '.$kategori->nama,
            'kategori' => $kategori,
            'edukasi' => $this->edukasi->getByCategory($kategori->id),
            'progres' => $this->edukasi->getProgress(@Akun::getLogin()->id, $kategori->id)
        ];


        return view('landing/edukasi/detail', $data);
    }

    function pembelajaran($slug){
        checkIfNotLogin();
        $edukasi = $this->edukasi->getBySlug($slug);
        if($edukasi === false){
            abort(404);
        }

        if(!$this->edukasi->checkProgress(Akun::getLogin()->id, $edukasi->id)){
            abort(404);
        }

        $data = [
            'title' => $edukasi->judul,
            'single' => $edukasi,
            'edukasi' => $this->edukasi->getByCategory($edukasi->id_kategori_pembelajaran),
            'progres' => $this->edukasi->getProgress(Akun::getLogin()->id, $edukasi->id_kategori_pembelajaran)
        ];


        return view('landing/edukasi/pembelajaran', $data);
    }
}