<?php
namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'db_members';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'username', 'password', 'image','birthdate'];

    // Automatically handle created_at and updated_at
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getMember()
    {
        return $this->findAll();
    }
}
