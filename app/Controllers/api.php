<?php

namespace App\Controllers;

use App\Models\Leadmodel;
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
use App\Models\user_typeModel;
use App\Models\statusModel;
use App\Models\teamModel;

use CodeIgniter\I18n\Time;


use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;

class api extends Controller
{
    use ResponseTrait;

    protected $db;

    public function __construct()
    {
        // Load the database service
        $this->db = \Config\Database::connect();
    }

    public function AdminLogin_post()
    {
        $model = new LoginModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        $validationRules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[5]'
        ];
        if (empty($email)) {
            return $this->respondCreated(['message' => 'Email are required.']);
        }
        if (empty($password)) {
            return $this->respondCreated(['message' => ' password are required.']);
        }
    
        $validationRules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[5]'
        ];

        if (!$this->validate($validationRules)) {
           $response = [
               'errors' => $this->validator->getErrors()
            ];
            
            return $this->respond($response, 400); 
        }
        $adminuserData = $model->AdminLoginApi($email, md5($password));
    
        if ($adminuserData) {
            $logiData = $this->db->table('logi')->where('email', $email)->get()->getRow();
    
           
                $userid = $logiData->user_id;
                $userModel = new UserModel();
                $userData = $userModel->find($userid);
    
                if ($logiData) {
                    $sessionData = [
                        'id' => $adminuserData->id,
                        'email' => $adminuserData->email,
                        'logged_in' => true,
               
                    ];
    
                    session()->set('admindata', $sessionData);
    
                    return $this->respondCreated(['status' => 'success', 'message' => 'Logged in successfully.', 'userData' => $userData]);
                } else {
                    return $this->failServerError('Failed to fetch user data.');
                }
            
        } else {
            return $this->failUnauthorized('Invalid credentials.');
        }
    }
    
 
    public function enquiry_post()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'Email' => 'required|valid_email',
            'phone' => 'required|min_length[10]'
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
       
            $errors = $validation->getErrors();
           $errorMessage = '';
    
            foreach ($errors as $field => $error) {
             $errorMessage .= "$error";
            }
            return $this->failValidationError($errorMessage);
        }
        $enquiryModel = new enquiryModel();
    
        // Get the values from the request
        $name = $this->request->getPost('Name');
        $email = $this->request->getPost('Email');
        $phone = $this->request->getPost('phone');
        $service = $this->request->getPost('Service');
        $message = $this->request->getPost('message');
        $status = $this->request->getPost('status');
    
   
        $currentUrl = current_url();
        $parsedUrl = parse_url($currentUrl);
        $domainName = $parsedUrl['host'];
    
        // Prepare the data to be inserted
        $data = [
            'Name' => $name,
            'Email' => $email,
            'phone' => $phone,
            'Service' => $service,
            'message' => $message,
            'status' => $status,
            'Domain_name' => $domainName
        ];
                         
    
        if ($enquiryModel->insert($data)) {
            return $this->respondCreated(['status' => 'success', 'message' => 'Enquiry information saved successfully']);
        } else {
            return $this->failServerError('Failed to save enquiry information');
        }
    }
    
   
    // public function enquiry_get21()
    // {
    //     $enquiryModel = new enquiryModel();
    
    //     $contacts = $enquiryModel->findAll();
    //     $enquiryCount = $enquiryModel->countAllResults();
         

    //     $countData = [
    //     'count' => $enquiryCount,
    //      ];

    
    //     if (!empty($contacts)) {
          
    //        return $this->respond(['message' => 'successfully','contacts'=>$contacts,'enquiryCount'=>$countData]);
    //     } else {
    //         return $this->failNotFound('No enquiry information found.');
    //     }
    // }

    public function enquiry_get()
    {
        $enquiryModel = new enquiryModel();
        $statusModel = new statusModel();
        
        $contacts = $enquiryModel->findAll();
        $enquiryCount = $enquiryModel->countAllResults();
             
        $countData = [
            'count' => $enquiryCount,
        ];
        
        if (!empty($contacts)) {

            foreach ($contacts as &$contact) {
                $statusId = $contact['status'];
                $status = $statusModel->find($statusId);
                if ($status) {
                    $contact['status'] = $status['status_name'];
                } else {
              
                    $contact['status'] = 'Unknown';
                }
            }
              
            return $this->respond(['message' => 'successfully', 'contacts' => $contacts, 'enquiryCount' => $countData]);
        } else {
            return $this->failNotFound('No enquiry information found.');
        }
    }
    


