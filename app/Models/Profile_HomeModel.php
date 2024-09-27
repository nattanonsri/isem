<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

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
        'phone',
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

        $data = $this->findAll();
        return $data;
    }

    public function _getProfileNumRowMale()
    {
        return $this->where('prefix', 'นาย')->countAllResults();
    }
    public function _getProfileNumRowFemale()
    {
        return $this->whereIn('prefix', ['นาง', 'นางสาว'])->countAllResults();
    }
    public function _getProfileNumAll()
    {
        return $this->countAllResults();
    }
    public function getProfileHomeByUuid($uuid)
    {
        $data = $this->where('uuid', $uuid)->first();
        return $data;
    }
    public function updateProfileById($id, $data)
    {
        return $this->update($id, $data);
    }
    public function getProfileAll($search = '', $field = '', $value = false)
    {
        $builder = $this->db->table($this->table);
        $builder->select('
        tb_user.id, 
        tb_user.uuid as user_uuid,
        tb_user.prefix,
        CONCAT(tb_user.fname, " ", tb_user.lname) as fullname,
        tb_user.card_id, 
        tb_user.birthdate, 
        tb_user.phone, 
        tb_user.disease_id as disease_id,
        disease.uuid as disease_uuid, 
        disease.name_th as disease_name, 
        tb_user.disease_details, 
        tb_user.succor_id as succor_id,
        succor.uuid as succor_uuid,
        succor.name_th as succor_name,
        tb_user.relative_id as relative_id,
        relative.uuid as relative_uuid,
        relative.name_th as relative_name,
        tb_user.caretaker,
        tb_user.coordinates,
        tb_user.medicines,
        tb_user.file_image
        ');
        $builder->join('tb_user_disease as disease', 'disease.id =  tb_user.disease_id', 'left');
        $builder->join('tb_user_succor as succor', 'succor.id =  tb_user.succor_id', 'left');
        $builder->join('tb_user_relative as relative', 'relative.id =  tb_user.relative_id', 'left');

        if (!empty($search)) {
            $builder->groupStart()
                ->like('tb_user.prefix', $search)
                ->orLike('tb_user.fname', $search)
                ->orLike('tb_user.lname', $search)
                ->orLike('CONCAT(tb_user.prefix, tb_user.fname)', $search)
                ->orLike('CONCAT(tb_user.fname, " ", tb_user.lname)', $search)
                ->orLike('CONCAT(tb_user.prefix, " ", tb_user.fname, " ", tb_user.lname)', $search)
                ->groupEnd();
        }

        if ($field == 'relative') {
            $builder->where('tb_user.relative_id', '1');
        } else if ($field == 'disease') {
            $builder->where('tb_user.disease_id', '2');
        } else if ($field == 'succor') {
            $builder->where('tb_user.succor_id', '1');
        }

        $results = $builder->get()->getResultArray();

        return $results;
    }


    public function user_search($search = '')
    {


        $builder = $this->db->table($this->table);
        $builder->select('
        tb_user.id, 
        tb_user.uuid as user_uuid,
        tb_user.prefix,
        CONCAT(tb_user.fname, " ", tb_user.lname) as fullname,
        tb_user.card_id, 
        tb_user.birthdate, 
        tb_user.phone, 
        disease.uuid as disease_uuid, 
        disease.name_th as disease_name, 
        tb_user.disease_details, 
        succor.id as succor_id,
        succor.uuid as succor_uuid,
        succor.name_th as succor_name,
        relative.uuid as relative_uuid,
        relative.name_th as relative_name,
        tb_user.caretaker,
        tb_user.coordinates,
        tb_user.medicines,
        tb_user.file_image,
        tb_user.created_at,
        tb_user.updated_at,

        ');
        $builder->join('tb_user_disease as disease', 'disease.id =  tb_user.disease_id', 'left');
        $builder->join('tb_user_succor as succor', 'succor.id =  tb_user.succor_id', 'left');
        $builder->join('tb_user_relative as relative', 'relative.id =  tb_user.relative_id', 'left');
        $builder->orderBy('tb_user.updated_at', 'DESC');
        if (!empty($search)) {
            $builder->like('CONCAT( tb_user.fname, " ",  tb_user.lname)', $search);
        }

        $query = $builder->get();
        $results = $query->getResultArray();

        return $results;
    }

    public function getProfileAllByUUID($uuid)
    {
        $builder = $this->db->table($this->table);
        $builder->select('
        tb_user.id, 
        tb_user.uuid as user_uuid,
        tb_user.prefix,
        CONCAT(tb_user.fname, " ", tb_user.lname) as fullname,
        tb_user.card_id, 
        tb_user.birthdate, 
        tb_user.phone, 
        disease.id as disease_id, 
        disease.uuid as disease_uuid, 
        disease.name_th as disease_name, 
        tb_user.disease_details, 
        succor.id as succor_id,
        succor.uuid as succor_uuid,
        succor.name_th as succor_name,
        relative.id as relative_id,
        relative.uuid as relative_uuid,
        relative.name_th as relative_name,
        tb_user.caretaker,
        tb_user.medicines,
        tb_user.coordinates,
        tb_user.file_image
        ');
        $builder->join('tb_user_disease as disease', 'disease.id =  tb_user.disease_id', 'left');
        $builder->join('tb_user_succor as succor', 'succor.id =  tb_user.succor_id', 'left');
        $builder->join('tb_user_relative as relative', 'relative.id =  tb_user.relative_id', 'left');
        $builder->where('tb_user.uuid', $uuid);


        $query = $builder->get();
        $results = $query->getRowArray();

        return $results;
    }

    public function calculateAge($birthDate)
    {
        $birthDate = new DateTime($birthDate);
        $currentDate = new DateTime();
        $age = $currentDate->diff($birthDate)->y;

        return $age;
    }
    public function getLoginCountsByDate()
    {
        // $current = CURRENT_DATE;
        $current = date('Y-m-d', strtotime(CURRENT_DATE));
        $new_date1 = date('Y-m-d', strtotime('-1 days', strtotime(CURRENT_DATE)));
        $new_date2 = date('Y-m-d', strtotime('-2 days', strtotime(CURRENT_DATE)));
        $new_date3 = date('Y-m-d', strtotime('-3 days', strtotime(CURRENT_DATE)));
        $new_date4 = date('Y-m-d', strtotime('-4 days', strtotime(CURRENT_DATE)));

        $get_dateTime1 = $this->where('DATE(updated_at)', $current)->countAllResults();
        $get_dateTime2 = $this->where('DATE(updated_at)', $new_date1)->countAllResults();
        $get_dateTime3 = $this->where('DATE(updated_at)', $new_date2)->countAllResults();
        $get_dateTime4 = $this->where('DATE(updated_at)', $new_date3)->countAllResults();
        $get_dateTime5 = $this->where('DATE(updated_at)', $new_date4)->countAllResults();


        return [
            'get_dateTime1' => $get_dateTime1,
            'get_dateTime2' => $get_dateTime2,
            'get_dateTime3' => $get_dateTime3,
            'get_dateTime4' => $get_dateTime4,
            'get_dateTime5' => $get_dateTime5,
        ];

    }
}
