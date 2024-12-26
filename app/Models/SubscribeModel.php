<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscribeModel extends Model {
    protected $table = 'subscribe';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email','is_subscribe','created_at','updated_at'];
}