public function singleenquiry_post()
{
    $enquiryModel = new enquiryModel();
    $id =$this->request->getPost('id');
    if (empty($id)) {
        return $this->respondCreated(['message' => 'id are required.']);
    }

    $contacts = $enquiryModel->find($id);

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

if (empty($id)) {
    return $this->respondCreated(['message' => 'id are required.']);
}

if($enquiryModel->find($id)){
$enquiryModel->delete($id);
return $this->respondDeleted(['status' => 'success', 'message' => 'enquiry deleted successfully']);
}else {
       
    return $this->failNotFound('enquiry not found.');
}

}

public function enquiry_update()
{

    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
        'Phone_Number' => 'required|numeric|min_length[10]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
   
        $errors = $validation->getErrors();
       $errorMessage = '';

        foreach ($errors as $field => $error) {
         $errorMessage .= "$error";
        }
        return $this->failValidationError($errorMessage);
    }
    
    $enquiryModel = new enquiryModel();
    $id = $this->request->getPost('id');

    if (empty($id)) {
        return $this->respondCreated(['message' => 'id are required.']);
    }
   
    $data = [
        'Name' => $this->request->getPost('Name'),   
        'Email' => $this->request->getPost('Email'),
        'phone' => $this->request->getPost('phone'),
        'Service' => $this->request->getPost('Service'),
        'message' => $this->request->getPost('message'),
        'status' => $this->request->getPost('status'),
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

    if (!$iconFile instanceof getFile) {
        return $this->failValidationError('Invalid file upload.');
    }

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

public function singleservice_post()
{
    $serviceModel = new ServiceModel();
    $id =$this->request->getPost('id');

    if (empty($id)) {
        return $this->respondCreated(['message' => 'id are required.']);
    }
   

    $services = $serviceModel->find($id);

    if (!empty($services)) {
        return $this->respond($services);
    } else {
        return $this->failNotFound('No services information found.');
    }
}
public function Service_delete()
{

    $serviceModel = new ServiceModel();
    $id = $this->request->getPost('id');
    if (empty($id)) {
        return $this->respondCreated(['message' => 'id are required.']);
    }
   
    
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
    if (empty($id)) {
        return $this->respondCreated(['message' => 'id are required.']);
    }
   
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
        foreach ($Blogs as & $blog) {
            $filename = $blog['Blog_image'];  
          
  }

  $BlogCount = $Blog_Model->countAllResults();
  $countData = [

     'count' => $BlogCount,
   ];


   if (!empty($Blogs)) {
      
    return $this->respond(['message' => 'successfully','Blogs'=>$Blogs,'BlogsCount'=>$countData]);
 } else {
    return $this->failNotFound('No Blogs found.');
 }

    }}




// public function showImage($filename)
// {
    // if (!$Blog_image instanceof getFile) {
    //     return $this->failValidationError('Invalid file upload.');
    // }
//     $path = WRITEPATH . 'uploads/' . $filename;
//     return $this->response->download($path, null, true);
// }



public function showImage($fileName)
{
    $directory = WRITEPATH . '/uploads' . DIRECTORY_SEPARATOR;
    
    if (file_exists($directory . $fileName)) {
      $mimeType = mime_content_type($directory . $fileName);

        $this->response->setContentType($mimeType);
        $fileContent = file_get_contents($directory . $fileName);
        return $this->response->setBody($fileContent);
    } else {
        return $this->response->setStatusCode(404);
    }
}


