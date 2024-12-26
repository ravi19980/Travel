<?php

namespace App\Models;

use CodeIgniter\Model;

// app/Models/TrafficModel.php



class ContactModel extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','Services','email','phone','company','subject','comments'];
}