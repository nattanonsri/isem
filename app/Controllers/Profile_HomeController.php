<?php
namespace App\Controllers;

use App\Models\Profile_HomeModel;
use App\Models\AdminProfileModel;
use CodeIgniter\Controller;
use Ramsey\Uuid\Uuid;

$lang = \Config\Services::language();
$lang->setLocale('th');
class Profile_HomeController extends Controller
{
    protected $helpers = ['url', 'form'];

    public function index()
    {
        // $user = new Profile_HomeModel();

        // $profile = $user->user_search();
        // $data['profile'] = $profile;
        return view('common/header') . view('profile_home/index') . view('common/footer');

    }


    public function user_search()
    {

        $model = new Profile_HomeModel();

        $search = $this->request->getPost('search');

        $data['profile'] = $model->user_search($search);

        return view('common/header') . view('profile_home/card', $data) .  view('common/footer');

    }
    public function load_add_user()
    {
        echo view('common/header', ['title' => 'ฟอร์มเพิ่มข้อมูล']);
        echo view('profile_home/create');
        echo view('common/footer');
    }

    public function add_from_user()
    {
        $insertProfile = new Profile_HomeModel();
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
            $file->move('uploads/profiles/', $imageNameUpload);
            $file_image = 'uploads/profiles/' . $imageNameUpload;

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
                'status' => 1
            );



            $insert = $insertProfile->insert($data);

            if ($insert) {
                $data = array('status' => 200, 'message' => lang('profile.create-success'));
            } else {
                $data = array('status' => 400, 'message' => lang('profile.create-error'));
            }

            echo json_encode($data);
            exit();
        }
    }

    public function load_edit_form_user($uuid)
    {
        $editUser = new Profile_HomeModel();
        $data['profile'] = $editUser->getProfileHomeByUuid($uuid);

        return view('common/header') . view('profile_home/edit', $data) . view('common/footer');
    }

    public function edit_form_user($uuid)
    {
        $editUser = new Profile_HomeModel();

        if ($this->request->getPost()) {

            $file = $this->request->getFile('file_image');
            $user = $editUser->getProfileHomeByUuid($uuid);

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
                $file->move('uploads/profiles/', $imageName);
                $data['file_image'] = 'uploads/profiles/' . $imageName;
            }

            $updataed_data = $editUser->updateProfileById($id, $data);

            if ($updataed_data !== false) {
                $data = ['status' => 200, 'message' => lang('profile.edit-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.edit-error')];
            }

            echo json_encode($data);
            exit;
        }
    }

    public function delete_form_user($uuid)
    {
        $dalete_user = new Profile_HomeModel();
        if ($this->request->getMethod() === 'DELETE') {
            $delete_user = $dalete_user->getProfileHomeByUuid($uuid);
            $id = $delete_user['id'];

            $deleted = $dalete_user->delete($id);

            if ($deleted !== false) {
                $data = ['status' => 200, 'message' => lang('profile.delete-success')];
            } else {
                $data = ['status' => 400, 'message' => lang('profile.delete-error')];
            }

            echo json_encode($data);
            exit;

        }

    }

    public function detail_all_user($uuid)
    {
        $user = new Profile_HomeModel();
        $users = $user->getProfileAllByUUID($uuid);

        if (!$user) {
            throw new \Exception('User not found');
        }

        $timestamp = strtotime($users['birthdate']);
        $users['birthdate'] = date('d-m-', $timestamp) . (date('Y', $timestamp) + 543);
        $data['users'] = $users;

        return view('common/header') . view('profile_home/detailsProifle', $data) . view('common/footer');

    }


    public function login()
    {
        $session = session();
        $model = new AdminProfileModel();

        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $model->where('username', $username)->first();

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

    public function register()
    {

        $model = new AdminProfileModel();
        $uuid = Uuid::uuid4();

        if ($this->request->getMethod() === 'POST') {

            $model->save([
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

    public function check_duplicate()
    {
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');

        $model = new AdminProfileModel();

        $isDuplicate = $model->ckeckDuplicate($fname, $lname);

        echo json_encode(['isDuplicate' => $isDuplicate]);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/login')->with('success', 'You have been logged out');

    }
}