public function singleBlog_post()
{
    $Blog_Model = new Blog_Model();
    $id =$this->request->getPost('id');

    $Blogs = $Blog_Model->find($id);

    if (!empty($Blogs)) {
        return $this->respond($Blogs);
    } else {
        return $this->failNotFound('No Blogs information found.');
    }
}
public function Blog_update()
{

    $Blog_Model = new Blog_Model();
    $id = $this->request->getPost('id');

   $currentDate = date('Y-m-d');

   $Blog_image = $this->request->getFile('Blog_image');



        if (!$Blog_image->isValid()) {
            return $this->failValidationError('Invalid file upload.');
        }

        $newName = $Blog_image->getName();
        $path = ROOTPATH . 'writable/uploads';
        
      if (!$Blog_image->move($path, $newName)) {
       
            return $this->failServerError('Failed to move uploaded file.');
        }

        $imageUrl = base_url("writable/uploads/$newName");
       $data = [
           'Blog_Tittle' => $this->request->getPost('Blog_Tittle'),
           'Blog_image' => $imageUrl,
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
public function status_delete()
{
    $statusModel = new statusModel();
    $id = $this->request->getPost('id');
    
    if ($statusModel->find($id)) {
   
        $statusModel->delete($id);
        return $this->respondDeleted(['status' => 'success', 'message' => 'status deleted successfully']);
    } else {
       
        return $this->failNotFound('status not found.');
    }
}

public function status_update()
{

    $statusModel = new statusModel();
    $id = $this->request->getPost('id');

    $data = [
        'status_name' => $this->request->getPost('status_name')
         
           ];
  
   if ($statusModel->find($id)) {
        $statusModel->update($id, $data);
         return $this->respond(['status' => 'success', 'message' => 'Status updated successfully','Data'=>$data]);
    } else {
      return $this->failNotFound('Status not found.');     
    }
} 


public function status_get()
{

    $statusModel = new statusModel();
    $status = $statusModel->findAll();
    if ($status) {
       
        return $this->respond($status);
    } else {
      
        return $this->failNotFound('No status found.');  
    }
}

public function Addstatus_post()
{

    $statusModel = new statusModel();
    $data = [
      'status_name' => $this->request->getPost('status_name')
       
         ];

    if ($statusModel->insert($data)) {
        return $this->respondCreated(['status' => 'success', 'message' => 'Status saved successfully']);  
    } else {
        return $this->failServerError('Failed to save Status');
    }
}
public function track_get()
{
    $trafficModel = new VisitorModel();
    $session = session();
    
    // Get the visitor's IP address
    $visitorIp = $_SERVER['REMOTE_ADDR'];

    // Check if the visitor has a session ID stored
    $sessionId = $session->get('visitor_session_id');
    if (!$sessionId) {
        // Generate a unique session ID
        $sessionId = uniqid();
        $session->set('visitor_session_id', $sessionId);
        
        // Increment visitor count since it's a new session
        $visitorCount = $trafficModel->countAllResults();
        $visitorCount++;
    } else {
        // Visitor already has a session ID, check if it's a new visit
        $visitorCount = $trafficModel->where(['session_id' => $sessionId])->countAllResults();
        if ($visitorCount === 0) {
            // Increment visitor count since it's a new visit
            $visitorCount = $trafficModel->countAllResults();
            $visitorCount++;
        }
    }

    // Store visitor data in the database
    $data = [
        'session_id' => $sessionId,
        'visitor_ip' => $visitorIp,
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'landing_page' => $_SERVER['REQUEST_URI'] ?? '',
        // Add more data fields as needed
    ];

    $trafficModel->insert($data);

    return $this->respondCreated(['status' => 'success', 'count' => $visitorCount, 'data' => $data]);
}






public function customer_post(){

    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
       'Phone_Number' => 'required|numeric|min_length[10]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
   
        $errors = $validation->getErrors();
       $errorMessage = '';

        foreach ($errors as $field => $error) {
         $errorMessage .= "$error";
        }
        return $this->failValidationError($errorMessage);
    }

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
        'GSTN' => $this->request->getPost('GSTN'),
        'Service' => $this->request->getPost('Service'),
        'Gender' => $this->request->getPost('Gender'),
        'Additional_note' => $this->request->getPost('Additional_note')
        
       
    ];

    if ($CustomerModel->insert($data)) {
        return $this->respondCreated(['status' => 'success', 'message' => 'Customer information saved successfully']);  
    } else {
        return $this->failServerError('Failed to save Customer information');
    }
}


// public function Customer_get()
// {
//     $CustomerModel = new CustomerModel();

//     $customer = $CustomerModel->findAll();

//     $customerCount = $CustomerModel->countAllResults();
//     $countData = [
 
//        'count' => $customerCount,
//      ];

//     if (!empty($customer)) {  
      
//        return $this->respond(['message' => 'successfully','clientdetail'=>$customer,'clientCount'=>$countData]);
//     } else {
//         return $this->failNotFound('No client information found.');
//     }
// }

