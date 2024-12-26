<?php

namespace App\Models;

use CodeIgniter\Model;

// app/Models/TrafficModel.php



class CareerModel extends Model
{
    protected $table = 'careerdata';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','email','phone','resume','resumelink','subject'];
}