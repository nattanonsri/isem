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
        $data = $this->where(['id' => ADMIN_ID, 'uuid' => $uuid])->first();
        return $data;

    }

    public function groupAdminProfile()
    {
        $builder = $this->db->table($this->table);
        $builder->select('id, uuid, CONCAT(fname, " ", lname) as fullname, birthday, gender, phone, username, password');

        $query = $builder->get();
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

    public function ckeckDuplicate($fname, $lname)
    {
        $query = $this->where('fname', $fname)->where('lname', $lname)->get();

        if ($query->getNumRows() > 0) {
            return $query->getNumRows();
        } else {
            return $query;
        }
    }

    public function update_admin($id, $fname, $lname, $birthday, $gender, $phone, $username, $password)
    {
        $data = [
            'fname' => $fname,
            'lname' => $lname,
            'birthday' => $birthday,
            'gender' => $gender,
            'phone' => $phone,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $update_data = $this->update($id, $data);
        return $update_data;
    }


}