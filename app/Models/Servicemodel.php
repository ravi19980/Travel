<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = ' service'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['Name', 'Description', 'icon'];
}
