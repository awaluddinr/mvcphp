<?php

class Login extends Controller
{
    public function index()
    {
        $data['judul'] = "Halaman Pengunjung";
        $this->view('UserComponents/header', $data);
        $this->view('login/index');
        $this->view('UserComponents/footer');
    }

    public function reg()
    {
        $data['judul'] = "Halaman Registrasi";
        $this->view('UserComponents/header', $data);
        $this->view('login/reg');
        $this->view('UserComponents/footer');
    }

    public function addUser()
    {
        if ($this->model('User_model')->registrasi($_POST) > 0) {
            Flasher::setFlash(' User Berhasil ', ' ditambahkan ', 'success');
            header('Location: ' . BASEURL . '/login');
            exit;
        } else {
            Flasher::setFlash(' User gagal ', ' ditambahkan ', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }
}
