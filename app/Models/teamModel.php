<?php

namespace App\Models;

use CodeIgniter\Model;

class teamModel extends Model
{
    protected $table = 'team_member'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['employee', 'email', 'image','designation','phone','join_date','created_at']; 
}
