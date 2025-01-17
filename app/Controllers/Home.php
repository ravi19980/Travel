<?php

namespace App\Controllers;

use App\Models\CareerModel;
use App\Models\CityModel;
use App\Models\enquiryModel;
use App\Models\SubscribeModel;
use App\Models\VisitorModel;
use App\Models\ContactModel;
use App\Models\StateModel;
// use App\Helpers\PdfHelper;
use Mpdf\Mpdf;

class Home extends BaseController
{


    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(): string
    {
        $theme_data = $this->getThemeData();

        // Fetch all state data using StateModel
        $stateModel = new StateModel();
        $stateData = $stateModel->findAll();

        // Add meta and view information to theme data
        $theme_data['head'] = [
            'title' => "Travelling Services",
            'meta_keyword' => "Travelling Services",
            'meta_description' => "Travelling Services",
        ];
        
        $theme_data['state_data'] = $stateData; // Pass state data to the view
        $theme_data['view_file'] = 'Home/index';

        // Return the main view with theme data
        return view('Home/main', $theme_data);
    }
    public function about(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/about';

        return view('Home//main', $theme_data);
    }
    public function blog(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/blog';

        return view('Home//main', $theme_data);
    }
    public function blog_detail(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/blog-detail';

        return view('Home//main', $theme_data);
    }
    public function blog_detail2(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/blog-detail2';

        return view('Home//main', $theme_data);
    }
    public function oracle(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/oracle';

        return view('Home//main', $theme_data);
    }


    public function applicationservice(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/applicationservice';

        return view('Home//main', $theme_data);
    }

    public function demoservice(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/demoservice';

        return view('Home//main', $theme_data);
    }

    public function services(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/services';

        return view('Home//main', $theme_data);
    }

    public function testingservice(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/testingservice';

        return view('Home//main', $theme_data);
    }

    public function recruitmentservice(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/recruitmentservice';

        return view('Home//main', $theme_data);
    }

    public function trainingservice(): string
    {
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/trainingservice';

        return view('Home//main', $theme_data);
    }

    public function career11(): string
    {
        $theme_data = $this->getThemeData();
        $subscribeMessage = session()->getFlashdata('subscribe_success');
        $data['subscribeMessage'] = $subscribeMessage;
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/career';

        return view('Home//main', $theme_data, $data);
    }



