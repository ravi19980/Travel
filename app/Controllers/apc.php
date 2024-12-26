<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SubscribeModel;
use App\Models\Company_model;
use App\Models\customModel;  
use App\Models\VisitorModel;
use App\Models\enquiryModel;
use App\Models\ServiceModel;
use App\Models\LoginModel;
use App\Models\Blog_Model;
use App\Models\CustomerModel;



use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;

class api extends Controller
{
    use ResponseTrait;

   public function AdminLogin_post()
    {
        $model = new LoginModel();
        
   
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');


        $validationRules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[5]'
        ];

        if (!$this->validate($validationRules)) {
          
            return $this->failValidation($this->validator->getErrors());
        }

      $userData = $model->AdminLoginApi($email, md5($password));

        if ($userData) {
           
            $sessionData = [
                'id' => $userData->id,
                'email' => $userData->email,
                'logged_in' => true
            ];

            session()->set('admindata', $sessionData);
           return $this->respondCreated(['status' => 'success', 'message' => 'Logged in successfully.']);
        } else {
           return $this->failUnauthorized('Invalid credentials.');
        }
    }

    public function enquiry_post()
    {
        $enquiryModel = new enquiryModel();
  
        $currentUrl = current_url();

        $parsedUrl = parse_url($currentUrl);
        $domainName = $parsedUrl['host'];
      
        $data = [
            'Name' => $this->request->getPost('Name'),
            'Email' => $this->request->getPost('Email'),
            'message' => $this->request->getPost('message'),
            'Service' => $this->request->getPost('Service'),
            'Domain_name' => $domainName
        ];
    
        if ($enquiryModel->insert($data)) {
            return $this->respondCreated(['status' => 'success', 'message' => 'enquiry information saved successfully']);  
        } else {
            return $this->failServerError('Failed to save enquiry information');
        }
    }
    
    public function enquiry_get()
{
    $enquiryModel = new enquiryModel();
    $contacts = $enquiryModel->findAll();

    if (!empty($contacts)) {
        return $this->respond($contacts);
    } else {
        return $this->failNotFound('No enquiry information found.');
    }
}

public function enquiry_delete()
{
$enquiryModel = new enquiryModel();
$id =$this->request->getPost('id');

if($enquiryModel->find($id)){
$enquiryModel->delete($id);
return $this->respondDeleted(['status' => 'success', 'message' => 'enquiry deleted successfully']);
}else {
       
    return $this->failNotFound('enquiry not found.');
}

}

public function enquiry_update()
{

    $enquiryModel = new enquiryModel();
    $id = $this->request->getPost('id');
   
    $data = [
        'Name' => $this->request->getPost('Name'),   
        'Email' => $this->request->getPost('Email'),
        'message' => $this->request->getPost('message'),
        'Service' => $this->request->getPost('Service'),
        'Domain_name' => $this->request->getPost('Domain_name')
    ];
  
   if ($enquiryModel->find($id)) {
        $enquiryModel->update($id, $data);
         return $this->respond(['status' => 'success', 'message' => 'enquiry updated successfully','Data'=>$data]);
    } else {
     
        return $this->failNotFound('enquiry not found.');
    }
}

public function Service_post()
{
    $serviceModel = new ServiceModel();

    $iconFile = $this->request->getFile('icon');

    if ($iconFile->isValid()) {
   
        $newName = $iconFile->getName();
        $iconFile->move(ROOTPATH . 'writable/uploads', $newName);
  
        $data = [
            'Name' => $this->request->getPost('Name'),
            'Description' => $this->request->getPost('Description'),
            'icon' => $newName  
        ];

     
        if ($serviceModel->insert($data)) {
            return $this->respondCreated(['status' => 'success', 'message' => 'Service information saved successfully']);
        } else {
            return $this->failServerError('Failed to save service');       
        }
    } else {
     
        return $this->failValidationError('No valid file uploaded');           
    }
}

public function Service_get()
{

    $serviceModel = new ServiceModel();
    $services = $serviceModel->findAll();
    if ($services) {
       
        return $this->respond($services);
    } else {
      
        return $this->failNotFound('No services found.');  
    }
}


