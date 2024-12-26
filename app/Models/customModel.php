<?php

namespace App\Models;

use CodeIgniter\Model;

// app/Models/TrafficModel.php



class customModel extends Model
{
    protected $table = 'customer_type';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Customer_type'];
}
