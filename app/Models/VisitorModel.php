<?php

namespace App\Models;

use CodeIgniter\Model;

// app/Models/TrafficModel.php



class VisitorModel extends Model
{
    protected $table = 'visitors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['visitor_count','user_agent','referer'];
}


