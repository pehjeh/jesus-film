<?php

class Popsearch
{
    var $_config;
    var $stopwords = array("a", "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", "amongst", "amoungst", "amount",  "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as",  "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the");
    var $special_chars_reg_exp = '/[,\.\/\!\@\#\$\%\^\&\*\(\)\_\+\=\:\;\[\]\{\}\"\<\>\?]/';
    
    public function store_kw($kw)
    {
        /*
         $kw = _string_breakdown($kw);
        
        foreach($kw AS $k => $v)
        {*/
            $update_result = $this->_update_keyword($kw);
            if ($update_result == 0)
            {
                $this->_store_keyword($kw);   
            }
        //}
    }
    
    public function get_popular_searches($args=array())
    {
        $this->db->select(array('keyword','score'));
        $this->db->from($this->_config['table']);
        $this->db->order_by('score','desc');
        //$this->db->order_by('date_last_searched','desc');
               
        $limit = isset($args['limit'])? isset($args['limit']) : 12;
        $this->db->limit($limit);
        
        $results = $this->db->get()->result();
        
        /*
         * Get the greatest
         */
        $max = 0;
        $min = 0;
        $data = array('terms' => array());
        foreach($results AS $result)
        {
            $data['terms'][] = $result;
            
            if ($result->score > $max)
                $max = $result->score;
            
            if ($min == 0)
                $min = $result->score;
            else if($result->score < $min)
                $min = $result->score;

        }
        $data['result_count'] = count($data['terms']);
        $data['max_score'] = $max;
        $data['min_score'] = $min;
        
        //printr($data );exit;
        return $data;
    }
    
    /*
    * score_formula
    *
    * Calculates the score in percentage based on the min and max range
    *
    * @param	int	min range
    * @param	int	max range
    * @param	int	score
    * @return	float   in percentage
    */
    public function score_formula($min,$max,$score)
    {
        return (($score - $min) / ($max - $min) * 100);
    }
    
    private function _update_keyword($kw)
    {
        $this->db->set('score','score+1', false);
        $this->db->set('date_last_searched',now());
        $this->db->where('keyword',$kw);
        $this->db->update($this->_config['table']);
        
        return $this->db->affected_rows();
    }
    
    private function _string_breakdown($kw)
    {
        $kw = explode(' ',trim($kw));
        foreach($kw AS $k=>$v)
        {
            if (strlen($v) == 0)
            {
                unset($kw[$k]);
                break;
            }
            
            if (preg_match($this->special_chars_reg_exp ,$v))
            {
                unset($kw[$k]);
                break;
            }
            
            if (in_array($v,$this->stopwords))
            {
                unset($kw[$k]);
                break;
            }
        }
        return $kw;
    }
    
    private function _store_keyword($kw)
    {
        $data = array(
            'keyword' => $kw,
            'date_last_searched' => now(),
        );
        
        $this->db->insert($this->_config['table'],$data);
    }
    
    private function _increment_count()
    {
        
    }
    
    function __construct()
    {
        attach_obj($this);
        $this->config->load('config');
        $this->_config = $this->config->item('popular_searches');
    }
}