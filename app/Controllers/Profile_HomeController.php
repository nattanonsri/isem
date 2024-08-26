<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Auth;


class Profile_HomeController extends BaseController
{
    function __construct()
    {
        $lang = \Config\Services::language();
        $lang->setLocale('th');
        $this->Auth = new Auth;
    }

    function index()
    {
        $data['admin_user'] = $this->admin_model->groupAdminProfileROW(USER_ID);
        return view('profile_home/index', $data);
    }

    function user_search()
    {
        $search = $this->request->getPost('search');
        $data['profile'] = $this->profile_model->user_search($search);
        return view('profile_home/card', $data);

    }

    function load_add_user()
    {
        return view('profile_home/create');
    }

    function add_from_user()
    {
        if ($this->request->getPost()) {
            $prefix = $this->request->getPost('prefix');
            $fname = $this->request->getPost('fname');
            $lname = $this->request->getPost('lname');
            $card_id = $this->request->getPost('card_id');
            $birthdate = $this->request->getPost('birthdate');
            $phone = $this->request->getPost('phone');
            $coordinates = $this->request->getpost('coordinates');
            $disease_id = $this->request->getPost('disease_id');
            $disease_details = $this->request->getPost('disease_details');
            $succor_id = $this->request->getPost('succor_id');
            $relative_id = $this->request->getPost('relative_id');
            $caretaker = $this->request->getPost('caretaker');
            $medicines = $this->request->getPost('medicines');
            $medicines = $this->request->getPost('medicines');
            $file = $this->request->getFile('file_image');

            $imageNameUpload = "{$fname}-{$lname}-{$birthdate}.jpeg";
            $file->move(LIBRARY_PATH . '/profiles/', $imageNameUpload);
            $file_image = '/profiles/' . $imageNameUpload;

            $data = array(
                'uuid' => create_uuid(),
                'prefix' => $prefix,
                'fname' => $fname,
                'lname' => $lname,
                'card_id' => $card_id,
                'birthdate' => $birthdate,
                'phone' => $phone,
                'coordinates' => $coordinates,
                'disease_id' => $disease_id,
                'disease_details' => $disease_details,
                'succor_id' => $succor_id,
                'relative_id' => $relative_id,
                'caretaker' => $caretaker,
                'medicines' => $medicines,
                'file_image' => $file_image,
                'status' => 1,
            );

            $insert = $this->profile_model->insert($data);

            if ($insert) {
                $data = array('status' => 200, 'message' => lang('profile.create-success'));
            } else {
                $data = array('status' => 400, 'message' => lang('profile.create-error'));
            }

            echo json_encode($data);
            exit();
        }
    }

    function load_edit_form_user($uuid)
    {
        $data['profile'] = $this->profile_model->getProfileHomeByUuid($uuid);
        return view('profile_home/edit', $data);
    }

    function profile_details($uuid)
    {
        $data['admin'] = $this->admin_model->getAdminByUuid($uuid);
        return view('profile_home/profile_admin', $data);
    }

