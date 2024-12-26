<?php

namespace App\Controllers;

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
        $theme_data['head']['title'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_keyword'] = "Arcturus Consulting Services";
        $theme_data['head']['meta_description'] = "Arcturus Consulting Services";
        $theme_data['view_file'] = 'Home/career';
        
        return view('Home//main', $theme_data);
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
