<?php


class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function registrasi($data)
    {
        $user = strtolower(stripslashes($data['user']));
        $pass = $data['pass'];

        $this->db->query("SELECT * FROM user WHERE username = :username");

        $this->db->bind('username', $user);

        $this->db->single();

        if ($this->db->rowCount() === 1) {
            $_SESSION['usr'] = true;
            return false;
        }


        $pass = password_hash($pass, PASSWORD_DEFAULT);


        $query = "INSERT INTO user 
        VALUES ('',:username,:pass)";

        $this->db->query($query);

        $this->db->bind('username', $user);
        $this->db->bind('pass', $pass);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function lov($username, $pass)
    {

        $this->db->query("SELECT * FROM user WHERE username = :username");

        $this->db->bind('username', $username);

        $this->db->single();

        if ($this->db->rowCount() === 1) {
            $row = $this->db->single();
            if (password_verify($pass, $row['pass'])) {
                $_SESSION['login'] = true;
                header('Location: ' . BASEURL . '/mahasiswa');
            } else {
                $_SESSION['passFail'] = "Password Salah";
                header('Location: ' . BASEURL . '/Log');
            }
        } else {
            $_SESSION['false'] = "Username tidak ditemukan";
            header('Location: ' . BASEURL . '/Log');
        }

        return $this->db->single();
    }

    public function cariMhs()
    {
        $keyword = $_POST['keyword'];

        $query = ("SELECT * FROM mahasiswa WHERE nama LIKE :keyword OR nrp LIKE :keyword OR jurusan LIKE :keyword OR email LIKE :keyword");
        $this->db->query($query);

        $this->db->bind('keyword', "%$keyword%");
        $this->db->bind('keyword', "%$keyword%");
        $this->db->bind('keyword', "%$keyword%");
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}
