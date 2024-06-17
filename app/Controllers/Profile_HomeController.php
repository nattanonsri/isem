<?php
namespace App\Controllers;

use App\Models\Profile_HomeModel;
use App\Models\AdminProfileModel;
use CodeIgniter\Controller;
use Ramsey\Uuid\Uuid;



class Profile_HomeController extends Controller
{
    public function index()
    {

        $model = new Profile_HomeModel();

        $data['profile'] = $model->getProfileHome();

        echo view('common/header', $data);
        echo view('profile_home/index', $data);
        echo view('common/footer', $data);

    }
    public function create()
    {


        $model = new Profile_HomeModel();

        $uuid = Uuid::uuid4();

        if ($this->request->getMethod() === 'POST') {

            $file = $this->request->getFile('file_image');

            // if ($file->isValid() && !$file->hasMoved()) {

            $fname = $this->request->getPost('fname');
            $lname = $this->request->getPost('lname');
            $birthdate = $this->request->getPost('birthdate');

            $imageNameUpload = "{$fname}-{$lname}-{$birthdate}.jpeg";
            $file->move('uploads/profiles/', $imageNameUpload);
            $filePath = 'uploads/profiles/' . $imageNameUpload;

            $model->save([
                'uuid' => $uuid->toString(),
                'prefix' => $this->request->getPost('prefix'),
                'fname' => $this->request->getPost('fname'),
                'lname' => $this->request->getPost('lname'),
                'card_id' => $this->request->getPost('card_id'),
                'birthdate' => $this->request->getPost('birthdate'),
                'disease' => $this->request->getPost('disease'),
                'disease_details' => $this->request->getPost('disease_details'),
                'succor' => $this->request->getPost('succor'),
                'relative' => $this->request->getPost('relative'),
                'caretaker' => $this->request->getPost('caretaker'),
                'medicines' => $this->request->getPost('medicines'),
                'coordinates' => $this->request->getPost('coordinates'),
                'file_image' => $filePath
            ]);


            return redirect()->to('/profile')->with('success', 'Profile created successfully');
            // } else {
            //     return redirect()->back()->with('error', 'File upload failed: ' . $file->getErrorString());
            // }
        } else {
            echo view('common/header', ['title' => 'ฟอร์มเพิ่มข้อมูล']);
            echo view('profile_home/create');
            echo view('common/footer');
        }


    }

    public function edit($id)
    {

        $model = new Profile_HomeModel();

        if (!empty($id)) {
            $data = [
                'profile' => $model->find($id),
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
                'disease' => $this->request->getPost('disease'),
                'disease_details' => $this->request->getPost('disease_details'),
                'succor' => $this->request->getPost('succor'),
                'relative' => $this->request->getPost('relative'),
                'caretaker' => $this->request->getPost('caretaker'),
                'medicines' => $this->request->getPost('medicines'),
                'coordinates' => $this->request->getPost('coordinates'),

            ];



            if ($file->isValid() && !$file->hasMoved()) {

                // list($width, $height) = getimagesize($file->getPathname());

                // if ($width == 1920 && $height == 1080) {

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
                // } else {
                //     return redirect()->back()->with('error', 'Image must be 1920x1080 pixels.');
                // }
            }
            if ($model->save($updateData)) {
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
