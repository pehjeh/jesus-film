<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
        var $settings;
        function index()
        {       
                $data = array(
                    '_head_title' => 'Jesus',
                    '_page_content_template' => 'page-front',
                    'data' => array(),
                );

                $this->theme->add_js('/js/home.js','link');
                $this->theme->add_js('/js/jquery.bxSlider.min.js','link');
                
                //$this->load->add_package_path(APPPATH.'third_party/popular_searches/',TRUE);
                $this->load->helper('popular_searches');
                
                $lang = json_decode($this->jf->_getLanguages());
                
                $data['popular_searches'] = popsearch_get_popular_searches(array('url' => base_url().'search?s='));
                $data['featured_videos'] = $this->get_featured_videos();
                $data['carousel_videos'] = $this->get_carousel_videos();
                $data['featured_videos_selected'] = $this->get_featured_videos_selected();
                
                $this->theme->render($data);
        }
        
        
        private function get_carousel_videos()
        {
                $output = '';
                $data = array();
                foreach($this->settings['carousel_videos'] AS $id)
                {
                        $video_details = $this->jf->_getAssetDetails($id);
                        $data = json_decode($video_details);
                        $data = (array) $data->assetDetails[0];
                        $data['refId'] = $id;
                        $data['url'] = $this->jf->generate_uri($data);
                        $output .= $this->load->view('theme/jf1/homepage/carousel_video_item',$data,true);
                }
                
                return $output;  
        }
        
        private function get_featured_videos()
        {
                $output = '';
                $data = array();
                foreach($this->settings['featured_videos'] AS $id)
                {
                        $video_details = $this->jf->_getAssetDetails($id);
                        $data = json_decode($video_details);
                        $data->assetDetails[0]->length = round(jf_length_in_minutes($data->assetDetails[0]->length)) . ' mins';
                        $data = (array) $data->assetDetails[0];
                        $data['refId'] = $id;
                        $data = array('data' => $data);
                        $output .= $this->load->view('theme/jf1/homepage/featured_video_item',$data,true);
                }
                
                return $output;
        }
        
        private function get_featured_videos_selected()
        {    
                $output = '';
                $data = array();
                foreach($this->settings['carousel_videos'] AS $id)
                {
                        $video_details = $this->jf->_getAssetDetails($id);
                        $data = json_decode($video_details);
                        $data->assetDetails[0]->length = round(jf_length_in_minutes($data->assetDetails[0]->length)) . ' mins';
                        //printr($data->assetDetails[0]);
                        $data = (array) $data->assetDetails[0];
                        $data['refId'] = $id;
                        $data['url'] = $this->jf->generate_uri($data);
                        $data = array('data' => $data);
                        $output .= $this->load->view('theme/jf1/homepage/featured_video_selected_item',$data,true);
                }
                
                return $output;
        }
        
        public function a_get_video()
        {
                $data = array();
                if ($refid = $this->input->post('refid'))
                {
                        $video_details = $this->jf->_getAssetDetails(array('refid'=>$refid,'request_player'=>'web'));
                        $data = json_decode($video_details);
                        
                        $data->assetDetails[0]->length = round(jf_length_in_minutes($data->assetDetails[0]->length)) . ' mins';
                        $data = json_encode($data);
                }
                else
                        $data = json_encode($data);
                
                $this->output->set_content_type('application/json')->set_output($data);
        }

        
        function __construct()
        {
            parent::__construct();
            
            $this->config->load('page_home');
            $this->settings = $this->config->item('settings');           
        }
}