    public function career()
    {
        $careerModel = new CareerModel();

        $name = $this->request->getPost('name');
        $emailAddress = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $subject = $this->request->getPost('subject');
        $resume = $this->request->getFile('resume');

        $resume = $this->request->getFile('resume');

        if ($resume === null) {
            $theme_data = $this->getThemeData();

            $theme_data['head']['title'] = "Travelling Services";
            $theme_data['head']['meta_keyword'] = "Travelling Services";
            $theme_data['head']['meta_description'] = "Travelling Services";
            $theme_data['view_file'] = 'Home/career';

            return view('Home//main', $theme_data);
        }

        if (!$resume->isValid()) {
            return redirect()->back()->withInput()->with('error', 'Invalid file upload.');
        }

        $newName = $resume->getName();
        $resume->move(ROOTPATH . 'writable/uploads', $newName);
        $resumeUrl = base_url('writable/uploads/' . $newName);
        $pdfPath = ROOTPATH . 'writable/uploads/' . $newName; // Path to the resume PDF file


        // print_r($pdfBase64);die;
        if (!empty($newName)) {
            $resumeUrl = base_url('Career/serveFile/' . $newName);
        }
        if (!empty($name)) {
            $data = [
                'name' => $name,
                'email' => $emailAddress,
                'phone' => $phone,
                'resume' => $newName,
                'resumelink' => $resumeUrl,
                'subject' => $subject
            ];

            $careerModel->insert($data);
            //     $message = "
            // <!DOCTYPE html>
            // <html lang='en'>
            // <head>
            //     <meta charset='UTF-8'>
            //     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            //     <title>Career Inquiry</title>
            // </head>
            // <body>
            //     <table cellpadding='0' cellspacing='0' border='0' width='100%' bgcolor='#f0f0f0'>
            //         <tr>
            //             <td>
            //                 <table align='center' cellpadding='0' cellspacing='0' border='0' width='600' style='border-collapse: collapse;'>
            //                     <!-- Header -->
            //                     <tr>
            //                         <td bgcolor='#3498db' style='padding: 20px; color: #fff; font-size: 24px; font-weight: bold; text-align: center;'>
            //                         Career Inquiry: $subject
            //                         </td>
            //                     </tr>
            //                     <!-- Content -->
            //                     <tr>
            //                         <td bgcolor='#ecf0f1' style='padding: 20px; font-size: 16px; line-height: 1.6;'>
            //                             <p><strong>Name:</strong> $name</p>
            //                             <p><strong>Email:</strong> $emailAddress</p>
            //                             <p><strong>Phone:</strong> $phone</p>
            //                             <p><strong>Subject:</strong> $subject</p>

            //                         </td>
            //                     </tr>
            //                     <!-- Footer -->
            //                     <tr>
            //                         <td bgcolor='#3498db' style='padding: 20px; color: #fff; font-size: 14px; text-align: center;'>
            //                             &copy; " . date("Y") . " Your Company. All rights reserved.
            //                         </td>
            //                     </tr>
            //                 </table>
            //             </td>
            //         </tr>
            //     </table>
            // </body>
            // </html>
            // ";


            //     $emailAddress1 = $emailAddress;
            //     $subject1 = 'Thank You for Submitting Your Resume';

            //     $messageRecipient1 = '<p>Dear ' . $name . ',</p>
            // <br>
            // <p>Thank you for taking the time to submit your resume for consideration at Travelling Services Inc. We appreciate your interest in joining our team.
            // Your application has been received, and our hiring team will carefully review your qualifications and experience. While we strive to process applications as efficiently as possible, please note that it may take some time to thoroughly evaluate each candidate.</p>
            // <p>If your qualifications align with our current openings, we will reach out to you to schedule an interview. In the meantime, we encourage you to learn more about our company and explore additional opportunities that may be of interest to you.</p>
            // <p>Once again, thank you for your interest in Travelling Services Inc. We wish you the best of luck in your job search, and we look forward to the possibility of working together in the future.</p>
            // <br><br>
            // <p>Best regards,<br>
            // Hiring Manager<br>
            // Travelling Services Inc.</p>';


            //     $infoEmailAddress = 'ravibrillsense59@gmail.com';
            //     // $infoEmailAddress = 'talent@arcturusconsultingservices.com';
            //     $messageInfo = $message;


            //     $senderEmail = $emailAddress1;
            //     $recipient1 = $emailAddress1;
            //     $Admin = $infoEmailAddress;
            //     $subjects =  $subject;
            //     $message = $messageInfo;


            //     if ($this->sendAndReceiveEmail($senderEmail, $recipient1, $subject1, $messageRecipient1) && $this->sendAttach($Admin, $subjects, $message, $pdfPath)) {
            //         $this->session->setFlashdata('success', 'Thank you for submitting your resume to Travelling Services Inc. Your application has been received. Our team will review it thoroughly. If your qualifications match our openings, we`ll contact you for an interview. Explore our website for more opportunities. Best of luck!');
            //     } else {
            //         $this->session->setFlashdata('error', 'Failed.');
            //     }
            // }
            $theme_data = $this->getThemeData();
            $subscribeMessage = session()->getFlashdata('subscribe_success');
            $data['subscribeMessage'] = $subscribeMessage;
            $theme_data['head']['title'] = "Travelling Services";
            $theme_data['head']['meta_keyword'] = "Travelling Services";
            $theme_data['head']['meta_description'] = "Travelling Services";
            $theme_data['view_file'] = 'Home/career';
            $theme_data['session'] = $this->session;
            return view('Home//main', $theme_data, $data);
        }
    }
    public function sendAndReceiveEmail($senderEmail, $recipient1, $subject1, $messageRecipient1)
    {
        // Initialize the email service


        $email1 = \Config\Services::email();
        $email1->setNewline("\r\n");
        $email1->setTo($recipient1);
        $email1->setMessage($messageRecipient1);
        $email1->setSubject($subject1);
        $email1->setMailType('html');

        if (!$email1->send()) {
            return false;
        }

        return true;
    }

