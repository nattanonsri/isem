<?php
namespace App\Controllers;

use App\Models\Profile_HomeModel;
use App\Models\AdminProfileModel;
use CodeIgniter\Controller;
use Ramsey\Uuid\Uuid;
use App\Libraries\Auth;


class Profile_HomeController extends Controller
{
    protected $helpers = ['url', 'form'];

    function __construct()
    {
        $lang = \Config\Services::language();
        $lang->setLocale('th');

        $this->Auth = new Auth;
    }

    function index()
    {
        $admin_model = new AdminProfileModel();
        $data['admin_user'] = $admin_model->groupAdminProfileROW(ADMIN_ID);

        return view('common/header') . view('profile_home/index', $data) . view('common/footer');
    }

    function user_search()
    {
        $profile_model = new Profile_HomeModel();

        $search = $this->request->getPost('search');

        $data['profile'] = $profile_model->user_search($search);

        return view('profile_home/card', $data) . view('common/footer');

    }
    function load_add_user()
    {

        echo view('common/header', ['title' => 'ฟอร์มเพิ่มข้อมูล']);
        echo view('profile_home/create');
        echo view('common/footer');
    }

    function add_from_user()
    {
        $profile_model = new Profile_HomeModel();
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
                'uuid' => Uuid::uuid4()->toString(),
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

            $insert = $profile_model->insert($data);

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
        $profile_model = new Profile_HomeModel();
        $data['profile'] = $profile_model->getProfileHomeByUuid($uuid);

        return view('common/header') . view('profile_home/edit', $data) . view('common/footer');
    }

    function profile_details($uuid)
    {
        $admin_model = new AdminProfileModel();
        $data['admin'] = $admin_model->getAdminByUuid($uuid);

        return view('common/header') . view('profile_home/profile_admin', $data) . view('common/footer');
    }
    function update_admin_profile()
    {
        if ($this->request->getPost()) {
            $admin_model = new AdminProfileModel();

            $uuid = $this->request->getPost('uuid');
            $fname = $this->request->getPost('fname');
            $lname = $this->request->getPost('lname');
            $birthday = $this->request->getPost('birthday');
            $gender = $this->request->getPost('gender');
            $phone = $this->request->getPost('phone');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $admin = $admin_model->getAdminByUuid($uuid);
            $admin_id = $admin['id'];

            $update_date = $admin_model->update_admin($admin_id, $fname, $lname, $birthday, $gender, $phone, $username, $password);

            if ($update_date) {
                $data = ['status' => 200, 'message' => lang('profile.edit-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.edit-error')];
            }

            echo json_encode($data);
            exit;
        }
    }

    function edit_form_user($uuid)
    {
        if ($this->request->getPost()) {
            $profile_model = new Profile_HomeModel();

            $file = $this->request->getFile('file_image');
            $user = $profile_model->getProfileHomeByUuid($uuid);

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

            $updataed_data = $profile_model->updateProfileById($id, $data);

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
            $profile_model = new Profile_HomeModel();
            $delete_user = $profile_model->getProfileHomeByUuid($uuid);
            $id = $delete_user['id'];

            $deleted = $profile_model->delete($id);

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
        $profile_model = new Profile_HomeModel();
        $users = $profile_model->getProfileAllByUUID($uuid);

        if (!$profile_model) {
            throw new \Exception('User not found');
        }

        $timestamp = strtotime($users['birthdate']);
        $users['birthdate'] = date('d-m-', $timestamp) . (date('Y', $timestamp) + 543);
        $data['users'] = $users;

        return view('common/header') . view('profile_home/detailsProifle', $data) . view('common/footer');

    }


    function login()
    {
        $session = session();
        $admin_model = new AdminProfileModel();

        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $admin_model->where('username', $username)->first();

            if ($user) {
                $pass = $user['password'];
                $authPassword = password_verify($password, $pass);

                if ($authPassword) {
                    $sessionData = [
                        'uuid' => $user['uuid'],
                        'username' => $user['username'],
                        'logged_in' => TRUE
                    ];
                    $session->set($sessionData);
                    return $this->response->setJSON(['success' => true]);
                } else {
                    return $this->response->setJSON(['success' => false, 'message' => 'รหัสผ่านไม่ถูกต้อง']);
                }
            } else {
                error_log('User not found: ' . $username);
                return $this->response->setJSON(['success' => false, 'message' => 'ไม่พบชื่อผู้ใช้']);
            }
        }

        echo view('common/header', ['title' => 'Login']);
        echo view('profile_home/login');
        echo view('common/footer');
    }

    function register()
    {

        $admin_model = new AdminProfileModel();
        $uuid = Uuid::uuid4();

        if ($this->request->getMethod() === 'POST') {

            $admin_model->save([
                'uuid' => $uuid->toString(),
                'fname' => $this->request->getPost('fname'),
                'lname' => $this->request->getPost('lname'),
                'birthday' => $this->request->getPost('birthday'),
                'gender' => $this->request->getPost('gender'),
                'phone' => $this->request->getPost('phone'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'type_admin' => 'create-admin-user',
                'status' => 1
            ]);

            return redirect()->to('/login')->with('success', 'Register created successfully');

        } else {
            echo view('common/header', ['title' => 'ฟอร์มสมัคร Admin']);
            echo view('profile_home/register');
            echo view('common/footer');
        }
    }

    function check_duplicate()
    {
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');

        $admin_model = new AdminProfileModel();

        $isDuplicate = $admin_model->ckeckDuplicate($fname, $lname);

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
