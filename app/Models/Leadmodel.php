<?php

namespace App\Models;

use CodeIgniter\Model;

class Leadmodel  extends Model
{
    protected $table = 'callinginfo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['time','date','leadstatus','Action','enquiry_id','intialstatus','remark','Created_at'];
}