<?php


class Detail extends Controller
{
    public function index()
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mhs_models')->getAllMahasiswa();
        $this->view('components/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('components/footer');
    }
}
