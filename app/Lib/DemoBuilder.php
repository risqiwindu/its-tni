<?php
namespace App\Lib;

use App\Article;
use App\Category;
use App\CourseCategory;
use App\FooterMenu;
use App\HeaderMenu;
use App\Setting;
use App\Template;

class DemoBuilder
{

    public function run(){
        $this->articles();
        $this->categories();
        $this->headerMenu();
        $this->footerMenu();
        $this->settings();

        $this->templateOptionsBuson();
        $this->templateOptionsEdugrid();

    }

    public function settings(){
        $setting= Setting::where('key','image_logo')->first();
        if($setting){
            $setting->value = 'img/demo/logo.png';
            $setting->save();
        }

        $setting= Setting::where('key','image_icon')->first();
        if($setting){
            $setting->value = 'img/demo/icon.png';
            $setting->save();
        }

        Setting::where('key','general_site_name')->update(['value'=>'My Site']);
        Setting::where('key','general_homepage_title')->update(['value'=>'My Agency']);

        Setting::where('key','general_admin_email')->update(['value'=>'info@email.com']);
        Setting::where('key','general_address')->update(['value'=>'234, Jersey Road']);
        Setting::where('key','general_tel')->update(['value'=>'08039485906']);
        Setting::where('key','general_contact_email')->update(['value'=>'info@email.com']);
    }

    public function articles(){
        Article::truncate();
        Article::insert(
            [
                [
                    'title'=>'Who We Are',
                    'content'=>$this->dummyText(),
                    'slug'=>'who-we-are',
                    'enabled'=>1,
                    'meta_title'=>'Who We Are'
                ],
                [
                    'title'=>'Our Services',
                    'content'=>$this->dummyText(),
                    'slug'=>'our-services',
                    'enabled'=>1,
                    'meta_title'=>'Our Services'
                ],
                [
                    'title'=>'FAQ',
                    'content'=>$this->dummyText(),
                    'slug'=>'faq',
                    'enabled'=>1,
                    'meta_title'=>'FAQs'
                ]
            ]
        );
    }

    public function categories(){
        CourseCategory::insert([
           [
               'name'=>'Category 1',
               'description'=>'Description of first category',
               'sort_order'=>1,
               'enabled'=>1,
               'parent_id'=>null
           ],
            [
                'name'=>'Category 2',
                'description'=>'Description of second category',
                'sort_order'=>2,
                'enabled'=>1,
                'parent_id'=>null
            ]
        ]);
    }

    public function headerMenu(){
        HeaderMenu::truncate();

        HeaderMenu::insert([
            [
                'id'=>1,
                'name'=>'Home Page',
                'label'=>'Home',
                'url'=>'/',
                'type'=>'p',
                'sort_order'=>1,
                'parent_id'=>0
            ],
            [
                'id'=>2,
                'name'=>'Custom',
                'label'=>'Info',
                'url'=>'#',
                'type'=>'c',
                'sort_order'=>'2',
                'parent_id'=>0
            ]
        ]

        );

        //get articles
        $count = 1;
        foreach(Article::orderBy('title','desc')->get() as $article){
            HeaderMenu::insert([
                'name'=>'Article: '.$article->title,
                'label'=>$article->title,
                'url'=>'/'.$article->slug,
                'type'=>'a',
                'sort_order'=>$count,
                'parent_id'=>2
            ]);
            $count++;
        }



        HeaderMenu::insert([
            [
                'name'=>'Courses',
                'label'=>'Courses',
                'url'=>'/courses',
                'type'=>'p',
                'sort_order'=>3,
                'parent_id'=>0
            ],
                [
                    'name'=>'Sessions',
                    'label'=>'Sessions',
                    'url'=>'/sessions',
                    'type'=>'p',
                    'sort_order'=>4,
                    'parent_id'=>0
                ],
            [
                'name'=>'Blog',
                'label'=>'Blog',
                'url'=>'/blog',
                'type'=>'p',
                'sort_order'=>'5',
                'parent_id'=>0
            ],
            [
                'name'=>'Contact',
                'label'=>'Contact',
                'url'=>'/contact',
                'type'=>'p',
                'sort_order'=>'6',
                'parent_id'=>0
            ]
        ]

        );

    }

