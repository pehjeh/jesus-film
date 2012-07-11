<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller
{
    function index()
    {
        $uri = strtolower(preg_replace('/[\-\/]+/','_',uri_string()));

        $data = array(
            '_theme_path' => base_url().$this->theme->theme(),//'theme/jf1/',
            '_head_title' => 'The Jesus Film',  
        );
        
        $data['_header'] = $this->load->view('theme/jf1/header',$data,true);
        $data['_footer'] = $this->load->view('theme/jf1/footer',$data,true);
        
        $page_path = APPPATH."views/{$this->theme->data['_theme_path_rel']}page/{$uri}.php";

        if (@file_exists($page_path))
        {
            $page_details = $this->page_settings($uri);
            $data = array(
                    '_head_title' => isset($page_details['title'])?$page_details['title'] : '',
                    '_page_content_template' => 'page/'.$uri,
                    'data' => $data,
             );
        }
        else
        {
            $this->output->set_status_header('404');
            $data = array(
                    '_head_title' => 'Page Not Found',
                    '_page_content_template' => '404',
                    'data' => $data,
             );
        }

         $this->theme->render($data);
    }
    
    private function page_settings($page)
    {
        $data = array(
            'about' => array(
                'title' => 'About Us',
            ),
            'faq' => array(
                'title' => 'FAQ',
            ),
            'share_with_a_friend' => array(
                'title' => 'Share with a Friend',  
            ),
            'embed_the_movie' => array(
                'title' => 'Embed The Movie',  
            ),
        );
        
        if (isset($data[$page]))
            return $data[$page];
            
        return array();
    }
    
    function __construct()
    {
        parent::__construct();
    }
}