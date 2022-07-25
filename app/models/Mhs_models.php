<?php


class Mhs_models
{

    private $table = 'mahasiswa';
    private $db;

    private static $nama = 'Awal';


    public static function getNama()
    {
        return self::$nama;
    }


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        // return $this->mhs;
        $this->db->query("SELECT * FROM mahasiswa ORDER BY nama ASC");

        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id =:id");

        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function upload()
    {
        $nama = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];
        $error  = $_FILES['gambar']['error'];
        $tmp  = $_FILES['gambar']['tmp_name'];

        // cek apakah gambar sudah dipilih

        if ($error === 4) {
            return 'nophoto.png';
        }


        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensi = explode('.', $nama);
        $ekstensi = strtolower(end($ekstensi));

        if (!in_array($ekstensi, $ekstensiValid)) {
            return false;
        }


        // cek ukuran file
        if ($ukuran > 1000000) {
            return false;
        }

        // cek ekstensi file gambar


        $namabaru = uniqid();
        $namabaru .= '.';
        $namabaru .= $ekstensi;

        // jika lolos

        move_uploaded_file($tmp, 'img/' . $namabaru);

        return $namabaru;
    }

    public function sama()
    {
        $this->db->query("SELECT * FROM mahasiswa WHERE nrp = :nrp");
        $this->db->bind('nrp', $_POST['nrp']);
        $this->db->single();
        if ($this->db->rowCount() === 1) {
            $_SESSION['alreadyN'] = true;
            header('Location: ' . BASEURL . '/mahasiswa');
            return false;
        }
        $this->db->query("SELECT * FROM mahasiswa WHERE email = :email");
        $this->db->bind('email', $_POST['email']);
        $this->db->single();
        if ($this->db->rowCount() === 1) {
            $_SESSION['alreadyU'] = true;
            header('Location: ' . BASEURL . '/mahasiswa');
            return false;
        }

        return true;
    }

    public function tambahData($data)
    {


        if (!$this->sama()) {
            return false;
        }
        $query = "INSERT INTO mahasiswa 
        VALUES ('',:nama,:nrp, :jurusan, :email , :gambar )";

        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('gambar', $this->upload());

        if ($this->upload() === false) {
            return false;
        }
        $this->db->execute();


        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $id = $_POST['idhapus'];

        $hapus = $this->getMahasiswaById($id);
        $foto = $hapus['gambar'];
        if (file_exists("img/$foto")) {
            unlink("img/$foto");
        }


        $query = "DELETE FROM mahasiswa WHERE id = :id";

        $this->db->query($query);

        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahData($data)
    {

        $id = $data['id'];

        $gambarlama = $data['gambarLama'];

        $query = "UPDATE mahasiswa SET 
                    nama = :nama, 
                    nrp = :nrp, 
                    jurusan = :jurusan, 
                    email = :email , 
                    gambar = :gambar 
                WHERE id = :id";

        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $data['id']);

        if ($_FILES['gambar']['error'] == 4) {
            $this->db->bind('gambar', $gambarlama);
        } else {
            $timpa = "SELECT * FROM mahasiswa WHERE id = '$id'";
            $edit = $timpa['gambar'];
            if (file_exists("img/$edit")) {
                unlink("img/$edit");
            }
            $this->db->bind('gambar', $this->upload());
        }

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariMahasiswa()
    {
        $keyword = $_POST['keyword'];

        $query = ("SELECT * FROM mahasiswa WHERE nama LIKE :keyword OR nrp LIKE :keyword OR jurusan LIKE :keyword OR email LIKE :email");
        $this->db->query($query);

        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}
