<?php
namespace App\Controllers;

use App\Models\Profile_HomeModel;
use App\Models\AdminProfileModel;
use CodeIgniter\Controller;
use Ramsey\Uuid\Uuid;

class Profile_HomeController extends Controller
{
    protected $helpers = ['url', 'form'];
    public function index()
    {
        $user = new Profile_HomeModel();

        $profile = $user->getProfileAll();

        $data['profile'] = $profile;

        echo view('common/header', $data);
        echo view('profile_home/index', $data);
        echo view('common/footer', $data);

    }
    public function createProfile()
    {
        echo view('common/header', ['title' => 'ฟอร์มเพิ่มข้อมูล']);
        echo view('profile_home/create');
        echo view('common/footer');
    }

    public function uploadForm()
    {

        $insertProfile = new Profile_HomeModel();
        if ($this->request->getPost()) {
            $prefix = $this->request->getPost('prefix');
            $fname = $this->request->getPost('fname');
            $lname = $this->request->getPost('lname');
            $card_id = $this->request->getPost('card_id');
            $birthdate = $this->request->getPost('birthdate');
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
                'coordinates' => $coordinates,
                'disease_id' => $disease_id,
                'disease_details' => $disease_details,
                'succor_id' => $succor_id,
                'relative_id' => $relative_id,
                'caretaker' => $caretaker,
                'medicines' => $medicines,
                'file_image' => $file_image,
            );

            $insert = $insertProfile->insert($data);

            if ($insert) {
                $data = array('status' => 200, 'message' => 'success');
            } else {
                $data = array('status' => 400, 'message' => 'error');
            }

            echo json_encode($data);
            exit();
        }
        // echo '<pre>';
        // var_dump($imageNameUpload);
        // exit();

    }

    public function edit($id)
    {

        $editUser = new Profile_HomeModel();

        if (!empty($id)) {
            $data = [
                'profile' => $editUser->find($id),
                'title' => 'แก้ไข ข้อมูลผู้สูงอายุ'
            ];
        }
        // chech profile edit
        if (!$data['profile']) {
            log_message('error', 'UUID: ' . $id);
            log_message('error', 'Profile not found for UUID: ' . $id);
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Profile not found');
        }
        if ($this->request->getMethod() === 'POST') {

            $file = $this->request->getFile('file_image');

            $updateData = [
                'id' => $id,
                'prefix' => $this->request->getPost('prefix'),
                'fname' => $this->request->getPost('fname'),
                'lname' => $this->request->getPost('lname'),
                'card_id' => $this->request->getPost('card_id'),
                'birthdate' => $this->request->getPost('birthdate'),
                'disease_id' => $this->request->getPost('disease_id'),
                'disease_details' => $this->request->getPost('disease_details'),
                'succor_id' => $this->request->getPost('succor_id'),
                'relative_id' => $this->request->getPost('relative_id'),
                'caretaker' => $this->request->getPost('caretaker'),
                'medicines' => $this->request->getPost('medicines'),
                'coordinates' => $this->request->getPost('coordinates'),

            ];

            if ($file->isValid() && !$file->hasMoved()) {
                $profile = $data['profile'];

                if ($profile['file_image']) {
                    unlink($profile['file_image']);
                }

                $fname = $this->request->getPost('fname');
                $lname = $this->request->getPost('lname');
                $birthdate = $this->request->getPost('birthdate');
                $imageName = "{$fname}_{$lname}_{$birthdate}." . $file->getExtension();

                $file->move('uploads/profiles/', $imageName);
                $filePath = 'uploads/profiles/' . $imageName;
                $updateData['file_image'] = $filePath;

            }
            if ($editUser->save($updateData)) {
                return redirect()->to('/profile')->with('success', 'Profile created successfully');
            } else {
                $data['info_msg'] = 'อัพเดท profile ผิดพลาด';
                echo view('common/header', $data);
                echo view('profile_home/edit', $data);
                echo view('common/footer');
            }
        } else {
            echo view('common/header', ['title' => 'แก้ไข profile']);
            echo view('profile_home/edit', $data);
            echo view('common/footer');
        }


    }

    public function delete($id)
    {
        $model = new Profile_HomeModel();

        if ($model->delete($id)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Profile deleted successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'error' => 'Failed to delete profile'], 500);
        }
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
                    // return redirect()->to('profile')->with('session', $sessionData);
                    return $this->response->setJSON(['success' => true]);
                } else {
                    return $this->response->setJSON(['success' => false, 'message' => 'รหัสผ่านไม่ถูกต้อง']);
                }
            } else {
                error_log('User not found: ' . $username); // Log error
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
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
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