public function Customer_get()
{
    $CustomerModel = new CustomerModel();
    $ServiceModel = new ServiceModel();

    $customers = $CustomerModel->findAll();

    $customerCount = $CustomerModel->countAllResults();
    $countData = [
        'count' => $customerCount,
    ];


    if (!empty($customers)) {
        $customerDetails = [];

        foreach ($customers as $customer) {
       
            $serviceId = $customer['Service'];
            $service = $ServiceModel->find($serviceId);
            $serviceName = $service ? $service['service_name'] : 'Service Not Found';

            $customer['Service'] = $serviceName;
            $customerDetails[] = $customer;
        }

        return $this->respond(['message' => 'Successfully', 'clientdetail' => $customerDetails, 'clientCount' => $countData]);
    } else {
       
        return $this->failNotFound('No client information found.');
    }
}


public function singlecustomer_post()
{
    $CustomerModel = new CustomerModel();
    $id =$this->request->getPost('id');

    $customer = $CustomerModel->find($id);

    if (!empty($customer)) {
        return $this->respond($customer);
    } else {
        return $this->failNotFound('No customer information found.');
    }
}

public function customer_update()
{

    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
        'Phone_Number' => 'required|numeric|min_length[10]'
       
    ]);

    if (!$validation->withRequest($this->request)->run()) {
   
        $errors = $validation->getErrors();
       $errorMessage = '';

        foreach ($errors as $field => $error) {
         $errorMessage .= "$error";
        }
        return $this->failValidationError($errorMessage);
    }
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
        'GSTN' => $this->request->getPost('GSTN'),
        'Service' => $this->request->getPost('Service'),
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
public function singlecompany_post()
{
    $Company_model = new Company_model();
    $id =$this->request->getPost('id');

    $Company = $CustomerModel->find($id);

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
    if (!$Blog_image instanceof getFile) {
        return $this->failValidationError('Invalid file upload.');
    }

    return $this->respondCreated( $Blog_image);

    if (!$Blog_image->isValid()) {
        return $this->failValidationError('Invalid file upload.');
    }

 
    $newName = $Blog_image->getName();
    $path = ROOTPATH . 'writable/uploads';

    if (!$Blog_image->move($path, $newName)) {
        return $this->failServerError('Failed to move uploaded file.');
    }

    $imageUrl = base_url("writable/uploads/$newName");

    $data = [
        'Blog_Tittle' => $this->request->getPost('Blog_Tittle'),
        'Blog_image' => $imageUrl,
        'Blog_MetaTag' => $this->request->getPost('Blog_MetaTag'),
        'Blog_Meta_Description' => $this->request->getPost('Blog_Meta_Description'),
        'Blog_Meta_Tittle' => $this->request->getPost('Blog_Meta_Tittle'),
        'Blog_Status' => $this->request->getPost('Blog_Status'),
        'Published_Date' => $currentDate,
        'Published_By' => $this->request->getPost('Published_By'),
    ];
    // return $this->respondCreated( $data);
    if (!$Blog_Model->insert($data)) {
        return $this->failServerError('Failed to save Blog information');
    }

    $email = \Config\Services::email(); 

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


    $SubscribeModel = new SubscribeModel();
    $subscribers = $SubscribeModel->findAll();

    foreach ($subscribers as $subscriber) {

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

    
    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
       
    ]);

    if (!$validation->withRequest($this->request)->run()) {
   
        $errors = $validation->getErrors();
       $errorMessage = '';

        foreach ($errors as $field => $error) {
         $errorMessage .= "$error";
        }
        return $this->failValidationError($errorMessage);
    }

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

    
    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
       
    ]);

    if (!$validation->withRequest($this->request)->run()) {
   
        $errors = $validation->getErrors();
       $errorMessage = '';

        foreach ($errors as $field => $error) {
         $errorMessage .= "$error";
        }
        return $this->failValidationError($errorMessage);
    }
    
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



    public function UserType_post()
    {

        $userTypeModel = new user_typeModel();

        $usertype = $this->request->getPost('usertype');

        $data = [
            'usertype' => $usertype
         
        ];

        if ($userTypeModel->insert($data)) {

            return $this->respondCreated(['message' => 'User type created successfully']);
        } else {

            return $this->failServerError('Failed to create user type');
        }
    }

    public function User_get()
{
    $UserModel = new UserModel();
    $User = $UserModel->findAll();

    if (!empty($User)) {
        return $this->respond($User);
    } else {
        return $this->failNotFound('No User information found.');
    }
}

