<?php


class User extends Controller
{

    public function index()
    {
        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/mahasiswa');
        }

        $data['judul'] = "Halaman Pengunjung";
        $data['mahasiswa'] = $this->model('Mhs_models')->getAllMahasiswa();

        if (count($data['mahasiswa']) <= 0) {
            $this->view('UserComponents/header', $data);
            $this->view('UserComponents/search');
            $this->view('user/emptyU');
            $this->view('UserComponents/footer');
        } else {
            $this->view('UserComponents/header', $data);
            $this->view('UserComponents/search');
            $this->view('user/index', $data);
            $this->view('UserComponents/footer');
        }
    }

    public function cari()
    {

        $cari = $_POST['keyword'];
        $data['judul'] = "Halaman Pengunjung";
        if (!isset($cari)) {
            header('Location: ' . BASEURL . '/user');
        }
        if (isset($_POST['cari'])) {
            $data['mahasiswa'] = $this->model('User_model')->cariMhs();
        }
        $this->view('UserComponents/header', $data);
        $this->view('UserComponents/search');
        $this->view('user/index', $data);
        $this->view('UserComponents/footer');

        if (!$data['mahasiswa']) {
            $_SESSION['not'] = "Data dengan keyword  <font class ='text-danger'>" . $cari . "</font> tidak ditemukan";
            $this->view('user/emptyS');
        }
    }
}
