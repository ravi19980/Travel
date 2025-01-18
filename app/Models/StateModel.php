<?php

namespace App\Models;

use CodeIgniter\Model;

class StateModel extends Model
{
    protected $table = 'state'; 
    protected $primaryKey = 'state_id'; 
    protected $allowedFields = [
        'state_id',
        'state_name',
        'state_code',
        'country_id',
        'short_name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
