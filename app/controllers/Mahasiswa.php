<?php


class Mahasiswa extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/user');
        }
        $data['judul'] = 'Mahasiswa';
        $data['mhs'] = $this->model('Mhs_models')->getAllMahasiswa();

        if (count($data['mhs']) <= 0) {
            $this->view('components/header', $data);
            $this->view('mahasiswa/empty');
            $this->view('components/footer');
        } else {
            $this->view('components/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('components/footer');
        }
    }

    public function Detail($id)
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/user');
        }

        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mhs_models')->getMahasiswaById($id);
        $this->view('components/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('components/modal');
        $this->view('components/footer');
    }

    public function tambah()
    {

        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/user');
        }

        if (!isset($_POST['nama'])) {
            header('Location: ' . BASEURL . '/mahasiswa');
        } else {
            if ($this->model('Mhs_models')->tambahData($_POST) > 0) {
                Flasher::setFlash(' berhasil ', ' ditambahkan ', 'success');

                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                Flasher::setFlash(' gagal ', ' ditambahkan ', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
    }

    public function delete()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/user');
        }


        if (!isset($_POST['idhapus'])) {
            header('Location: ' . BASEURL . '/mahasiswa');
        } else {
            if ($this->model('Mhs_models')->hapusData($_POST) > 0) {
                Flasher::setFlash(' berhasil ', ' dihapus ', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                Flasher::setFlash(' gagal ', ' dihapus ', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
    }

    public function getUbah()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/user');
        }

        if (!isset($_POST['id'])) {
            header('Location: ' . BASEURL . '/mahasiswa');
        } else {
            echo json_encode($this->model('Mhs_models')->getMahasiswaById($_POST['id']));
        }
    }

    public function edit()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/user');
        }

        if (!isset($_POST['nama'])) {
            header('Location: ' . BASEURL . '/mahasiswa');
        } else {
            if ($this->model('Mhs_models')->ubahData($_POST) > 0) {
                Flasher::setFlash(' berhasil ', ' diubah ', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                Flasher::setFlash(' gagal ', ' diubah ', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
    }

    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();

        header('location:' . BASEURL . '/user');
        exit;
    }

    public function cari()
    {
    }
}

// $init = new Mahasiswa;

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     switch ($_POST['nama']) {
//         case 'index':
//             $init->index();
//             break;
//         default:
//             redirect(BASEURL . '/mahasiswa');
//     }
// }
