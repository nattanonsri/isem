<?php

namespace App\Libraries;

use CodeIgniter\Database\Config;

class Auth
{


    // private $ci;
    protected $db;

    public function __construct()
    {
        $this->db = Config::connect();

        define('LIBRARY_PATH',  $this->get_library());

    }


    public function get_library()
    {
        $result  = $this->db->table('tb_library')->select('library_path')->where('library_name', $_SERVER['SERVER_NAME'])->get()->getRow();
        if ($result) {
            return $result->library_path;
        }

        return null;
    }

}