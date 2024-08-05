<?php
namespace App\Controllers;

use App\Models\Profile_HomeModel;
use CodeIgniter\Controller;
use Config\Database;
use App\Libraries\Auth;

class Home extends Controller
{

    public function __construct()
    {
        $lang = \Config\Services::language();
        $lang->setLocale('th');

        $this->Auth = new Auth;


    }

    public function index()
    {
        $model = new Profile_HomeModel();

        $profiles = $model->getProfileAll();

        foreach ($profiles as &$profile) {
            if (isset($profile['coordinates'])) {
                $coords = explode(',', $profile['coordinates']);
                $profile['coordinates'] = array_map('floatval', $coords);
            }
        }
        $data['profile_json'] = json_encode($profiles);

        echo view('common/header');
        echo view('home/index', $data);
        echo view('common/footer');
    }

    public function check_search_user()
    {

        $model = new Profile_HomeModel();

        if ($this->request->getPost()) {

            $search = $this->request->getPost('search');
            $field = $this->request->getPost('field');
            $value = $this->request->getPost('value');

            $check_user = $model->getProfileAll($search, $field, $value);

            foreach ($check_user as &$profile) {
                if (isset($profile['coordinates'])) {
                    $coords = explode(',', $profile['coordinates']);
                    $profile['coordinates'] = array_map('floatval', $coords);
                }
            }

            if ($check_user) {
                $data = array('status' => 200, 'message' => 'suceess', 'data' => $check_user);
            } else {
                $data = array('status' => 400, 'message' => 'error'); // ไม่มีสิ่งที่คุณต้องการหา
            }

            echo json_encode($data);
            exit;
        }
    }

}