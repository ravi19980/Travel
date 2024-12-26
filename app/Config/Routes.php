<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('oracle', 'Home::oracle');
$routes->get('applicationservice', 'Home::applicationservice');
$routes->get('demoservice', 'Home::demoservice');
$routes->get('testingservice', 'Home::testingservice');
$routes->get('recruitmentservice', 'Home::recruitmentservice');
$routes->get('trainingservice', 'Home::trainingservice');
$routes->get('blog', 'Home::blog');
$routes->get('blog_detail', 'Home::blog_detail');
$routes->get('blog_detail2', 'Home::blog_detail2');



$routes->get('contact', 'Home::contact');
$routes->post('contact', 'Home::contact');
$routes->get('services', 'Home::services');
$routes->get('career', 'Home::career');
$routes->post('career', 'Home::career');
$routes->post('Emailsubscribe', 'Home::Emailsubscribe');
$routes->get('Emailsubscribe', 'Home::Emailsubscribe');
$routes->match(['get','post'],'Home/unsubscribe','Home::unsubscribe');
$routes->get('unsubscribe', 'Home::unsubscribe');

$routes->get('Career/serveFile/(:any)', 'Home::serveFile/$1');
$routes->get('/track_get','api::track_get');




$routes->post('/sendOTP_post','api::sendOTP_post');
$routes->post('verifyOTP_post', 'api::verifyOTP_post');
$routes->post('resetPassword_post', 'api::resetPassword_post');

$routes->post('/AdminLogin_post','api::AdminLogin_post');
$routes->get('/AdminLogin_post','api::AdminLogin_post');

$routes->post('/enquiry_post','api::enquiry_post');
$routes->get('/enquiry_get','api::enquiry_get');
$routes->post('/enquiry_delete','api::enquiry_delete');   
$routes->post('/enquiry_update','api::enquiry_update'); 

$routes->post('/singleenquiry_post','api::singleenquiry_post'); 
$routes->post('/singleBlog_post','api::singleBlog_post'); 
$routes->post('/singleservice_post','api::singleservice_post'); 
$routes->post('/singlecustomer_post','api::singlecustomer_post'); 
$routes->post('/singlecompany_post','api::singlecompany_post'); 
$routes->post('/singleuser_post','api::singleuser_post'); 
$routes->post('/singlelead_post','api::singlelead_post'); 


$routes->post('/Service_post','api::Service_post');
$routes->get('/Service_get','api::Service_get'); 
$routes->post('/Service_delete','api::Service_delete'); 
$routes->post('/Service_update','api::Service_update'); 


$routes->post('/Blog_post','api::Blog_post');
$routes->get('/Blog_get','api::Blog_get'); 
$routes->post('/Blog_update','api::Blog_update'); 
$routes->post('/Blog_delete','api::Blog_delete'); 

$routes->get('tabs/blogs','api::blogs'); 
$routes->get('tabs/blogs','api::enquires'); 
$routes->get('tabs/blogs','api::team'); 

$routes->get('writable/uploads/(:any)', 'api::showImage/$1');

$routes->post('/team_post','api::team_post');
$routes->post('/singleteam_post','api::singleteam_post');
$routes->get('/team_get','api::team_get'); 
$routes->post('/team_update','api::team_update'); 
$routes->post('/team_delete','api::team_delete'); 
$routes->get('/uploads/(:any)', 'api::showteam/$1');

$routes->post('/Addstatus_post','api::Addstatus_post'); 
$routes->post('/status_update','api::status_update'); 
$routes->get('/status_get','api::status_get'); 
$routes->post('/status_delete','api::status_delete'); 

$routes->get('/track_get','api::track_get'); 
$routes->get('/track','Home::track'); 

$routes->post('/customer_post','api::customer_post');
$routes->get('/Customer_get','api::Customer_get');
$routes->post('/customer_update','api::customer_update');
$routes->post('/Customer_delete','api::Customer_delete');
$routes->post('/Customertype_post','api::Customertype_post');
$routes->post('/Emailsubscribe_post', 'api::Emailsubscribe_post');
$routes->post('/unsubscribe_post', 'api::unsubscribe_post');



$routes->post('/Companydetail_post','api::Companydetail_post');
$routes->get('/Company_get','api::Company_get');
$routes->post('/Company_update','api::Company_update');
$routes->post('/Company_delete','api::Company_delete');

$routes->post('/UserType_post', 'api::UserType_post');
$routes->post('/createUser_post', 'api::createUser_post');
$routes->get('/User_get','api::User_get'); 
$routes->post('/user_update','api::user_update'); 


$routes->post('/lead_post', 'api::lead_post');
$routes->get('/singlelead_post', 'api::singlelead_post');
$routes->post('/lead_update','api::lead_update');
$routes->post('/lead_delete','api::lead_delete');
$routes->get('/lead_get','api::lead_get');

$routes->get('/dashboard_get','api::dashboard_get');


$routes->post('/Emailsubscribe_post', 'api::Emailsubscribe_post');
$routes->post('/unsubscribe_post', 'api::unsubscribe_post');