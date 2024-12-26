<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'logi';
    protected $primaryKey = 'id';
 protected $allowedFields = ['email', 'password', 'original password','otp', 'otp_expires_at'];


   
    
        public function AdminLoginApi($email, $pass)
        {
            return $this->where('email', $email)
                        ->where('password', $pass)
                        ->get()
                        ->getRow();   
        }
    
    

}