public function Service_delete()
{

    $serviceModel = new ServiceModel();
    $id = $this->request->getPost('id');
    
    if ($serviceModel->find($id)) {
   
        $serviceModel->delete($id);
        return $this->respondDeleted(['status' => 'success', 'message' => 'Service deleted successfully']);
    } else {
       
        return $this->failNotFound('Service not found.');
    }
}


public function Service_update()
{

    $serviceModel = new ServiceModel();
    $id = $this->request->getPost('id');
    $iconFile = $this->request->getFile('icon');
   if ($iconFile->isValid()) {
   
        $newName = $iconFile->getName();
        $iconFile->move(ROOTPATH . 'writable/uploads', $newName);
    } else {
    
        return $this->failValidationError('Invalid file upload.');
    }
 
    $data = [
        'Name' => $this->request->getPost('Name'),
        'Description' => $this->request->getPost('Description'),                
        'icon' => $newName  
    ];
  
   if ($serviceModel->find($id)) {
        $serviceModel->update($id, $data);
         return $this->respond(['status' => 'success', 'message' => 'Service updated successfully','Data'=>$data]);
    } else {
      return $this->failNotFound('Service not found.');
    }
}



public function Blog_get()
{

    $Blog_Model = new Blog_Model();
    $Blogs = $Blog_Model->findAll();
    if ($Blogs) {
       
        return $this->respond($Blogs);
    } else {
      
        return $this->failNotFound('No Blogs found.');
    }
}
public function Blog_update()
{

    $Blog_Model = new Blog_Model();
    $id = $this->request->getPost('id');

   $currentDate = date('Y-m-d');

    $Blog_image = $this->request->getFile('Blog_image');
    if ($Blog_image->isValid()) {
    
         $newName = $Blog_image->getName();
         $Blog_image->move(ROOTPATH . 'writable/uploads', $newName);
     } else {
     
         return $this->failValidationError('Invalid file upload.');
     }
       $data = [
           'Blog_Tittle' => $this->request->getPost('Blog_Tittle'),
           'Blog_image' => $newName,
           'Blog_MetaTag' => $this->request->getPost('Blog_MetaTag'),
           'Blog_Meta_Description' => $this->request->getPost('Blog_Meta_Description'),
           'Blog_Meta_Tittle' => $this->request->getPost('Blog_Meta_Tittle'),
           'Blog_Status' => $this->request->getPost('Blog_Status'),
           'Published_Date' => $this->request->getPost('Published_Date'),
           'Published_By' => $this->request->getPost('Published_By'),
         
       ];
  
   if ($Blog_Model->find($id)) {
        $Blog_Model->update($id, $data);
         return $this->respond(['status' => 'success', 'message' => 'Blog updated successfully','Data'=>$data]);
    } else {
      return $this->failNotFound('Blog not found.');
    }
}
public function Blog_delete()
{
     $Blog_Model = new Blog_Model();
    $id = $this->request->getPost('id');
    
    if ($Blog_Model->find($id)) {
   
        $Blog_Model->delete($id);
        return $this->respondDeleted(['status' => 'success', 'message' => 'Blog deleted successfully']);
    } else {
       
        return $this->failNotFound('Blog not found.');
    }
}

public function Status_update()
{

    $Blog_Model = new Blog_Model();
    $id = $this->request->getPost('id');

 
       $data = [
            'Blog_Status' => $this->request->getPost('Blog_Status'),
        ];
  
   if ($Blog_Model->find($id)) {
        $Blog_Model->update($id, $data);
         return $this->respond(['status' => 'success', 'message' => 'Status updated successfully','Data'=>$data]);
    } else {
      return $this->failNotFound('Status not found.');     
    }
} 

