<?php

namespace App\Models;

use CodeIgniter\Model;

class Blog_Model extends Model
{
    protected $table = 'blogs'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['blog_tittle', 'blog_image', 'blog_metatag','blog_meta_description','blog_meta_tittle','blog_Status','published_date','published_by']; 
}
