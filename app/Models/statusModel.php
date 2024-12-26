<?php

namespace App\Models;

use CodeIgniter\Model;

class statusModel extends Model
{
    protected $table = ' status'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['status_name', 'Createddate'];
}