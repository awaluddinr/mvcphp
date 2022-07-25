<?php

class Log extends Controller
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/mahasiswa');
        }
        $data['judul'] = "Halaman Pengunjung";
        $this->view('UserComponents/header', $data);
        $this->view('login/index');
        $this->view('UserComponents/footer');
    }

    public function reg()
    {
        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/mahasiswa');
        }
        $data['judul'] = "Halaman Registrasi";
        $this->view('UserComponents/header', $data);
        $this->view('login/reg');
        $this->view('UserComponents/footer');
    }

    public function addUser()
    {
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];


        if (!isset($_POST['user'])) {
            header('Location: ' . BASEURL . '/Log');
        }

        if ($pass != $pass2) {
            Flasher::setFlash(' User gagal ', ' ditambahkan password tidak sama ', 'danger');
            header('Location: ' . BASEURL . '/Log/reg');
            exit;
        }

        if ($this->model('User_model')->registrasi($_POST) > 0) {
            Flasher::setFlash(' User Berhasil ', ' ditambahkan ', 'success');
            header('Location: ' . BASEURL . '/Log/reg');
            exit;
        } else {
            if (isset($_SESSION['usr'])) {
                Flasher::setFlash(' User gagal ', ' ditambahkan username sudah terdaftar ', 'danger');
            }
            header('Location: ' . BASEURL . '/Log/reg');
            exit;
        }
    }

    public function masuk()
    {

        $username = $_POST['user'];
        $pass = $_POST['pass'];


        if (empty($username) || empty($pass)) {
            $_SESSION['error'] = "username atau pasword tidak boleh kosong";
            header('Location: ' . BASEURL . '/Log');
            exit;
        }
        $login['masuk'] = $this->model('User_model')->lov($username, $pass);
    }
}
