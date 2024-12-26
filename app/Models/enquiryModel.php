<?php

namespace App\Models;

use CodeIgniter\Model;

class enquiryModel extends Model
{
    protected $table = 'enquiry'; 
    protected $primaryKey = 'id'; 

    protected $allowedFields = ['Name', 'Email', 'phone','Service','message','Domain_name','company','subject','comments','status']; 

    // protected $allowedFields = ['name','Services','email','phone','company','subject','comments'];
}