public function singleuser_post()
{
    $UserModel = new UserModel();
    $id =$this->request->getPost('id');

    $User = $enquiryModel->find($id);

    if (!empty($User)) {
        return $this->respond($User);
    } else {
        return $this->failNotFound('No User information found.');
    }
}


public function user_update()
{
    $UserModel = new UserModel();

  
    $id = $this->request->getPost('id');
    if (!$id) {
        return $this->failNotFound('User not found');
    }
    $currentDomainUrl = base_url();

    $data = [
        'username' =>  $this->request->getPost('username'),
        'usertype' =>  $this->request->getPost('usertype'),
         'domain' =>  $this->request->getPost('domain'),
        'domain_url' => $currentDomainUrl,
        'company_name' => $this->request->getPost('company_name')
    ];

    if ($UserModel->update($id, $data)) {
        return $this->respond(['message' => 'User updated successfully',$data]);
    } else {
        return $this->failServerError('Failed to update User');
    }
}


   public function lead_post()
    {
        $Leadmodel = new Leadmodel();
        $Date = $this->request->getPost('date');
        $formattedDate = date('Y-m-d', strtotime($Date));
        $data = [
            'time' =>  $this->request->getPost('time'),
            'date' =>  $formattedDate,
            'leadstatus' => $this->request->getPost('leadstatus'),
            'intialstatus' => $this->request->getPost('intialstatus'),
            'Action' => $this->request->getPost('Action'),
            'enquiry_id' => $this->request->getPost('enquiry_id'),
            'remark' => $this->request->getPost('remark')
        ];

        if ($Leadmodel->insert($data)) {
           
            return $this->respondCreated(['message' => 'Lead created successfully']);
        } else {

            return $this->failServerError('Failed to create lead');
        }
    }
    public function lead_update()
{
    $Leadmodel = new Leadmodel();

  
    $id = $this->request->getPost('id');
    if (!$id) {
        return $this->failNotFound('Lead not found');
    }
    $Date = $this->request->getPost('date');
        $formattedDate = date('Y-m-d', strtotime($Date));
    $data = [
        'time' =>  $this->request->getPost('time'),
        'date' =>  $formattedDate,
        'leadstatus' => $this->request->getPost('leadstatus'),
        'intialstatus' => $this->request->getPost('intialstatus'),
        'Action' => $this->request->getPost('Action'),
        'enquiry_id' => $this->request->getPost('enquiry_id'),
        'remark' => $this->request->getPost('remark')
    ];

    if ($Leadmodel->update($id, $data)) {
        return $this->respond(['message' => 'Lead updated successfully',$data]);
    } else {
        return $this->failServerError('Failed to update lead');
    }
}

public function lead_delete()
{
    $Leadmodel = new Leadmodel();
    $id = $this->request->getPost('id');
    
    if ($Leadmodel->find($id)) {
   
        $Leadmodel->delete($id);
        return $this->respondDeleted(['status' => 'success', 'message' => 'lead deleted successfully']);
    } else {
       
        return $this->failNotFound('lead not found.');
    }
}



public function lead_get()
{
    $Leadmodel = new Leadmodel();
    $leads = $Leadmodel->findAll();
 
    $UserModel = new UserModel();
    $usernames = [];

    foreach ($leads as $lead) {
        $user = $UserModel->find($lead['user_id']);
        if ($user) {
            $usernames[] = $user['username'];
        } else {
            $usernames[] = 'Unknown'; 
        }
    }

    $statusModel = new statusModel();
    $Callingdata = [];
    foreach ($leads as $lead) {
        $leadstatus = $statusModel->find($lead['leadstatus']);
        $intialstatus = $statusModel->find($lead['intialstatus']);
       
        $leadstatusName = isset($leadstatus['status_name']) ? $leadstatus['status_name'] : 'Unknown';
        $intialstatusName = isset($intialstatus['status_name']) ? $intialstatus['status_name'] : 'Unknown';

        // Construct $statuses array here
        $statuses[$lead['id']] = [
            'leadstatus' => $leadstatusName,
            'intialstatus' => $intialstatusName
        ];

        $Callingdata[] = [
            'id' => $lead['id'],
            'enquiry_id' => $lead['enquiry_id'],
            'Date' => $lead['date'],
            'Time' => $lead['time'],
            'leadstatus' => $statuses[$lead['id']]['leadstatus'],
            'intialstatus' => $statuses[$lead['id']]['intialstatus'],
            'action' => $lead['action'],
            'remark' => $lead['remark'],
            'Calledby' => array_shift($usernames)
        ];
    }

    if ($Callingdata){
        return $this->respond(['message' => 'successfully','Callingdata'=>$Callingdata ]);
    } else {
        return $this->failServerError('Data Not found');
    }
} 