public function track_get()
{
    $trafficModel = new VisitorModel();

    $session = session();
 
    $visitorCount = $session->get('visitor_count');

    if (!$visitorCount) {
        $visitorCount = 1;
        $session->set('visitor_count', $visitorCount);
    } else {
        $visitorCount++;
        $session->set('visitor_count', $visitorCount);
    }
    $landingPage = $_SERVER['REQUEST_URI'] ?? '';
   
    $data = [
        'visitor_count' => $visitorCount,
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        // 'referer' => $_SERVER['HTTP_REFERER'] ?? '',
        'referer' => $landingPage
    ];

    // print_r( $data);die;
    $trafficModel->insert($data);


    return $this->respondCreated(['status' => 'success', 'count' => $visitorCount, $data ]);
}





public function customer_post(){
    $CustomerModel = new CustomerModel();

    $data = [
        'Name' => $this->request->getPost('Name'),
        'email' => $this->request->getPost('email'), 
        'Phone_Number' => $this->request->getPost('Phone_Number'),
        'Address' => $this->request->getPost('Address'),
        'City' => $this->request->getPost('City'),
        'State' => $this->request->getPost('State'),
        'Zip' => $this->request->getPost('Zip'),
        'Country' => $this->request->getPost('Country'),
        'DOB' => $this->request->getPost('DOB'),
        'Gender' => $this->request->getPost('Gender'),
        'Additional_note' => $this->request->getPost('Additional_note')
        
       
    ];

    if ($CustomerModel->insert($data)) {
        return $this->respondCreated(['status' => 'success', 'message' => 'Customer information saved successfully']);  
    } else {
        return $this->failServerError('Failed to save Customer information');
    }
}
public function Customer_get()
{
    $CustomerModel = new CustomerModel();
    $customer = $CustomerModel->findAll();

    if (!empty($customer)) {
        return $this->respond($customer);
    } else {
        return $this->failNotFound('No enquiry information found.');
    }
}

public function customer_update()
{

    $CustomerModel = new CustomerModel();
    $id = $this->request->getPost('id');

 
 
    $data = [
        'Name' => $this->request->getPost('Name'),
        'email' => $this->request->getPost('email'), 
        'Phone_Number' => $this->request->getPost('Phone_Number'),
        'Address' => $this->request->getPost('Address'),
        'City' => $this->request->getPost('City'),
        'State' => $this->request->getPost('State'),
        'Zip' => $this->request->getPost('Zip'),
        'Country' => $this->request->getPost('Country'),
        'DOB' => $this->request->getPost('DOB'),
        'Gender' => $this->request->getPost('Gender'),
        'Additional_note' => $this->request->getPost('Additional_note')
        
       
    ];
  
   if ($CustomerModel->find($id)) {
        $CustomerModel->update($id, $data);
         return $this->respond(['status' => 'success', 'message' => 'customer updated successfully','Data'=>$data]);
    } else {
      return $this->failNotFound('customer not found.');     
    }
} 

public function Customer_delete()
{
    $CustomerModel = new CustomerModel();
    $id = $this->request->getPost('id');
    
    if ($CustomerModel->find($id)) {
   
        $CustomerModel->delete($id);
        return $this->respondDeleted(['status' => 'success', 'message' => 'Customer deleted successfully']);
    } else {
       
        return $this->failNotFound('Customer not found.');
    }
}

public function Customertype_post()
{
    $customModel = new customModel();

    $data = [
        'Customer_type' => $this->request->getPost('Customer_type')
       
    ];

    if ($customModel->insert($data)) {
        return $this->respondCreated(['status' => 'success', 'message' => 'Customer_type information saved successfully']);  
    } else {
        return $this->failServerError('Failed to save Customer_type information');
    }
}

