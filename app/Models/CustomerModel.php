<?php

namespace App\Models;

use CodeIgniter\Model;

// app/Models/TrafficModel.php



class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Customername','email','Phone_Number','Address','City','State','Zip','Country','DOB','Gender','GSTN','Service','Additional_note'];
}