    public function sendAttach($Admin, $subjects, $message, $pdfPath)
    {
        $email = \Config\Services::email();

        $email->setNewline("\r\n");
        $email->setTo($Admin);
        $email->setSubject($subjects);
        $email->setMessage($message);
        $email->setMailType('html');
        $email->attach($pdfPath);


        if (!$email->send()) {
            return false;
        }

        return true;
    }

    public function contact(): string
    {
        $ContactModel = new ContactModel();
    
        $name = $this->request->getPost('name');
        $Services = $this->request->getPost('Services');
        $emailAddress = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $company = $this->request->getPost('company');
        $subject = $this->request->getPost('subject');
        $comments = $this->request->getPost('comments');
    
        if (!empty($name)) {
            $data = [
                'name' => $name,
                'Services' => $Services,
                'email' => $emailAddress,
                'phone' => $phone,
                'company' => $company,
                'subject' => $subject,
                'comments' => $comments,
            ];
    
            $ContactModel->insert($data);
    
            // Optionally handle email sending here if needed.
        }
    
        // Always return a view
        $theme_data = $this->getThemeData();
        $theme_data['head']['title'] = "Travelling Services";
        $theme_data['head']['meta_keyword'] = "Travelling Services";
        $theme_data['head']['meta_description'] = "Travelling Services";
        $theme_data['view_file'] = 'Home/contact';
        $theme_data['session'] = $this->session;
    
        return view('Home/main', $theme_data);
    }
    
    // public function contact(): string
    // {

    //     $ContactModel = new ContactModel();

    //     $name = $this->request->getPost('name');
    //     $Services = $this->request->getPost('Services');
    //     $emailAddress = $this->request->getPost('email');
    //     $phone = $this->request->getPost('phone');
    //     $company = $this->request->getPost('company');
    //     $subject = $this->request->getPost('subject');
    //     $comments = $this->request->getPost('comments');

    //     if (!empty($name)) {
    //         $data = [
    //             'name' => $name,
    //             'Services' => $Services,
    //             'email' => $emailAddress,
    //             'phone' => $phone,
    //             'company' => $company,
    //             'subject' =>  $subject,
    //             'comments' =>  $comments,
    //         ];

    //         $ContactModel->insert($data);

    //         //         $message = "
    //         // <!DOCTYPE html>
    //         // <html lang='en'>
    //         // <head>
    //         //     <meta charset='UTF-8'>
    //         //     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    //         //     <title>Contact Inquiry</title>
    //         // </head>
    //         // <body>
    //         //     <table cellpadding='0' cellspacing='0' border='0' width='100%' bgcolor='#f0f0f0'>
    //         //         <tr>
    //         //             <td>
    //         //                 <table align='center' cellpadding='0' cellspacing='0' border='0' width='600' style='border-collapse: collapse;'>
    //         //                     <!-- Header -->
    //         //                     <tr>
    //         //                         <td bgcolor='#3498db' style='padding: 20px; color: #fff; font-size: 24px; font-weight: bold; text-align: center;'>
    //         //                             Contact Inquiry: $subject
    //         //                         </td>
    //         //                     </tr>
    //         //                     <!-- Content -->
    //         //                     <tr>
    //         //                         <td bgcolor='#ecf0f1' style='padding: 20px; font-size: 16px; line-height: 1.6;'>
    //         //                             <p><strong>Name:</strong> $name</p>
    //         //                             <p><strong>Services:</strong> $Services</p>
    //         //                             <p><strong>Email:</strong> $emailAddress</p>
    //         //                             <p><strong>Phone:</strong> $phone</p>
    //         //                             <p><strong>Subject:</strong> $subject</p>
    //         //                             <p><strong>Message:</strong> $comments</p>

    //         //                         </td>
    //         //                     </tr>
    //         //                     <!-- Footer -->
    //         //                     <tr>
    //         //                         <td bgcolor='#3498db' style='padding: 20px; color: #fff; font-size: 14px; text-align: center;'>
    //         //                             &copy; " . date("Y") . " Your Company. All rights reserved.
    //         //                         </td>
    //         //                     </tr>
    //         //                 </table>
    //         //             </td>
    //         //         </tr>
    //         //     </table>
    //         // </body>
    //         // </html>
    //         // ";



