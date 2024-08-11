<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminProfileModel;
use App\Models\Profile_HomeModel;
use App\Libraries\Auth;

class Backend extends Controller
{

    public function __construct()
    {
        $lang = \Config\Services::language();
        $lang->setLocale('th');

        $this->Auth = new Auth;

    }

    public function index()
    {
        return view('common/header') . view('backend/index') . view('common/footer');
    }
    public function load_content_dash()
    {
        $profile_model = new Profile_HomeModel();

        $data['datetime'] = $profile_model->getLoginCountsByDate();
        $data['sum_user'] = $profile_model->_getProfileNumAll();
        $data['male'] = $profile_model->_getProfileNumRowMale();
        $data['female'] = $profile_model->_getProfileNumRowFemale();
        // var_dump($data['sum_user']);exit;

        // var_dump($data['datetime']);exit;

        return view('backend/details_content/my_content_dashboard', $data);
    }
    public function load_content_admin()
    {
        $admin_model = new AdminProfileModel();
        $data['admin'] = $admin_model->groupAdminProfile();

        return view('backend/details_content/my_content_admin', $data);
    }
    public function load_content_users()
    {
        $profile_model = new Profile_HomeModel();
        $data['users'] = $profile_model->getProfileAll();

        return view('backend/details_content/my_content_users', $data);
    }

    public function delete_profile_admin($uuid)
    {
        if ($this->request->getMethod() === 'DELETE') {

            $admin_model = new AdminProfileModel();
            $admin = $admin_model->getAdminByUuid($uuid);
            $id = $admin['id'];

            $delete = $admin_model->delete($id);

            if ($delete !== false) {
                $data = ['status' => 200, 'message' => lang('profile.delete-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.delete-error')];
            }

            echo json_encode($data);
            exit;
        }
    }

    public function load_login()
    {

    }

}