<?php

class Search extends CI_Controller
{
    function index()
    {
        $kw = $this->input->get('s',true);
        $data = array(
                    '_head_title' => 'Jesus',
                    '_page_content_template' => 'search',
                    'data' => array(),
                );
        if ($kw)
        {
            $filter = $this->input->get('filter',true);
            if ($filter)
            {
                
            }
            
            
            $this->load->helper('popular_searches');
            popsearch_store($kw);

            
            $data['data'] = array(
                    'keyword' => $kw,
            );
            $result = json_decode($this->jf->_search($kw));
            
            printr($result->titles);
        
            //$this->theme->
        }
        else
        {
            // USER DID NOT PUT A WORD
            $data['data'] = array(
                    'keyword' => '',
            );
        }
        
        $this->theme->render($data);
    }
    
    function __construct()
    {
        parent::__construct();
    }
}