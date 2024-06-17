<?php 
namespace App\Controllers;

use App\Models\Profile_HomeModel;
use CodeIgniter\Controller;

class Home extends Controller{
    
    public function index(){
        $model = new Profile_HomeModel();

        // ดึงข้อมูลโปรไฟล์ทั้งหมด
        $profiles = $model->getProfileHome();

        // ตรวจสอบและแปลงค่าพิกัดให้เป็นอาร์เรย์ของ [latitude, longitude]
        foreach ($profiles as &$profile) {
            if (isset($profile['coordinates'])) {
                $coords = explode(',', $profile['coordinates']);
                $profile['coordinates'] = array_map('floatval', $coords);
            }
        }

        // แปลงข้อมูลเป็น JSON
        $data['profile_json'] = json_encode($profiles);
 
        echo view('common/header');
        echo view('home/index',$data);
        echo view('common/footer');
    }
}