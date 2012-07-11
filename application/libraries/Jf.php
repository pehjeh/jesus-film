<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jf
{
	var $CI;
	var $token = '';
	var $host = '';
	var $response_type = '';
	var $cache = null;
	var $default_params = array(
		'responseType' => 'json',
		'token' => '',
	);
	
	function _getLanguages($arr = array())
	{
		$def_arr = array(
			'responseType' => $this->response_type,
			'sortBy' => '',
			'sortOrder' => '',
		);
		
		$arr = array_merge($def_arr,$arr);
		
		$path = $this->generate_url('getLanguages',$arr);
		
		$result = $this->CI->curl->simple_get($path);
		return $result;	
		
		$qs = array();
		foreach($arr AS $key=>$value)
		{
			$qs[] = $key .'='.$value;
		}
		
		return join('&',$qs);
	}
	
	function _getLanguagesByTitle($refid)
	{
		$arr = array(
			'refId' => $refid,
			'sortBy' => 'name',
		);
		$path = $this->generate_url('getLanguagesByTitle',$arr);
		
		$result = $this->CI->curl->simple_get($path);
		return $result;
	}
	
	function _getAssetDetails($refid)
	{
		$request_player = '';
		if (is_array($refid))
		{
			$request_player = $refid['request_player'];
			$refid = $refid['refid'];
		}
		
		$arr = array(
			'refId' => $refid,
			'requestPlayer' => $request_player,
			'getDownloadUrl' => 'true',
		);
				
		$path = $this->generate_url('getAssetDetails',$arr);
		
		$result = $this->CI->curl->simple_get($path);
		return $result;		
	}
	
	function _getTitles($arr = array())
	{
		$def_arr = array(
			'languageId' => 'ALL',
			'categoryName' => '',
			'requestPlayer' => '',
			'sortBy' => '',
			'sortOrder' => '',
		);
		
		$arr = array_merge($def_arr,$arr);

		$path = $this->generate_url('getTitles',$arr);
		
		$result = $this->CI->curl->simple_get($path);

		return $result;
	}
	
	function _search($search_term)
	{
		$def_arr = array(
			'searchTerm' => $search_term,
			'sortBy'=>'',
			'sortOrder'=>'',
			'languageId'=>'ALL',
			'searchKeywords'=>'',
		);
		
		//$arr = array_merge($def_arr,$arr);

		$path = $this->generate_url('searchTitles',$def_arr);
		
		$result = $this->CI->curl->simple_get($path);

		return $result;
	}
	
	function generate_uri($obj,$identifier = null)
	{
		if (is_object($obj)) $obj = (array) $obj;
		
		if (is_null($identifier))
			$uid = $obj['refId'];
		else
			$uid = $obj['name'];
		
		return base_url().'film/'.$uid;
		//return base_url().'film/'.url_title(strtolower($obj['languageName'])).'/'.$uid;		
	}
	
	private function generate_url($action = null,$qs)
	{
		$arr = array();
		
		unset($this->default_params['host']);
		
		$qs = array_merge($this->default_params,$qs);
		
		foreach($qs AS $key=>$value)
		{
			$arr[] = $key .'='.$value;
		}
		
		$arr = join('&',$arr);
		
		$path = $this->host . $action .'?' . $this->token . '&' . $arr;
		
		return $path;
	}
	
	function call($action,$method = 'GET',$args = array())
	{
		$def_arr = array(
			'responseType' => $this->response_type,
			'sortBy' => '',
			'sortOrder' => '',
			'languageId' => 'ALL',
		);
		
		$args = array_merge($def_arr,$args);

		$qs = $this->{'_'.$action}($args);
		
		$path = $this->host . $action . '?apiKey=' . $this->token . '&' . $qs;
		
		return $path;
		
		if (strtoupper($method) == 'GET')
			$result = $this->CI->curl->simple_get($path);
		else
		{
			$result = $this->CI->curl->simple_post($path,$args);
		}
		return $result;
	}
	
	function init()
	{
		if (is_null($this->cache))
			$this->cache = $this->_getTitles();
	}
	
	function __construct()
	{
		$this->CI =& get_instance();
		
		$this->CI->config->load('jesusfilmapi');
		$config = $this->CI->config->item('jesusfilm');
	
		$this->token = $config['token'];
		$this->host = $config['host'];
		$this->response_type = $config['response_type'];
		
		$this->default_params = array_merge($this->default_params,$config);
		
		//printr($this->_getTitles());
	}

}