    function edit_form_user($uuid)
    {
        if ($this->request->getPost()) {
            $file = $this->request->getFile('file_image');
            $user = $this->profile_model->getProfileHomeByUuid($uuid);

            if (!$user) {
                echo json_encode(['status' => 404, 'message' => 'User not found']);
                exit;
            }
            $id = $user['id'];

            $prefix = $this->request->getPost('prefix');
            $fname = $this->request->getPost('fname');
            $lname = $this->request->getPost('lname');
            $card_id = $this->request->getPost('card_id');
            $birthdate = $this->request->getPost('birthdate');
            $phone = $this->request->getPost('phone');
            $disease_id = $this->request->getPost('disease_id');
            $disease_details = $this->request->getPost('disease_details');
            $succor_id = $this->request->getPost('succor_id');
            $relative_id = $this->request->getPost('relative_id');
            $caretaker = $this->request->getPost('caretaker');
            $medicines = $this->request->getPost('medicines');
            $coordinates = $this->request->getPost('coordinates');

            $data = [
                'prefix' => $prefix,
                'fname' => $fname,
                'lname' => $lname,
                'card_id' => $card_id,
                'birthdate' => $birthdate,
                'phone' => $phone,
                'disease_id' => $disease_id,
                'disease_details' => $disease_details,
                'succor_id' => $succor_id,
                'relative_id' => $relative_id,
                'caretaker' => $caretaker,
                'medicines' => $medicines,
                'coordinates' => $coordinates
            ];

            if ($file && $file->isValid() && !$file->hasMoved()) {
                if (!empty($user['file_image']) && file_exists($user['file_image'])) {
                    unlink($user['file_image']);
                }

                $imageName = "{$data['fname']}-{$data['lname']}-{$data['birthdate']}." . $file->getExtension();
                $file->move(LIBRARY_PATH . '/profiles/', $imageName);
                $data['file_image'] = '/profiles/' . $imageName;
            }

            $updataed_data = $this->profile_model->updateProfileById($id, $data);

            if ($updataed_data !== false) {
                $data = ['status' => 200, 'message' => lang('profile.edit-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.edit-error')];
            }

            echo json_encode($data);
            exit;
        }
    }

    function delete_form_user($uuid)
    {
        if ($this->request->getMethod() === 'DELETE') {

            $delete_user = $this->profile_model->getProfileHomeByUuid($uuid);
            $id = $delete_user['id'];

            $deleted = $this->profile_model->delete($id);

            if ($deleted !== false) {
                $data = ['status' => 200, 'message' => lang('profile.delete-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.delete-error')];
            }

            echo json_encode($data);
            exit;

        }

    }

    function detail_all_user($uuid)
    {
        $users = $this->profile_model->getProfileAllByUUID($uuid);

        $timestamp = strtotime($users['birthdate']);
        $users['birthdate'] = date('d-m-', $timestamp) . (date('Y', $timestamp) + 543);
        $data['users'] = $users;

        return view('profile_home/detailsProifle', $data);

    }

    function login()
    {

        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $this->admin_model->where('username', $username)->first();

            if ($user) {
                $pass = $user['password'];
                $authPassword = password_verify($password,$pass);


                if ($authPassword) {
                    $session_Data = [
                        'uuid' => $user['uuid'],
                        'username' => $user['username'],
                        'logged_in' => TRUE
                    ];
                    $this->session->set($session_Data);
                    return $this->response->setJSON(['success' => true]);
                } else {
                    return $this->response->setJSON(['success' => false, 'message' => 'รหัสผ่านไม่ถูกต้อง']);
                }
            } else {
                error_log('User not found: ' . $username);
                return $this->response->setJSON(['success' => false, 'message' => 'ไม่พบชื่อผู้ใช้']);
            }
        }

        echo view('profile_home/login');

    }

    function register()
    {
        echo view('profile_home/register');
    }

    function add_user_admin($type)
    {
        if ($this->request->getPost()) {

            $insert = $this->admin_model->_addAdmin($type, $this->request->getPost());

            if ($insert) {
                $data = ['status' => 200, 'message' => lang('profile.seve-admin-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.seve-admin-error')];
            }

            echo json_encode($data);
            exit;

        }
    }

    function update_admin_profile($type)
    {
        if ($this->request->getPost()) {

            $uuid = $this->request->getPost('uuid');
            $admin = $this->admin_model->getAdminByUuid($uuid);
            $admin_id = $admin['id'];
            $update_date = $this->admin_model->_updateAdmin($admin_id, $type, $this->request->getPost());

            if ($update_date) {
                $data = ['status' => 200, 'message' => lang('profile.edit-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.edit-error')];
            }

            echo json_encode($data);
            exit;
        }
    }

    function check_duplicate()
    {
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');


        $isDuplicate = $this->admin_model->ckeckDuplicate($fname, $lname);

        echo json_encode(['isDuplicate' => $isDuplicate]);
        exit;
    }

    function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/login')->with('success', 'You have been logged out');

    }
}
