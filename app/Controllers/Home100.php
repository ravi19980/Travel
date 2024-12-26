<?php

namespace App\Controllers;
use App\Models\CareerModel;
use App\Models\ContactModel;


class Home extends BaseController
{
    public function index(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/index';
        
        return view('Home//main', $theme_data);
    }
    public function about(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/about';
        
        return view('Home//main', $theme_data);
    }
    public function oracle(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/oracle';
        
        return view('Home//main', $theme_data);
    }
    public function career (): string
    {
        $theme_data = $this->getThemeData();
        $subscribeMessage = session()->getFlashdata('subscribe_success');
        $data['subscribeMessage'] = $subscribeMessage;



        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/career';
        
        return view('Home//main', $theme_data,$data);
    }

    public function applicationservice(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/applicationservice';
        
        return view('Home//main', $theme_data);
    }

    public function demoservice(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/demoservice';
        
        return view('Home//main', $theme_data);
    }
    public function contact(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/contact';
        
        return view('Home//main', $theme_data);
    }
    public function services(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/services';
        
        return view('Home//main', $theme_data);
    }

    public function testingservice(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/testingservice';
        
        return view('Home//main', $theme_data);
    }

    public function recruitmentservice (): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/recruitmentservice';
        
        return view('Home//main', $theme_data);
    }

    public function trainingservice (): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/trainingservice';
        
        return view('Home//main', $theme_data);
    }
   
    public function Careerdata()
    {
        try{
        $careerModel = new CareerModel();
    
        $name = $this->request->getPost('name');
        $emailAddress = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $subject = $this->request->getPost('subject');
    
        $resume = $this->request->getFile('resume');
    
        if (!$resume->isValid()) {
            return redirect()->back()->withInput()->with('error', 'Invalid file upload.');
        }
    
        $newName = $resume->getName();
        $resume->move(ROOTPATH . 'writable/uploads', $newName);
        $resumeUrl = base_url('writable/uploads/' . $newName);
    
        $data = [
            'name' => $name,
            'email' => $emailAddress,
            'phone' => $phone,
            'resume' => $newName,
            'resumelink' => $resumeUrl,
            'subject' => $subject
        ];
    
        // Insert data into the database
        $careerModel->insert($data);
    
        // HTML email template
        $message = "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Career Inquiry</title>
        </head>
        <body>
            <table cellpadding='0' cellspacing='0' border='0' width='100%' bgcolor='#f0f0f0'>
                <tr>
                    <td>
                        <table align='center' cellpadding='0' cellspacing='0' border='0' width='600' style='border-collapse: collapse;'>
                            <!-- Header -->
                            <tr>
                                <td bgcolor='#3498db' style='padding: 20px; color: #fff; font-size: 24px; font-weight: bold; text-align: center;'>
                                    Career Inquiry: $subject
                                </td>
                            </tr>
                            <!-- Content -->
                            <tr>
                                <td bgcolor='#ecf0f1' style='padding: 20px; font-size: 16px; line-height: 1.6;'>
                                    <p><strong>Name:</strong> $name</p>
                                    <p><strong>Email:</strong> $emailAddress</p>
                                    <p><strong>Phone:</strong> $phone</p>
                                    <p><strong>Subject:</strong> $subject</p>
                                    <p><strong>Resume Link:</strong> <a href='$resumeUrl'>$resumeUrl</a></p>
                                </td>
                            </tr>
                            <!-- Footer -->
                            <tr>
                                <td bgcolor='#3498db' style='padding: 20px; color: #fff; font-size: 14px; text-align: center;'>
                                    &copy; " . date("Y") . " Your Company. All rights reserved.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        ";
    
        // Send email
        $email = \Config\Services::email();
        $email->setNewline("\r\n");
        $email->setTo($emailAddress);
        $email->setSubject('Career Inquiry: ' . $subject);
        $email->setMessage($message);
    
        if ($email->send()) {
            // If email is sent successfully
            return redirect()->back()->with('success', 'Data inserted successfully. Thank you for your application.');
        } else {
            // If there is an error sending email
            return redirect()->back()->with('error', 'Data inserted successfully, but there was an error sending the email.');
        }
        }catch(\Exception  $e){
            echo 'An error occurred: ' . $e->getMessage();
        }
    }
    
    

public function Contactdata()
{
    $ContactModel = new ContactModel();

    $data = [
        'name' => $this->request->getPost('name'),
        'Services' => $this->request->getPost('Services'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone'),
        'company' => $this->request->getPost('company'), 
        'subject' => $this->request->getPost('subject'),
        'comments' => $this->request->getPost('comments'), 
    ];

    $ContactModel->insert($data);
   return redirect()->back()->with('success', 'Data inserted successfully.');  
}




    protected function getThemeData(): array
    {
        $viewData = [
            "head" => [
                "title" => "Brillsense Pvt. Ltd.",
                "meta_description" => "Brillsense Pvt. Ltd.",
                "meta_keyword" => "Brillsense Pvt. Ltd.",
                "css_style" => "",
                "css_files" => [],
            ],
            "view_file" => "home//error_404",
        ];
        return $viewData;
    }
}
