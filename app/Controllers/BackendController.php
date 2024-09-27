<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Auth;

class BackendController extends BaseController
{

    function __construct()
    {
        $lang = \Config\Services::language();
        $lang->setLocale('th');

        $this->Auth = new Auth;
    }

    function index()
    {
        // $data['admin'] = $this->admin_model->where('id', USER_ID)->first(); 
        $data['admin'] = $this->admin_model->groupAdminProfileROW(USER_ID);
        // $data['user_admin'] = $this->admin_model->findAll();
        return view('backend/index', $data);
    }
    function load_content_dash()
    {

        $data['datetime'] = $this->profile_model->getLoginCountsByDate();
        $data['sum_user'] = $this->profile_model->_getProfileNumAll();
        $data['male'] = $this->profile_model->_getProfileNumRowMale();
        $data['female'] = $this->profile_model->_getProfileNumRowFemale();

        return view('backend/details_content/my_content_dashboard', $data);
    }

    function load_content_officer()
    {
        $data['admin'] = $this->admin_model->groupAdminProfile();


        return view('backend/details_content/my_content_officer', $data);
    }
    function load_content_users()
    {
        $data['users'] = $this->profile_model->getProfileAll();

        return view('backend/details_content/my_content_users', $data);
    }
    function load_content_administrator()
    {
        return view('backend/details_content/my_content_administrator');
    }
    function load_content_maps()
    {
        $profiles = $this->profile_model->getProfileAll();

        foreach ($profiles as &$profile) {
            if (isset($profile['coordinates'])) {
                $coords = explode(',', $profile['coordinates']);
                $profile['coordinates'] = array_map('floatval', $coords);
            }
        }
        $data['profile_json'] = json_encode($profiles);
        return view('backend/details_content/my_content_maps',$data);    
    }

    function openEditOfficerModal()
    {
        if ($this->request->getPost()) {

            $uuid = $this->request->getPost('uuid');
            $data['user'] = $this->admin_model->getAdminByUuid($uuid);
            return view('backend/details_content/details_admin_modal', $data);
        }
    }

    function openEditUsersModal()
    {
        if ($this->request->getPost()) {

            $uuid = $this->request->getPost('uuid');
            $data['profile'] = $this->profile_model->getProfileHomeByUuid($uuid);
            return view('backend/details_content/details_users_modal', $data);
        }
    }

    function delete_profile_admin($uuid)
    {
        if ($this->request->getMethod() === 'DELETE') {


            $admin = $this->admin_model->getAdminByUuid($uuid);
            $id = $admin['id'];

            $delete = $this->admin_model->delete($id);

            if ($delete !== false) {
                $data = ['status' => 200, 'message' => lang('profile.delete-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.delete-error')];
            }

            echo json_encode($data);
            exit;
        }
    }

    function load_login()
    {
        return view('backend/login');
    }

    function login_admin()
    {

        if ($this->request->getPost()) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $type = $this->request->getPost('type');

            if (empty($username) || empty($password)) {
                return $this->response->setJSON(['status' => 400, 'message' => lang('backend.login-user-pass-error')]);
            }

            $admin = $this->admin_model->where(['username' => $username, 'type_admin' => $type])->first();

            if (!$admin) {
                return $this->response->setJSON(['status' => 400, 'message' => lang('backend.username-error')]);

            }

            if (!password_verify($password, $admin['password'])) {
                return $this->response->setJSON(['status' => 400, 'message' => lang('backend.password-error')]);
            }

            $session_data = [
                'uuid' => $admin['uuid'],
                'username' => $admin['username'],
                'logged_in' => true
            ];

            $this->session->set($session_data);

            return $this->response->setJSON(['status' => 200, 'message' => lang('backend.login-success')]);
        }

    }

    function add_user_admin($type = '')
    {

        if ($this->request->getPost()) {
            $fname = $this->request->getPost('fname');
            $lname = $this->request->getPost('lname');
            $birthday = $this->request->getPost('birthday');
            $prefix = $this->request->getPost('prefix');
            $phone = $this->request->getPost('phone');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $data = [
                'uuid' => create_uuid(),
                'fname' => $fname,
                'lname' => $lname,
                'birthday' => !empty($birthday) ? $birthday : '',
                'gender' => $prefix,
                'phone' => !empty($phone) ? $phone : '',
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'type_admin' => $type,
                'status' => 1
            ];

            $insert = $this->admin_model->insert($data);

            // $insert = $this->admin_model->_addAdmin($type, $this->request->getPost(null, true));


            if ($insert) {
                $data = ['status' => 200, 'message' => lang('profile.seve-admin-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.seve-admin-error')];
            }


            return $this->response->setJSON($data);


        }
    }

    function update_user_admin($uuid, $type = '')
    {

        if ($this->request->getPost()) {

            $admin = $this->admin_model->getAdminByUuid($uuid);
            $update = $this->admin_model->_updateAdmin($admin['id'], $type, $this->request->getPost());

            if ($update) {
                $data = ['status' => 200, 'message' => lang('profile.seve-admin-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.seve-admin-error')];
            }


            return $this->response->setJSON($data);
        }
    }

    function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('backend/login')->with('success', lang('backend.logout-success'));
    }





}