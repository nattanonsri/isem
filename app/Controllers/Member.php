<?php
namespace App\Controllers;

use App\Models\MemberModel;
use CodeIgniter\Controller;

class Member extends Controller
{

    public function index()
    {

        $model = new MemberModel();

        $data['member'] = $model->getMember();

        // var_dump($data);exit();

        echo view('common/header', $data);
        echo view('member/overview', $data);
        echo view('common/footer', $data);

    }

    public function create()
    {
        $model = new MemberModel();

        $file = $this->request->getFile('image');

        if (
            $this->request->getMethod() === 'POST' && $this->validate([
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
                'birthdate' => 'required',
                'image' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'

            ])
        ) {
            if ($file->isValid() && !$file->hasMoved()) {

                $imageName = $file->getRandomName();
                $file->move('uploads/', $imageName);

                $filePath = 'uploads/' . $imageName;

                // เข้ารหัสรหัสผ่านก่อนบันทึก
                $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);


                $model->save([
                    'name' => $this->request->getPost('name'),
                    'username' => $this->request->getPost('username'),
                    'password' => $hashedPassword,
                    'birthdate' => $this->request->getPost('birthdate'),
                    'image' => $filePath
                ]);

            }

            $data['info_msg'] = 'News item created successfully.';
            echo view('common/header', $data);
            echo view('member/success', $data);
            echo view('common/footer');
            return;
        } else {
            echo view('common/header', ['title' => 'Create a news item']);
            echo view('member/create');
            echo view('common/footer');
        }



    }

    public function edit($id)
    {
        $model = new MemberModel();

        if (!empty($id)) {
            $data = [
                'member' => $model->find($id),
                'title' => 'Edit Member',
            ];
        }

        // Check if the member exists
        if (!$data['member']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Member not found');
        }

        if (
            $this->request->getMethod() == 'POST' && $this->validate([
                'name' => 'required',
                'username' => 'required',
                'birthdate' => 'required',
                'image' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
            ])
        ) {


            $file = $this->request->getFile('image');

            // เตรียมข้อมูลที่ต้องการอัปเดต
            $updateData = [
                'id' => $id,
                'name' => $this->request->getPost('name'),
                'username' => $this->request->getPost('username'),
                'birthdate' => $this->request->getPost('birthdate')
            ];

            if ($file->isValid() && !$file->hasMoved()) {

                $member = $data['member'];
                // Delete the old image if exists
                if ($member['image']) {
                    unlink($member['image']);
                }

                $imageName = $file->getRandomName();
                $file->move('uploads/', $imageName);
                $filePath = 'uploads/' . $imageName;
                $updateData['image'] = $filePath;



                // ตรวจสอบว่ามีการกรอกรหัสผ่านใหม่หรือไม่
                if ($this->request->getPost('password')) {
                    $updateData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
                }
            }

            // บันทึกข้อมูล
            if ($model->save($updateData)) {
                $data['info_msg'] = 'Member updated successfully.';
                echo view('common/header', $data);
                echo view('member/success', $data);
                echo view('common/footer');
            } else {
                $data['info_msg'] = 'Failed to update member.';
                echo view('common/header', $data);
                echo view('member/edit', $data);
                echo view('common/footer');
            }
        } else {
            echo view('common/header', ['title' => 'Edit Member']);
            echo view('member/edit', $data);
            echo view('common/footer');
        }
    }

    public function delete($id)
    {
        $model = new MemberModel();

        // ตรวจสอบว่ามีข้อมูล id ที่จะลบหรือไม่
        if (!empty($id)) {
            // ลบข้อมูลสมาชิกโดยใช้ id
            if ($model->delete($id)) {
                return redirect()->to('/member')->with('status', 'Member deleted successfully');
            } else {
                return redirect()->to('/member')->with('status', 'Failed to delete member');
            }
        } else {
            return redirect()->to('/member')->with('status', 'No member id provided');
        }
    }

}