    //         //         $emailAddress1 = $emailAddress;
    //         //         $subject1 = ' Acknowledgement of Your Inquiry';
    //         //         $messageRecipient1 = '<p>Dear ' . $name . ',</p>
    //         // <br>
    //         // <p>Thank you for reaching out to us via our Contact Us page. We appreciate your interest in Travelling Services Inc. Your inquiry has been received, and our team will be reviewing it shortly..</p>

    //         // <p>We endeavor to respond to all inquiries promptly, and you can expect to hear from us within 24 hours. If your message requires urgent attention, please don`t hesitate to contact us directly at +1 613-852-2801 or info@arcturusconsultingservices.com .</p>

    //         // <p>Thank you once again for reaching out to us. We value your interest and look forward to assisting you.</p>
    //         // <br>
    //         // <p>Best regards,<br>
    //         // Founder & CEO<br>
    //         // Travelling Services Inc.<br>
    //         // +1 613-852-2801<br></p>';


    //     //     $infoEmailAddress = 'rs.8602674195@gmail.com';
    //     //     // $infoEmailAddress = 'info@arcturusconsultingservices.com';
    //     //     $messageInfo = $message;


    //     //     $senderEmail = $emailAddress1;
    //     //     $recipient1 = $emailAddress1;
    //     //     $Admin = $infoEmailAddress;
    //     //     $subjects =  $subject;
    //     //     $message = $messageInfo;


    //     //     if ($this->sendcontactEmail($senderEmail, $recipient1, $subject1, $messageRecipient1) && $this->sendAdmin($Admin, $subjects, $message)) {


    //     //         $this->session->setFlashdata('success', 'Thank you for reaching out to us. Your inquiry has been received. We aim to respond promptly. If your message requires urgent attention, please call our office directly.We appreciate your interest and look forward to assisting you further.');
    //     //     } else {
    //     //         $this->session->setFlashdata('error', 'Failed. ');
    //     //     }
    //     // }

    //     $theme_data = $this->getThemeData();
    //     $theme_data['head']['title'] = "Travelling Services";
    //     $theme_data['head']['meta_keyword'] = "Travelling Services";
    //     $theme_data['head']['meta_description'] = "Travelling Services";
    //     $theme_data['view_file'] = 'Home/contact';
    //     $theme_data['session'] = $this->session;
    //     return view('Home//main', $theme_data);
    // }

    // }
    // public function sendcontactEmail($senderEmail, $recipient1, $subject1, $messageRecipient1)
    // {
    //     $email1 = \Config\Services::email();
    //     $email1->setNewline("\r\n");
    //     $email1->setTo($recipient1);
    //     $email1->setMessage($messageRecipient1);
    //     $email1->setSubject($subject1);
    //     $email1->setMailType('html');

    //     if (!$email1->send()) {
    //         // Print email debug information

    //         return false;
    //     }

    //     return true;
    // }

    // public function sendAdmin($Admin, $subjects, $message)
    // {
    //     $email = \Config\Services::email();

    //     $email->setNewline("\r\n");
    //     $email->setTo($Admin);
    //     $email->setSubject($subjects);
    //     $email->setMessage($message);
    //     $email->setMailType('html');


    //     if (!$email->send()) {

    //         return false;
    //     }

    //     return true;
    // }
    public function serveFile($fileName)
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




