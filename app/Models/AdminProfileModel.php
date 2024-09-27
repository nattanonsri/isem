<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminProfileModel extends Model
{
    protected $table = 'tb_admin_profile';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['uuid', 'fname', 'lname', 'birthday', 'gender', 'phone', 'username', 'password'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'datetime';
    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getAdminProfile()
    {
        return $this->findAll();
    }

    public function getAdminByUuid($uuid)
    {
        $data = $this->where('uuid', $uuid)->first();
        return $data;

    }

    public function groupAdminProfile()
    {
        $admin = $this->db->table($this->table);
        $admin->select('id, uuid, CONCAT(fname, " ", lname) as fullname, birthday, gender, phone, username, password');
        $admin->where('type_admin', 'officer');
        $query = $admin->get();
        $results = $query->getResultArray();

        return $results;
    }

    public function groupAdminProfileROW($admin_id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('id, uuid, CONCAT(fname, " ", lname) as fullname, birthday, gender, phone, username, password')->where('id', $admin_id);

        $query = $builder->get();
        $results = $query->getRowArray();

        return $results;
    }

    public function checkDuplicate($data)
    {

        $query = $this->where('fname', $data['fname'])
            ->where('lname', $data['lname'])
            ->where('username', $data['username']);

        $result = $query->get();

        if ($result->getNumRows() > 0) {
            return $result->getNumRows();
        } else {

            return $result->getRowArray();
        }
    }

    public function _updateAdmin($id, $type, $data)
    {
        $update_data = [
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'birthday' => $data['birthday'],
            'gender' => $data['prefix'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        ];

        return $this->where('type_admin', $type)->update($id, $update_data, false);
    }


}