<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Film extends CI_Controller
{
    function view($refid = null)
    {
        if (!is_null($refid))
        {
            $details = json_decode($this->jf->_getAssetDetails(array('refid'=>$refid,'request_player'=>'web')));
            if (!empty($details->assetDetails))
            {
                $details->assetDetails[0]->length = round(jf_length_in_minutes($details->assetDetails[0]->length)) . ' mins';
                
                $details->assetDetails[0]->playerCode = preg_replace('/(\<\!\[CDATA\[|\]\]\>)/','',$details->assetDetails[0]->playerCode);
                $details = (array) $details->assetDetails[0];
                
                /*
                $languages = json_decode($this->jf->_getLanguagesByTitle($refid));
                $languages = $languages->languages;
                $details['select_languages'] = $this->build_languages_select($languages);
                */
                
                $fclips = $this->featured_clips();
                $featured_clips = '';
                
                foreach($fclips AS $clip)
                {
                    //printr($clip);
                    $featured_clips .= $this->theme->render_section('film/section_featured_clip',array('clip' => (array) $clip->title));
                }
                
                $details['featured_clips'] = $featured_clips;
                             
                $data = array(
                    '_head_title' => $details['name'],
                    '_page_content_template' => 'film/view',
                    'data' => $details,
                );
                
                $this->theme->add_css('/css/film.css','link');
                //$this->theme->add_css('/js/dropkick/blank_theme.css','link');
                $this->theme->add_js('/js/dropkick/jquery.dropkick-1.0.0.js','link');
                $this->theme->add_js('/js/film.js','link');
                $this->theme->render($data);
            }
            else
            {
                echo 'none';
            }
            
        }
    }
    
    
    
    private function featured_clips($count = 2)
    {
        $params = array(
            'categoryName'=>'featureFilm'
        );
        
        $titles = json_decode($this->jf->_getTitles($params));
        $data = array();
        //printr($titles);
        if (isset($titles->titles))
        {
            $titles = $titles->titles; 
            
            for($a = 1; $a <= $count; $a++)
            {
                $data[] = $titles[$a-1];
            }
        }
        return $data;
    }
    
    private function build_languages_select($languages = array())
    {
        $li = '';
        foreach($languages AS $k => $v)
        {
            $li .= '<option value="'.$v->language->languageId.'">'.$v->language->name.'</option>';
        }
        
        return  '<select>'.$li.'</select>';
        
    }
    
    function index()
    {
        echo uri_string();
        
        $data = array();
    }
    
    function __construct()
    {
        parent::__construct();
         
    }
}