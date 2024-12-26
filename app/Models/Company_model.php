<?php

namespace App\Models;

use CodeIgniter\Model;

// app/Models/TrafficModel.php



class Company_model extends Model
{
    protected $table = 'company_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Name','email','Address','Logo','Cover_Image','GST_number','PAN','CIN'];
}