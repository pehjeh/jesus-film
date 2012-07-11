<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jfapi extends CI_Controller
{
    public function init()
    {
        $titles = $this->jf->_getTitles();
        
        $this->output
            ->set_content_type('application/json')
            ->set_output($titles);
    }
    
    public function __construct()
    {
        parent::__construct();
    }
}