<?php

class Theme
{
    var $_theme_name = '';
    var $_theme_data = '';
    var $_theme_path = '';
    var $data = array(
        '_current_url' => '',
        '_base_url' => '',
        '_page_template' => 'page',
        '_page_content_template' => '',
        '_theme_path_rel' => 'theme/',
        '_theme_path_abs' => '',
        '_head_title' => '',
        '_scripts' => array(),
        '_styles' => array(),
        '_theme_page' => '',
        '_content' => '',
        '_header' => '',
        '_footer' => '',
        '_page' => '',
        
    );
    
    /*
     * Renders the page from TOP to BOTTOM
    */
    function render($data = array())
    {
        $this->data = array_merge($this->data,$data);
        
        $this->data['_scripts'] = join("\n",$this->data['_scripts']);
        $this->data['_styles'] = join("\n",$this->data['_styles']);
        
        // GET THE CONTENT TEMPLATE AND POPULATE VARIABLE
        if (strlen($this->data['_page_content_template'])>0)
         $this->data['_content'] = $this->render_section($this->data['_page_content_template'], $this->data);
        
        // GET THE PAGE TEMPLATE AND POPULATE VARIABLES
        $this->data['_page'] = $this->render_section($this->data['_page_template'], $this->data);
        
        // PREPARE HEADER & FOOTER
        $this->data['_header'] = $this->render_section('header', $this->data);
        $this->data['_footer'] = $this->render_section('footer', $this->data);
        
        // TIME TO DISPLAY THE PAGE
        echo $this->render_section('html', $this->data);
        //$this->output->enable_profiler(TRUE);
    }
    
    /*
     * Renders only a section 
    */
    function render_section($tpl, $data)
    {
        $data = array_merge($data,$this->get_blobal_vars());
        return $this->load->view($this->data['_theme_path_rel'].$tpl,$data,true);
    }
    
    function add_js($content,$type = 'inline')
    {
        if ($type == 'inline')
        {
            $output = '<script type="text/javascript">
                        '.$content.'
                        </script>';
        }
        else if ($type == 'link')
        {
            if (!preg_match('/^http/',$content))
            {
                $content = ltrim($content,'/');
                $content = $this->data['_theme_path_abs'] . $content;
            }
            $output = '<script type="text/javascript" src="'.$content.'"></script>';
        }
        
        $this->data['_scripts'][] = $output;
    }
    
    function add_css($content,$type = 'inline')
    {
        if ($type == 'inline')
        {
            $output = '<style type="text/css">
                        '.$content.'
                        </style>';
        }
        else if ($type == 'link')
        {
            if (!preg_match('/^http/',$content))
            {
                $content = ltrim($content,'/');
                $content = $this->data['_theme_path_abs'] . $content;
            }
            $output = '<link type="text/css" rel="stylesheet" href="'.$content.'" />';
        }
        
        $this->data['_styles'][] = $output;
    }
    
    function theme()
    {
        return $this->data['_theme_path_rel'];
    }
    
    function get_blobal_vars()
    {
        return array(
            '_theme_path_rel' => $this->data['_theme_path_rel'] ,
            '_theme_path_abs' => $this->data['_theme_path_abs'],
            '_current_url' => $this->data['_current_url'],
            '_base_url' => $this->data['_base_url'],
        );
        
    }
    
    function __construct()
    {
        attach_obj($this);
        
        // Load config
        $this->config->load('theme');
        
        $this->_theme_name = $this->config->item('theme_name');
        $this->data['_theme_path_rel'] = 'theme/'.$this->config->item('theme_name').'/';
        $this->data['_theme_path_abs'] = base_url() . 'theme/'.$this->config->item('theme_name').'/';
        $this->data['_current_url'] = base_url() . uri_string();
        $this->data['_base_url'] = base_url();
    }
}