    public function Emailsubscribe()
    {


        $SubscribeModel = new SubscribeModel();
        $emailTo = $this->request->getPost('email');
        $existingSubscriber = $SubscribeModel->where('email', $emailTo)->first();

        if (!empty($existingSubscriber)) {
            // If the email already exists and is subscribed, set flashdata message
            if ($existingSubscriber['is_subscribe'] == 1) {
                $response['status'] = 'error';
                $response['message'] = 'Email already subscribed.';
                return $this->response->setJSON($response);
            } else {

                $SubscribeModel->update($existingSubscriber['id'], ['is_subscribe' => 1]);
            }
        } else {

            $SubscribeModel->insert(['email' => $emailTo, 'is_subscribe' => 1]);
        }

        session()->set('unsubscribe_email', $emailTo);


        $adminmessage = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New User Subscription</title>
      
    </head>
    <body>
    
        <div class="container">
            <h2>New User Subscription</h2>
            <p>A new user has subscribed to your website.</p>
            <p>Email: ' . $emailTo . '</p>
       
        </div>
    
    </body>
    </html>';
        $messageRecipient1 = view('Email/Subscribe');
        $subject1 = 'Welcome to Arcturus Consulting Services Inc. Newsletter!';
        $Adminsubject = 'New User Subscription';


        $infoEmailAddress = 'rs.8602674195@gmail.com';
        // $infoEmailAddress = 'info@arcturusconsultingservices.com';

        $senderEmail = $emailTo;
        $recipient1 = $emailTo;
        $Admin = $infoEmailAddress;
        $subjects =  $Adminsubject;
        $message = $adminmessage;

        // //    print_r( $infoEmailAddress);die;
        // if ($this->sendsubscribeEmail($senderEmail, $recipient1, $subject1, $messageRecipient1) && $this->sendsubscribeAdmin($Admin, $subjects, $message)) {


        //     $response['status'] = 'success';
        //     $response['message'] = 'Thank you for subscribing to our newsletter! You are now connected to the latest updates, news, and offers from Arcturus Consulting Services Inc. Expect exciting content delivered straight to your inbox. Stay tuned for exclusive promotions and valuable insights. Welcome aboard!';
        // } else {
        //     $response['status'] = 'error';
        //     $response['message'] = 'Failed. There was an error sending the email.';
        // }

        // return $this->response->setJSON($response);
    }

    public function sendEmail($senderEmail, $recipient1, $subject1, $messageRecipient1)
    {

        $email1 = \Config\Services::email();
        $email1->setNewline("\r\n");
        $email1->setTo($recipient1);
        $email1->setMessage($messageRecipient1);
        $email1->setSubject($subject1);
        $email1->setMailType('html');

        if (!$email1->send()) {
            return false;
        }

        return true;
    }

    public function sendAdmin($Admin, $subjects, $message)
    {
        $email = \Config\Services::email();

        $email->setNewline("\r\n");
        $email->setTo($Admin);
        $email->setSubject($subjects);
        $email->setMessage($message);
        $email->setMailType('html');


        if (!$email->send()) {
            return false;
        }

        return true;
    }

    public function unsubscribe()
    {
        $Semail = session()->get('unsubscribe_email');

        $SubscribeModel = new SubscribeModel();
        $Un = $SubscribeModel->where('email', $Semail)->set(['is_subscribe' => 0])->update();
        $message = view('Email/UnSubscribe');

        $email = \Config\Services::email();
        $email->setNewline("\r\n");
        $email->setTo($Semail);
        $email->setSubject('Email unsubscribed');
        $email->setMessage($message);
        $email->setMailType('html');

        if ($email->send()) {
            $this->session->setFlashdata('success', 'You have been Unsubscribed. Sorry to see you go!');
        } else {
            $this->session->setFlashdata('error', 'Failed. There was an error sending the email.');
        }

        // Set theme data
        $theme_data = $this->getThemeData();
        // $theme_data['head']['title'] = "Arcturus Consulting Services";
        // $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        // $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/contact';


        return view('Home//main', $theme_data);
    }

    public function getcitylist()
    {
        $stateid = $this->request->getPost('state_id');
        $citymodel = new CityModel();
        
        // Fetch the list of cities related to the state
        $citylist = $citymodel->where('state_id', $stateid)->findAll();
    
        // Initialize the options string
        $opt = '<option value="">Select City</option>';
    
        // Loop through citylist and append each city as an option
        foreach ($citylist as $citydata) {
            $opt .= "<option value='" . $citydata['city_id'] . "'>" . $citydata['city_name'] . "</option>";
        }
    
        // Return the options string as a JSON response
        return $this->response->setJSON($opt);
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
