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

    public function ckeckDuplicate($fname, $lname)
    {
        $query = $this->where('fname', $fname)->where('lname', $lname)->get();
        
        if($query->getNumRows() > 0){
            return $query->getNumRows();
        }else{
            return $query;
        }
        // return ($query->getNumRows() > 0);
    }
}