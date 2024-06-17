<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminProfileModel extends Model
{

    protected $table = 'tb_admin_profile';

    protected $primaryKey = 'id';

    protected $allowedFields = ['uuid', 'fname', 'lname', 'birthday', 'gender', 'phone', 'username', 'password'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'datetime';
    public function getAdminProfile()
    {

        return $this->findAll();

    }

    public function ckeckDuplicate($fname, $lname)
    {
        $query = $this->where('fname', $fname)->where('lname', $lname)->get();

        return ($query->getNumRows() > 0);
    }
}