public function singlelead_post()
{
    $Leadmodel = new Leadmodel();
    $id = $this->request->getPost('enquiry_id');
     $leads = $Leadmodel->where('enquiry_id', $id)->findAll();  



    return $this->respond( $leads);
    $UserModel = new UserModel();
    $usernames = [];

    foreach ($leads as $lead) {
        $user = $UserModel->find($lead['user_id']);
        if ($user) {
            $usernames[] = $user['username'];
        } else {
            $usernames[] = 'Unknown'; 
        }
    }

    $statusModel = new statusModel();
    $Callingdata = [];
    foreach ($leads as $lead) {
        $leadstatus = $statusModel->find($lead['leadstatus']);
        $initialstatus = $statusModel->find($lead['initialstatus']);
       
        $leadstatusName = isset($leadstatus['status_name']) ? $leadstatus['status_name'] : 'Unknown';
        $initialstatusName = isset($initialstatus['status_name']) ? $initialstatus['status_name'] : 'Unknown';

        $Callingdata[] = [
            'id' => $lead['id'],
            'enquiry_id' => $lead['enquiry_id'],
            'Date' => $lead['date'],
            'Time' => $lead['time'],
            'leadstatus' => $leadstatusName,
            'initialstatus' => $initialstatusName,
            'action' => $lead['action'],
            'remark' => $lead['remark'],
            'Calledby' => array_shift($usernames)
        ];
    }

    if ($Callingdata){
        return $this->respond(['message' => 'successfully', 'Callingdata' => $Callingdata ]);
    } else {
        return $this->failServerError('Data Not found');
    }
}



public function dashboard_get()
{
    
    $enquiryModel = new enquiryModel();
    $subscribeModel = new SubscribeModel();
    $visitorModel = new VisitorModel();
    $blogModel = new Blog_Model();
    $CustomerModel = new CustomerModel();
    $teamModel = new teamModel();
  
   $enquiryCount = $enquiryModel->countAllResults();
    $subscriberCount = $subscribeModel->countAllResults();
    $visitorCount = $visitorModel->countAllResults();
    $blogsCount = $blogModel->countAllResults();
    $customerCount = $CustomerModel->countAllResults();
    $TeamCount = $teamModel->countAllResults();

$query = $this->db->table('blogs')
    ->orderBy('id', 'DESC')
    ->limit(5)
    ->get();
$lastFiveBlogs = $query->getResult();

$query = $this->db->table('enquiry')
->orderBy('id', 'DESC')
->limit(5)
->get();
$lastFiveEnquiries = $query->getResult();

$query = $this->db->table('team_member')
->orderBy('id', 'DESC')
->limit(5)
->get();
$fiveteam_member = $query->getResult();


$baseBlogUrl = ("tabs/blogs"); 
$baseteamUrl = ("tabs/team"); 
$enquiresUrl = ("tabs/enquires"); 


    $responseData = [

    [
        "name" => "Visitor",
        "count" => $visitorCount,
        
    ],
   [
     "name" => "Blog",
     "count" =>$blogsCount,
     "url" => $baseBlogUrl,  
    ],
   [
        "name" => "Enquiry",
        "count" => $enquiryCount,
        "url" => $enquiresUrl, 
    ],
   [
        "name" => "Customer",
        "count" => $customerCount,
    ],
[
        "name" => "Subscribe",
        "count" => $subscriberCount,
    ],
  [
        "name" => "Team",
        "count" => $TeamCount,
        "url" => $baseteamUrl, 
    ],
];

$Blog = $lastFiveBlogs;
$Enquiries = $lastFiveEnquiries;
$Team =  $fiveteam_member;
if ($responseData){
        return $this->respond(['message' => 'successfully','responseData'=>$responseData,'Blog'=>$Blog,'Enquiries'=>$Enquiries,'Team'=>$Team ]);
    } else {
        return $this->failServerError('Data Not found');
    }
}


