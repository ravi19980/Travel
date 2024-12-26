<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel  extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','usertype','domain','domain_url','company_name','Created_at'];
}