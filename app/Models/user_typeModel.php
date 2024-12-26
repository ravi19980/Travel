<?php

namespace App\Models;

use CodeIgniter\Model;

class user_typeModel extends Model
{
    protected $table = ' user_type'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['usertype', 'Createddate'];  
}