public function sendOTP_post()
{

    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
       
    ]);

    if (!$validation->withRequest($this->request)->run()) {
   
        $errors = $validation->getErrors();
       $errorMessage = '';

        foreach ($errors as $field => $error) {
         $errorMessage .= "$error";
        }
        return $this->failValidationError($errorMessage);
    }

    $userModel = new LoginModel();
    $emailTo = $this->request->getPost('email');

    $user = $userModel->where('email', $emailTo)->first();
    if ($user) {
        $otp = rand(100000, 999999);
        $expiryTime = time() + (5 * 60); // OTP expiry time: 5 minutes (10 * 60 seconds)

        $Updaterow = $userModel->where('email', $emailTo)->set(['otp' => $otp, 'otp_expires_at' => $expiryTime])->update();

        $message = "We have received a request to reset your password. Your OTP is: $otp";
        $subject = "Password Reset Request - OTP Included";

        $email = \Config\Services::email();
        $email->setNewline("\r\n"); 
        $email->setTo($emailTo);
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            return $this->respondCreated(['otp' => $otp, 'msg' => 'OTP Sent Successfully']);
        } else {
            return $this->failServerError(['otp' => 'No Data', 'msg' => 'Failed to send OTP via email']);
        }
    } else {
        return $this->response->setJSON(['otp' => 'No Data', 'msg' => 'Email not found in records']);
    }
}

public function verifyOTP_post()
{

    
    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
       
    ]);

    if (!$validation->withRequest($this->request)->run()) {
   
        $errors = $validation->getErrors();
       $errorMessage = '';

        foreach ($errors as $field => $error) {
         $errorMessage .= "$error";
        }
        return $this->failValidationError($errorMessage);
    }

    $userModel = new LoginModel();
    $email = $this->request->getPost('email');
    $otp = $this->request->getPost('otp');

    $storedOTP = $userModel->where('email', $email)->first(); 

    if (empty($otp)) {
        return $this->respond(['status' => 'error', 'message' => 'OTP are required']);
    } else {
        if ($storedOTP && $otp === $storedOTP['otp']) {
          
            if ($storedOTP['otp_expires_at'] > time()) {
                return $this->respond(['status' => 'success', 'message' => 'OTP verified successfully']);
            } else {
                return $this->respond(['status' => 'error', 'message' => 'OTP has expired']);
            }
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Invalid OTP']);
        }
    }
}




public function resetPassword_post()
{


    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
       
    ]);

    if (!$validation->withRequest($this->request)->run()) {
   
        $errors = $validation->getErrors();
       $errorMessage = '';

        foreach ($errors as $field => $error) {
         $errorMessage .= "$error";
        }
        return $this->failValidationError($errorMessage);
    }

    $userModel = new LoginModel();

    $email = $this->request->getPost('email');
    $newPassword = $this->request->getPost('new_password');
    $confirmPassword = $this->request->getPost('confirm_password');

    if (empty($email) || empty($newPassword) || empty($confirmPassword)) {
        return $this->respond(['status' => 'error', 'message' => 'Email, new password, and confirmation password are required']);
    } elseif ($newPassword !== $confirmPassword) {
        return $this->respond(['status' => 'error', 'message' => 'New password and confirmation password do not match']);
    }

   
    $user = $userModel->where('email', $email)->first();

    if (!$user) {
        return $this->respond(['status' => 'error', 'message' => 'User not found']);
    }

    $hashedPassword = md5($newPassword);
  

    $userModel->set(['password' => $hashedPassword, 'original_password' => $confirmPassword])->where('id', $user['id'])->update();

    return $this->respond(['status' => 'success', 'message' => 'Password updated successfully']);
}