public function Companydetail_post(){
    $Company_model = new Company_model();

    $Logo = $this->request->getFile('Logo');
    if ($Logo->isValid()) {
    
        $newNamelogo = $Logo->getName();
        $Logo->move(ROOTPATH . 'writable/uploads', $newNamelogo);
    } 



    $Cover_Image = $this->request->getFile('Cover_Image');
    if ($Cover_Image->isValid()) {
    
         $newName = $Cover_Image->getName();
         $Cover_Image->move(ROOTPATH . 'writable/uploads', $newName);
     } 

    $data = [
        'Name' => $this->request->getPost('Name'),
        'Address' => $this->request->getPost('Address'), 
        'Logo' =>$newNamelogo,
        'Cover_Image' => $newName,
        'GST_number' => $this->request->getPost('GST_number'),
        'PAN' => $this->request->getPost('PAN'),
        'CIN' => $this->request->getPost('CIN'),
       
   ];

    if ($Company_model->insert($data)) {
        return $this->respondCreated(['status' => 'success', 'message' => 'Customer information saved successfully']);  
    } else {
        return $this->failServerError('Failed to save Customer information');
    }
}

public function Company_get()
{
    $Company_model = new Company_model();
    $Company = $Company_model->findAll();

    if (!empty($Company)) {
        return $this->respond($Company);
    } else {
        return $this->failNotFound('No Company information found.');
    }
}

public function Company_update()
{

    $Company_model = new Company_model();
    $id = $this->request->getPost('id');

    $Logo = $this->request->getFile('Logo');
    if ($Logo->isValid()) {
    
        $newNamelogo = $Logo->getName();
        $Logo->move(ROOTPATH . 'writable/uploads', $newNamelogo);
    } 

    $Cover_Image = $this->request->getFile('Cover_Image');
    if ($Cover_Image->isValid()) {
    
         $newName = $Cover_Image->getName();
         $Cover_Image->move(ROOTPATH . 'writable/uploads', $newName);
     } 

    $data = [
        'Name' => $this->request->getPost('Name'),
        'Address' => $this->request->getPost('Address'), 
        'Logo' =>$newNamelogo,
        'Cover_Image' => $newName,
        'GST_number' => $this->request->getPost('GST_number'),
        'PAN' => $this->request->getPost('PAN'),
        'CIN' => $this->request->getPost('CIN'),
       
   ];

  if ($Company_model->find($id)) {
        $Company_model->update($id, $data);
         return $this->respond(['status' => 'success', 'message' => 'company updated successfully','Data'=>$data]);
    } else {
      return $this->failNotFound('company not found.');     
    }
} 

public function Company_delete()
{
    $Company_model = new Company_model();
    $id = $this->request->getPost('id');
    
    if ($Company_model->find($id)) {
   
        $Company_model->delete($id);
        return $this->respondDeleted(['status' => 'success', 'message' => 'Customer deleted successfully']);
    } else {
       
        return $this->failNotFound('Customer not found.');
    }
}
public function subscribe_post(){
    $SubscribeModel =new SubscribeModel();
 

   $data = [
    'email'=> $this->request->getpost('email')
];  
if($SubscribeModel->insert($data)){
    return $this->respondCreated(['status'=>'success','message' => 'Subscribe successfully']);

} else {
    return $this->failServerError('Failed to Subscribe');
}
}


