<?php
namespace App\Models;

use CodeIgniter\Model;

class ProfileRelativeModel extends Model
{
    protected $table = 'tb_user_relative';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['uuid', 'name_th', 'name_en'];
    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = true;
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

    function getRelative()
    {
        return $this->findAll();
    }
    function getUiidRel()
    {
        return $this->select('uuid')->findAll();
    }
    function getUserRelativeByUUID($uuid)
    {
        return $this->select('rel.id, rel.uuid, rel.name_th, user.uuid as user_uuid, user.fname, user.lname')
                    ->join('tb_user as user', 'user.relative_id = rel.id', 'left')
                    ->where('rel.uuid', $uuid)
                    ->findAll();
    }


}