<?php

function popsearch_store($kw)
{
    $CI = null;
    popsearch_init($CI);
    
    if (is_object($CI))
    {
        $CI->load->library('popsearch');
        $CI->popsearch->store_kw($kw);
    }
}


function popsearch_get_popular_searches($args = array())
{
    $CI = null;
    popsearch_init($CI);
    
    if (true)//count($args)>0)
    {
       $results = $CI->popsearch->get_popular_searches();
       $output = array();
       
       // FORMULA
      
       foreach($results['terms'] AS $result)
       {
        
            $score_perc  = $CI->popsearch->score_formula($results['min_score'],$results['max_score'],$result->score);
            
            if (is_between('0','19',$score_perc))
                 $score = 'A';
            if (is_between('20','39',$score_perc))
                 $score = 'B';
            if (is_between('40','59',$score_perc))
                 $score = 'C';
            if (is_between('60','79',$score_perc))
                 $score = 'D';
            if (is_between('80','100',$score_perc))
                 $score = 'E';
            
            $data = array(
                'term' => $result->keyword,
                'score' => $score,
                'url' => (isset($args['url']))? $args['url'].$result->keyword : '',
            );
            
            $output[] = $CI->load->view('search-term',$data,true);
       }
       //exit;
       return join(', ',$output);
    }
}

function popsearch_init(&$CI)
{
    $CI = get_instance();
    $CI->load->library('popsearch');
}