    public function footerMenu(){
        FooterMenu::truncate();

        FooterMenu::insert([
                [
                    'id'=>1,
                    'name'=>'Custom',
                    'label'=>'Quick Links',
                    'url'=>'#',
                    'type'=>'c',
                    'sort_order'=>1,
                    'parent_id'=>0
                ],
            ]

        );



        FooterMenu::insert([
                [
                    'name'=>'Courses',
                    'label'=>'Online Courses',
                    'url'=>'/courses',
                    'type'=>'p',
                    'sort_order'=>1,
                    'parent_id'=>1
                ],
                [
                    'name'=>'Sessions',
                    'label'=>'Upcoming Sessions',
                    'url'=>'/sessions',
                    'type'=>'p',
                    'sort_order'=>2,
                    'parent_id'=>1
                ],
                [
                    'name'=>'Blog',
                    'label'=>'Blog',
                    'url'=>'/blog',
                    'type'=>'p',
                    'sort_order'=>3,
                    'parent_id'=>1
                ],
                [
                    'name'=>'Contact',
                    'label'=>'Contact',
                    'url'=>'/contact',
                    'type'=>'p',
                    'sort_order'=>4,
                    'parent_id'=>1
                ]
            ]

        );


    }

    public function templateOptionsBuson(){
      //  Template::where('id','>',0)->update(['enabled'=>0]);
        //create template record
        $template = Template::where('directory','buson')->first();
        if(!$template){
            $template= Template::create([
                'name'=>'Buson',
                'enabled'=>0,
                'directory'=>'buson'
            ]);
        }


        //now set options
        $template->templateOptions()->createMany([
            [
                'name'=>'top-bar',
                'value'=>'a:11:{s:6:"_token";s:40:"FJCotq9TzWxE17MEEaYWfJhLXyEwDDMqsF9bglnK";s:7:"enabled";s:1:"1";s:14:"office_address";s:16:"234, Jersey Road";s:5:"email";s:14:"info@email.com";s:8:"bg_color";N;s:10:"font_color";N;s:15:"social_facebook";s:1:"#";s:14:"social_twitter";s:1:"#";s:16:"social_instagram";s:1:"#";s:14:"social_youtube";s:1:"#";s:15:"social_linkedin";s:1:"#";}',
                'enabled'=>1
            ],
            [
                'name'=>'navigation',
                'value'=>'a:5:{s:6:"_token";s:40:"FJCotq9TzWxE17MEEaYWfJhLXyEwDDMqsF9bglnK";s:7:"enabled";s:1:"1";s:8:"bg_color";N;s:10:"font_color";N;s:12:"order_button";s:1:"1";}',
                'enabled'=>'1',
            ],
            [
                'name'=>'slideshow',
                'value'=>'a:72:{s:6:"_token";s:40:"gCOeCtTPQaESMEVTShGLb7rbvYf3hAPnbYXSSdm0";s:7:"enabled";s:1:"1";s:5:"file1";s:68:"img/demo/slide1.jpg";s:14:"slide_heading1";s:27:"Professional Courses";s:19:"heading_font_color1";N;s:11:"slide_text1";s:33:"Get the best courses!";s:16:"text_font_color1";N;s:12:"button_text1";s:10:"Learn More";s:4:"url1";s:1:"#";s:5:"file2";s:68:"img/demo/slide2.png";s:14:"slide_heading2";s:26:"Training Sessions";s:19:"heading_font_color2";N;s:11:"slide_text2";s:36:"Get the best training";s:16:"text_font_color2";N;s:12:"button_text2";s:10:"Learn More";s:4:"url2";s:1:"#";s:5:"file3";N;s:14:"slide_heading3";N;s:19:"heading_font_color3";N;s:11:"slide_text3";N;s:16:"text_font_color3";N;s:12:"button_text3";N;s:4:"url3";N;s:5:"file4";N;s:14:"slide_heading4";N;s:19:"heading_font_color4";N;s:11:"slide_text4";N;s:16:"text_font_color4";N;s:12:"button_text4";N;s:4:"url4";N;s:5:"file5";N;s:14:"slide_heading5";N;s:19:"heading_font_color5";N;s:11:"slide_text5";N;s:16:"text_font_color5";N;s:12:"button_text5";N;s:4:"url5";N;s:5:"file6";N;s:14:"slide_heading6";N;s:19:"heading_font_color6";N;s:11:"slide_text6";N;s:16:"text_font_color6";N;s:12:"button_text6";N;s:4:"url6";N;s:5:"file7";N;s:14:"slide_heading7";N;s:19:"heading_font_color7";N;s:11:"slide_text7";N;s:16:"text_font_color7";N;s:12:"button_text7";N;s:4:"url7";N;s:5:"file8";N;s:14:"slide_heading8";N;s:19:"heading_font_color8";N;s:11:"slide_text8";N;s:16:"text_font_color8";N;s:12:"button_text8";N;s:4:"url8";N;s:5:"file9";N;s:14:"slide_heading9";N;s:19:"heading_font_color9";N;s:11:"slide_text9";N;s:16:"text_font_color9";N;s:12:"button_text9";N;s:4:"url9";N;s:6:"file10";N;s:15:"slide_heading10";N;s:20:"heading_font_color10";N;s:12:"slide_text10";N;s:17:"text_font_color10";N;s:13:"button_text10";N;s:5:"url10";N;}',
                'enabled'=>'1',
            ],
            [
                'name'=>'homepage-services',
                'value'=>'a:12:{s:6:"_token";s:40:"gCOeCtTPQaESMEVTShGLb7rbvYf3hAPnbYXSSdm0";s:7:"enabled";s:1:"1";s:5:"file1";s:68:"img/demo/service1.jpg";s:8:"heading1";s:14:"Quality Training";s:5:"text1";s:129:"<p>We provide high quality in person training at all our locations.</p>";s:5:"file2";s:68:"img/demo/service2.jpg";s:8:"heading2";s:18:"Online Training";s:5:"text2";s:176:"Enrol for one of our online courses and learn at your own pace! We have different modules available for all your learning needs!<br>";s:12:"info_heading";s:23:"The Best Training Company";s:9:"info_text";s:167:"<p>We are the best training service provider in our Industry! Get quality training now!<br></p>";s:11:"button_text";s:10:"Learn More";s:3:"url";s:1:"#";}',
                'enabled'=>'1',
            ],
            [
                'name'=>'homepage-about',
                'value'=>'a:7:{s:6:"_token";s:40:"gCOeCtTPQaESMEVTShGLb7rbvYf3hAPnbYXSSdm0";s:7:"enabled";s:1:"1";s:7:"heading";s:28:"1000 Clients and counting...";s:4:"text";s:318:"<p>Over the years, we are proud to have serviced more than 1000 satisfied clients! Our client list is spread across all states of the federation. </p><p>Some of our clients include:</p><ol><li>Supertech Limited</li><li>Super Schools Limited</li><li>Andre Montessori School</li><li>Kings Elementary School<br></li></ol>";s:11:"button_text";s:9:"Read more";s:10:"button_url";s:1:"#";s:5:"image";s:68:"img/demo/about.jpg";}',
                'enabled'=>'1',
            ],
            [
                'name'=>'testimonials',
                'value'=>'a:28:{s:6:"_token";s:40:"8jnb6kBKNB2moNVBP322DvRN1xDSTpkha0PSlQ6w";s:7:"enabled";s:1:"1";s:11:"sub_heading";s:12:"Testimonials";s:7:"heading";s:16:"What Parents Say";s:5:"name1";s:7:"Shola A";s:5:"role1";s:3:"Mom";s:6:"image1";s:67:"img/demo/tes1.png";s:5:"text1";s:445:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";s:5:"name2";s:8:"Tolulope";s:5:"role2";s:3:"Dad";s:6:"image2";s:67:"img/demo/tes2.png";s:5:"text2";s:445:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";s:5:"name3";s:5:"Bunmi";s:5:"role3";s:3:"Mom";s:6:"image3";s:67:"img/demo/tes3.png";s:5:"text3";s:445:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";s:5:"name4";N;s:5:"role4";N;s:6:"image4";N;s:5:"text4";N;s:5:"name5";N;s:5:"role5";N;s:6:"image5";N;s:5:"text5";N;s:5:"name6";N;s:5:"role6";N;s:6:"image6";N;s:5:"text6";N;}',
                'enabled'=>'1',
            ],
            [
                'name'=>'blog',
                'value'=>'a:5:{s:6:"_token";s:40:"8jnb6kBKNB2moNVBP322DvRN1xDSTpkha0PSlQ6w";s:7:"enabled";s:1:"1";s:11:"sub_heading";s:4:"Blog";s:7:"heading";s:12:"Latest Posts";s:5:"limit";s:1:"3";}',
                'enabled'=>'0',
            ],
            [
                'name'=>'contact-form',
                'value'=>'a:6:{s:6:"_token";s:40:"gCOeCtTPQaESMEVTShGLb7rbvYf3hAPnbYXSSdm0";s:7:"enabled";s:1:"1";s:7:"heading";s:12:"Get in touch";s:4:"text";s:129:"<p>Do you have any questions about our services? Get in touch with us now and we will be glad to get back to you shortly.<br></p>";s:8:"bg_color";N;s:10:"font_color";N;}',
                'enabled'=>'1',
            ],
            [
                'name'=>'footer',
                'value'=>'a:13:{s:6:"_token";s:40:"FJCotq9TzWxE17MEEaYWfJhLXyEwDDMqsF9bglnK";s:7:"enabled";s:1:"1";s:4:"text";s:60:"We are the best agency for all your training needs!";s:15:"newsletter-code";N;s:7:"credits";s:20:"© 2020 Training Company";s:8:"bg_color";N;s:10:"font_color";N;s:5:"image";N;s:15:"social_facebook";s:1:"#";s:14:"social_twitter";s:1:"#";s:16:"social_instagram";s:1:"#";s:14:"social_youtube";s:1:"#";s:15:"social_linkedin";s:1:"#";}',
                'enabled'=>'1',
            ]
        ]);

    }

