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
        $model = new Profile_HomeModel();

        // $user = $modal->getProfileNumRow();

        $data['datetime'] = $model->getLoginCountsByDate();

        return view('backend/details_content/my_content_dashboard', $data);
    }
    public function load_content_admin()
    {
        $modal = new AdminProfileModel();
        $data['admin'] = $modal->groupAdminProfile();

        return view('backend/details_content/my_content_admin', $data);
    }
    public function load_content_users()
    {
        $modal = new Profile_HomeModel();
        $data['users'] = $modal->getProfileAll();

        return view('backend/details_content/my_content_users', $data);
    }

    public function delete_profile_admin($uuid)
    {
        if ($this->request->getMethod() === 'DELETE') {

            $delete_admin = new AdminProfileModel();
            $delete_admin = $delete_admin->getAdminByUuid($uuid);
            $id = $delete_admin['id'];

            $delete = $delete_admin->delete($id);

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