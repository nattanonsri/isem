<?php

namespace App\Libraries;

use App\Models\AdminProfileModel;
use CodeIgniter\Database\Config;


class Auth
{


    // private $ci;
    protected $db;

    public function __construct()
    {
        $this->db = Config::connect();

        define('LIBRARY_PATH', $this->get_library());

        $adminProfileModel = new AdminProfileModel();
        $uuid = session()->get('uuid');
        $adminProfile = $adminProfileModel->where('uuid', $uuid)->first();

        if ($adminProfile) {
            defined('IS_ALIVE') or define('IS_ALIVE', TRUE);
            defined('SESSION') or define('SESSION', session()->get('session'));
            defined('USER_ID') or define('USER_ID', $adminProfile['id']);
            defined('USER_UUID') or define('USER_UUID', $adminProfile['uuid']);
            // defined('DISTRICT_ID') or define('DISTRICT_ID', $adminProfile['district_id']);
        } else {
            defined('IS_ALIVE') or define('IS_ALIVE', FALSE);
            defined('USER_ID') or define('USER_ID', 'GUEST');
            defined('USER_UUID') or define('USER_UUID', 0);
        }

    }


    public function get_library()
    {
        $result = $this->db->table('tb_library')->select('library_path')->where('library_name', $_SERVER['SERVER_NAME'])->get()->getRow();
        if ($result) {
            return $result->library_path;
        }

        return null;
    }

}