public function Blog_post()
{
    $Blog_Model = new Blog_Model();
    $currentDate = date('Y-m-d');

    $Blog_image = $this->request->getFile('Blog_image');
    if (!$Blog_image->isValid()) {
        return $this->failValidationError('Invalid file upload.');
    }

    $newName = $Blog_image->getName();
    $Blog_image->move(ROOTPATH . 'writable/uploads', $newName);

    $data = [
        'Blog_Tittle' => $this->request->getPost('Blog_Tittle'),
        'Blog_image' => $newName,
        'Blog_MetaTag' => $this->request->getPost('Blog_MetaTag'),
        'Blog_Meta_Description' => $this->request->getPost('Blog_Meta_Description'),
        'Blog_Meta_Tittle' => $this->request->getPost('Blog_Meta_Tittle'),
        'Blog_Status' => $this->request->getPost('Blog_Status'),
        'Published_Date' => $currentDate,
        'Published_By' => $this->request->getPost('Published_By'),
    ];

    if (!$Blog_Model->insert($data)) {
        return $this->failServerError('Failed to save Blog information');
    }

    // Load email library
    $email = \Config\Services::email();

    // Template for the email
    $emailTemplate = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>New Blog Post Published</title>
        <style>
            /* Your CSS styles here */
        </style>
    </head>
    <body>
        <div class='container'>
        <tr>
            <td bgcolor='#3498db' style='padding: 16px; color: #fff; font-size: 24px; font-weight: bold; text-align: center;'>
            <h3>New Blog Post Published</h3>

            </td>
             </tr>
        
            <p>Dear Subscriber,</p>
            <p>A new blog post has been published. Check it out!</p>
            <!-- Blog Post Content -->
            <div class='blog-content'>
                <h3>{$data['Blog_Tittle']}</h3>
                <img src='" . base_url('writable/uploads/' . $data['Blog_image']) . "' alt='{$data['Blog_Tittle']}'>

                
                <p>{$data['Blog_Meta_Description']}</p>
             
                <a href=". base_url('blog/' . $data['Blog_Tittle']) ." class='read-more-button'>Read more</a>

            </div>
            <!-- End Blog Post Content -->
            <p>Thank you for subscribing!</p>
            <p>Regards,<br>{$data['Published_By']}</p>

            <tr>
            <td bgcolor='#3498db' style='padding: 20px; color: #fff; font-size: 14px; text-align: center;'>
                &copy; " . date("Y") . " Your Company. All rights reserved.
            </td>
        </tr>
        </div>
    </body>
    </html>
    ";

    // Load subscribers
    $SubscribeModel = new SubscribeModel();
    $subscribers = $SubscribeModel->findAll();

    foreach ($subscribers as $subscriber) {
        // Set email parameters
        $email->setNewline("\r\n"); 
        $email->setTo($subscriber['email']);
        $email->setSubject('New Blog Post Published');
        $email->setMessage($emailTemplate);

        // Send email
        $email->send();
    }

    return $this->respondCreated(['status' => 'success', 'message' => 'Blog information sent on Email successfully']);
}



public function Emailsubscribe_post()
{

    $SubscribeModel = new SubscribeModel();
    $emailTo = $this->request->getPost('email');


if ($SubscribeModel->where('email', $emailTo)->first()) {
    return $this->respondCreated('Already_subscribe','Email already subscribed.');
       

        }
    
    session()->set('unsubscribe_email', $emailTo);

    // $otp = mt_rand(100000, 999999);

    $email = \Config\Services::email();
    $email->setNewline("\r\n"); 
    $email->setTo($emailTo);
    $email->setSubject('Test Email');
    $email->setMessage('Thank you for subscribing.');
    $SubscribeModel->insert(['email' => $emailTo]);

    if ($email->send()) {
        return $this->respondCreated(['status'=>'success','message' => 'Subscribe successfully']);
    } else {
        return $this->failServerError('Failed to Subscribe');
    }
    
 
}

public function unsubscribe_post()
{
    // $Semail = session()->get('unsubscribe_email');
    $Semail = $this->request->getPost('email');
      
$SubscribeModel = new SubscribeModel();

    $email = \Config\Services::email();
    $email->setNewline("\r\n"); 
    $email->setTo($Semail);
    $email->setSubject('Test Email');
    $email->setMessage('You have been unsubscribed.');

  $Un = $SubscribeModel->where('email', $Semail)->delete();

 
if ($email->send()) {

    return $this->respondCreated('You have been unsubscribed. Sorry to see you go!');
} else {
    return $this->failServerError('Failed to Subscribe');
}
    
}


public function createUser_post()
{
    $UserModel = new UserModel();

   
    $currentDomain = parse_url(base_url(), PHP_URL_HOST);

    $currentDomainUrl = base_url();

    $data = [
        'username' =>  $this->request->getPost('username'),
        'usertype' =>  $this->request->getPost('usertype'),
        'domain' =>  $currentDomain,
        'domain_url' => $currentDomainUrl,
        'company_name' => $this->request->getPost('company_name')
    ];

    if ($UserModel->insert($data)) {
        return $this->respondCreated(['message' => 'User created successfully']);
    } else {
        return $this->failServerError('Failed to create user');
    }
}

}






