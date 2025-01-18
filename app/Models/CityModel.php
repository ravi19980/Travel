<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table = 'city'; 
    protected $primaryKey = 'city_id'; 
    protected $allowedFields = [
        'city_id',
        'city_name',
        'state_id',
        'country_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