    public function templateOptionsEdugrid(){
        Template::where('id','>',0)->update(['enabled'=>0]);
        //create template record
        $template = Template::where('directory','edugrids')->first();
        if(!$template){
            $template= Template::create([
                'name'=>'EduGrids',
                'enabled'=>1,
                'directory'=>'edugrids'
            ]);
        }
        $template->enabled=1;
        $template->save();

        //now set options
        $this->setOption($template,'top-bar',[
            'social_facebook'=>'#',
            'social_twitter'=>'#',
            'social_instagram'=>'#',
            'social_youtube'=>'#',
            'social_linkedin'=>'#'
        ]);

        $this->setOption($template,'navigation',[
            'search_form'=>'1'
        ]);


        $this->setOption($template,'slideshow',[
            //slide 1
            'file1'=>'templates/edugrids/assets/assets/images/demo/slider-bg1.jpg',
            'slide_heading1'=>'The Best Online And Offline Courses. Get Started Today',
            'sub_heading1'=>'Start Learning Today',
            'slide_text1'=>'Enrol for our courses today and get the best training in the industry. Our courses are self paced and delivered via web or mobile',
            'button_1_text1'=>'Learn More',
            'url_11'=>'#',
            'button_2_text1'=>'Our Courses',
            'url_21'=>'/courses',

            //slide 2
            'file2'=>'templates/edugrids/assets/assets/images/demo/slider-bg2.jpg',
            'slide_heading2'=>'Professional World-Class Instructors',
            'sub_heading2'=>'Our Instructors',
            'slide_text2'=>'Get best training from the best instructors in the industry. Our trainers have years of experience and pre-screened',
            'button_1_text2'=>'',
            'url_12'=>'',
            'button_2_text2'=>'Our Instructors',
            'url_22'=>'/instructors',

        ]);

        $this->setOption($template,'homepage-services',[
            'heading1'=>'Trending Courses',
            'text1'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus sed.',
            'button_text1'=>'Explore',
            'url1'=>'#',

            'heading2'=>'Certified Teachers',
            'text2'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus sed.',
            'button_text2'=>'Explore',
            'url2'=>'#',

            'heading3'=>'Books & Library',
            'text3'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus sed.',
            'button_text3'=>'Explore',
            'url3'=>'#'

        ]);

        $this->setOption($template,'homepage-about',[
            'sub_heading'=>'About Us',
            'heading'=>'Welcome To Our Portal',
            'text'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad min im veniam, quis nostrud exercitati ullamco laboris nisi ut aliquip ex ea commodo consequat.

Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eius mod tempor incididunt ut labore et dolore magna aliqua.',
            'button_text'=>'Learn More',
            'button_url'=>'/who-we-are',
            'image'=>'templates/edugrids/assets/assets/images/demo/about-img2.png',
        ]);

        $this->setOption($template,'featured-courses',[
            'heading'=>'Featured Courses',
            'sub_heading'=>'Browse our top courses and get high quality training',
            'courses'=>[]
        ]);

        $this->setOption($template,'highlights',[
            'image'=>'templates/edugrids/assets/assets/images/demo/achievement-bg.jpg',

            'heading1'=>'500 +',
            'text1'=>'Happy Clients',

            'heading2'=>'70 +',
            'text2'=>'Online Courses',

            'heading3'=>'100 %',
            'text3'=>'Satisfaction',

            'heading4'=>'100 %',
            'text4'=>'Support',

        ]);

        $this->setOption($template,'instructors',[
            'heading'=>'Our Experienced Instructors',
            'sub_heading'=>'Get training from the best Instructors in the world!'
        ]);

        $this->setOption($template,'testimonials',[
            'heading'=>'What Our Students Say',
            'sub_heading'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.',

            'name1'=>'Jane Smith',
            'role1'=>'Student',
            'image1'=>'templates/edugrids/assets/assets/images/demo/testi-1.jpg',
            'text1'=>'It’s amazing how much easier it has been to meet new people and create instant
connections. I have the exact same personality, the only thing that has changed is my
mindset and a few behaviors.',

            'name2'=>'Micheal James',
            'role2'=>'Student',
            'image2'=>'templates/edugrids/assets/assets/images/demo/testi-2.jpg',
            'text2'=>'It’s amazing how much easier it has been to meet new people and create instant
connections. I have the exact same personality, the only thing that has changed is my
mindset and a few behaviors.',


            'name3'=>'Fred Smart',
            'role3'=>'Student',
            'image3'=>'templates/edugrids/assets/assets/images/demo/testi-3.jpg',
            'text3'=>'It’s amazing how much easier it has been to meet new people and create instant
connections. I have the exact same personality, the only thing that has changed is my
mindset and a few behaviors.',


            'name4'=>'Alicia Jackson',
            'role4'=>'Student',
            'image4'=>'templates/edugrids/assets/assets/images/demo/testi-4.jpg',
            'text4'=>'It’s amazing how much easier it has been to meet new people and create instant
connections. I have the exact same personality, the only thing that has changed is my
mindset and a few behaviors.',


            'name5'=>'Mary Smith',
            'role5'=>'Student',
            'image5'=>'templates/edugrids/assets/assets/images/demo/testi-1.jpg',
            'text5'=>'It’s amazing how much easier it has been to meet new people and create instant
connections. I have the exact same personality, the only thing that has changed is my
mindset and a few behaviors.',


            'name6'=>'Sara Smith',
            'role6'=>'Student',
            'image6'=>'templates/edugrids/assets/assets/images/demo/testi-2.jpg',
            'text6'=>'It’s amazing how much easier it has been to meet new people and create instant
connections. I have the exact same personality, the only thing that has changed is my
mindset and a few behaviors.',

        ]);

        $this->setOption($template,'blog',[
            'heading'=>'Latest News & Blog',
            'sub_heading'=>'Latest posts from our Blog.',
            'limit'=>'3'
        ]);

        $icons = [];
        for($i=1;$i <= 5; $i++){
            $icons['image'.$i] = 'templates/edugrids/assets/assets/images/demo/client'.$i.'.svg';
        }

        for($i=1;$i <= 5; $i++){
            $num = $i +5;
            $icons['image'.$num] = 'templates/edugrids/assets/assets/images/demo/client'.$i.'.svg';
        }

        for($i=1;$i <= 2; $i++){
            $num = $i +10;
            $icons['image'.$num] = 'templates/edugrids/assets/assets/images/demo/client'.$i.'.svg';
        }

        $this->setOption($template,'icons',$icons);

        $this->setOption($template,'footer',[
            'text'=>'Nemo enim enim voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ magni dolores eos qui ratione.',
            'social_facebook'=>'#',
            'social_twitter'=>'#',
            'social_instagram'=>'#',
            'social_youtube'=>'#',
            'social_linkedin'=>'#',
            'credits'=>'Company Name',
            'blog'=>'1'
        ]);


    }

    private function setOption($template,$option,$data,$enabled=1){

        $optionRow = $template->templateOptions()->where('name',$option)->first();
        if(!$optionRow){
            $template->templateOptions()->create([
                'name'=>$option,
                'value'=>serialize($data),
                'enabled'=>$enabled
            ]);
        }
        else{
            $template->templateOptions()->where('name',$option)->update([
                'value'=>serialize($data),
                'enabled'=>$enabled
            ]);
        }

    }

    private function dummyText(){
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
    }
}
