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
    // public function checkSwitch()
    // {
    //     $db = Database::connect();
    //     if ($this->request->getPost()) {
    //         $uuid = $this->request->getPost('reletive[uuid]');
    //         $relative = $db->table('tb_user_relative as rel')
    //         ->select('rel.id, rel.uuid, rel.name_th, user.uuid as user_uuid, user.fname, user.lname')
    //         ->join('tb_user as user', 'user.relative_id = rel.id', 'left')
    //         ->where('rel.uuid', $uuid)
    //         ->get()
    //         ->getResultArray();

    //         if($relative){
    //             $data = array('status' => 200, 'message' => 'success');
    //         }else{
    //             $data = array('status' => 400, 'message' => 'error');
    //         }
            
    //         echo json_encode($data);
    //         exit();

    //     }
    // }

    public function load_home_all() {
        
    }
}