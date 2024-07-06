<?php
namespace App\Controllers;

use App\Models\Profile_HomeModel;
use App\Models\ProfileDiseaseModel;
use App\Models\ProfileRelativeModel;
use App\Models\ProfileSuccorModel;
use CodeIgniter\Controller;
use Config\Database;

class Home extends Controller
{

    public function index()
    {

        $lang = \Config\Services::language();
        $lang->setLocale('th');

        $model = new Profile_HomeModel();

        $profiles = $model->getProfileAll();
        // $birthDate = '1990-07-06'; // วันที่เกิด
        // $age = $this->calculateAge($birthDate); 


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
        $db = Database::connect();

        if ($this->request->getPost()) {
            $search = $this->request->getPost('search');
            $check_user = $db->table('tb_user');
            $check_user->where('fname >', $search);
            $check_user->where('lname >', $search);

            $query = $check_user->get();
            $result = $query->getResultArray();
            var_dump($result);
        }
    }

}