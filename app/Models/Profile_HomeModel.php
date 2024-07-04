<?php

namespace App\Models;

use CodeIgniter\Model;

class Profile_HomeModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'uuid',
        'prefix',
        'fname',
        'lname',
        'card_id',
        'birthdate',
        'disease_id',
        'disease_details',
        'succor_id',
        'relative_id',
        'caretaker',
        'medicines',
        'coordinates',
        'file_image'
    ];

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

    public function getProfileHome()
    {
        return $this->findAll();
    }

    public function getProfileAll($disease = '',$relative= '', $succor = '')
    {
        $db = \Config\Database::connect();

        $builder = $db->table('tb_user as user');
        $builder->select('user.id, 
        user.uuid as user_uuid,
        user.prefix,
        user.fname, 
        user.lname, 
        user.card_id, 
        user.birthdate, 
        disease.uuid as disease_uuid, 
        disease.name_th as disease_name, 
        user.disease_details, 
        succor.id as succor_id,
        succor.uuid as succor_uuid,
        succor.name_th as succor_name,
        relative.uuid as relative_uuid,
        relative.name_th as relative_name,
        user.caretaker,
        user.coordinates,
        user.file_image
        ');
        $builder->join('tb_user_disease as disease', 'disease.id = user.disease_id', 'left');
        $builder->join('tb_user_succor as succor', 'succor.id = user.succor_id', 'left');
        $builder->join('tb_user_relative as relative', 'relative.id = user.relative_id', 'left');

        if($disease != ''){
            $builder->where('user.disease_id', $disease);
        }
        if($relative != ''){
            $builder->where('user.relative_id', $relative);
        }
        if($succor != ''){
            $builder->where('user.succor_id', $succor);
        }
        
        $query = $builder->get();
        $results = $query->getResultArray();

        


        return $results;
    }

}