public function team_post()
{
  
    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
        'phone' => 'required|numeric|min_length[10]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
   
        $errors = $validation->getErrors();
       $errorMessage = '';

        foreach ($errors as $field => $error) {
         $errorMessage .= "$error";
        }
        return $this->failValidationError($errorMessage);
    }

    $teamModel = new teamModel();
    $team_image = $this->request->getFile('image');
    // return $this->respondCreated( $team_image);
    
    if (!$team_image->isValid()) {
        return $this->failValidationError('Invalid file upload.');
    }
    
    // $path = WRITEPATH . 'uploads'; 
    $newName = $team_image->getName();
    $path = ROOTPATH . 'writable/uploads';


    if (!$team_image->move($path, $newName)) {
        return $this->failServerError('Failed to move uploaded file.');
    }
    $imageUrl = base_url("writable/uploads/$newName");

    $data = [
        'employee' => $this->request->getPost('employee'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone'),
        'image' => $imageUrl,
        'designation' => $this->request->getPost('designation'),
        'join_date' => $this->request->getPost('join_date')
    ];
    
    if ($teamModel->insert($data)) {
        return $this->respondCreated(['message' => 'Team created successfully']);
    } else {
        return $this->failServerError('Failed to create team');
    }
}

    

public function team_get()
{
    $teamModel = new teamModel();
    $team = $teamModel->findAll();

    
    if ($team) {
        foreach ($team as & $teams) {
            $filename = $teams['image'];
          
  }

    $teamCount = $teamModel->countAllResults();

    $countData = [
        'count' => $teamCount,
    ];

    if (!empty($team)) {
    
        return $this->respond(['message' => 'Successfully', 'teams' => $team, 'teamCount' => $countData]);
    } else {
   
        return $this->failNotFound('No team found.');
    }
}
}

public function showteam($fileName)
{
    $directory = WRITEPATH . '/uploads' . DIRECTORY_SEPARATOR;
    
    if (file_exists($directory . $fileName)) {
      $mimeType = mime_content_type($directory . $fileName);

        $this->response->setContentType($mimeType);
        $fileContent = file_get_contents($directory . $fileName);
        return $this->response->setBody($fileContent);
    } else {
        return $this->response->setStatusCode(404);
    }
}
public function singleteam_post()
{
    $teamModel = new teamModel();
    $id =$this->request->getPost('id');
    if (empty($id)) {
        return $this->respondCreated(['message' => 'id are required.']);
    }

    $teams = $teamModel->find($id);

    if (!empty($teams)) {
        return $this->respond($teams);
    } else {
        return $this->failNotFound('No teams information found.');
    }
}

public function team_update()
{

    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
       'phone' => 'required|numeric|min_length[10]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
   
        $errors = $validation->getErrors();
       $errorMessage = '';

        foreach ($errors as $field => $error) {
         $errorMessage .= "$error";
        }
        return $this->failValidationError($errorMessage);
    }



    $teamModel = new teamModel();
    $id = $this->request->getPost('id');

   $currentDate = date('Y-m-d');

   $team_image = $this->request->getFile('image');
  
   if (!$team_image->isValid()) {
         return $this->failValidationError('Invalid file upload.');
     }
 
   $path = WRITEPATH . 'uploads'; 
     $newName = $team_image->getName();
 
     if (!$team_image->move($path, $newName)) {
         return $this->failServerError('Failed to move uploaded file.');
     }
 
    $imageUrl = base_url("uploads/$newName");
     $data = [
                 'employee' => $this->request->getPost('employee'),
                 'email' => $this->request->getPost('email'),
                 'image' => $imageUrl,
                 'designation' => $this->request->getPost('designation'),
                 'phone' => $this->request->getPost('phone'),
                 'join_date' => $this->request->getPost('join_date')
                 
             ];
  
   if ($teamModel->find($id)) {
        $teamModel->update($id, $data);   
         return $this->respond(['status' => 'success', 'message' => 'Team updated successfully','Data'=>$data]);
    } else {
      return $this->failNotFound('Team not found.');
    }
}

public function team_delete()
{
    $teamModel = new teamModel();
$id =$this->request->getPost('id');

if (empty($id)) {
    return $this->respondCreated(['message' => 'id are required.']);
}

if($teamModel->find($id)){
$teamModel->delete($id);
return $this->respondDeleted(['status' => 'success', 'message' => 'team deleted successfully']);
}else {
       
    return $this->failNotFound('team not found.');
}

}
}






