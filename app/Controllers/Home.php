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

        $coordinate = $this->request->getGet('coordinates');
        $zoom = $this->request->getGet('zoom');

        $coordinate = !empty($coordinate) ? $coordinate : '6.2920444,101.6806698';
        $coord = explode(',', $coordinate);

        if (count($coord) >= 2) {
            $latitude = floatval(trim($coord[0]));
            $longitude = floatval(trim($coord[1]));
        } else {
            $latitude = 6.2920444;
            $longitude = 101.6806698;
        }

        if (!defined('IS_ALIVE') || IS_ALIVE === false) {
            return redirect()->to('login');
        }

        $profile_model = new Profile_HomeModel();
        $profiles = $profile_model->getProfileAll();

        foreach ($profiles as &$profile) {
            if (isset($profile['coordinates'])) {
                $coords = explode(',', $profile['coordinates']);
                $profile['coordinates'] = array_map('floatval', $coords);
            }
        }

        $data['profile_json'] = json_encode($profiles);
        $data['latitude'] = isset($latitude) ? $latitude : 6.2920444;
        $data['longitude'] = isset($longitude) ? $longitude : 101.6806698;
        $data['zoom'] = !empty($zoom) ? intval($zoom) : 10;

        echo view('common/header');
        echo view('home/index', $data);
        echo view('common/footer');
    }


    public function check_search_user()
    {
        if ($this->request->getPost()) {
            $profile_model = new Profile_HomeModel();

            $search = $this->request->getPost('search');
            $field = $this->request->getPost('field');
            $value = filter_var($this->request->getPost('value'), FILTER_VALIDATE_BOOLEAN);

            $check_user = $profile_model->getProfileAll($search, $field, $value);

            foreach ($check_user as &$profile) {
                if (isset($profile['coordinates'])) {
                    $coords = explode(',', $profile['coordinates']);
                    $profile['coordinates'] = array_map('floatval', $coords);
                }
            }

            if ($check_user) {
                $data = ['status' => 200, 'message' => 'suceess', 'data' => $check_user];
            } else {
                $data = ['status' => 400, 'message' => 'error'];
            }

            return $this->response->setJSON($data);

        }
    }

}