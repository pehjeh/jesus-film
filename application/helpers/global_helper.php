<?php


function printr($arr, $display = false)
{
	if (!$display)
	{
		echo '<pre>'; print_r($arr); echo '</pre>';
	}
	else
		return '<pre>'; print_r($arr,true).'</pre>';
}

function attach_obj(&$obj)
{
	if($CI =& get_instance())
	{
		foreach($CI AS $k=>$v)
			$obj->{$k} = $v;		
	}
}

/*
 * is_between
 *
 * Determins if a given value is within range of another two specified values
 *
 * @param	string/int	start of range
 * @param	string/int	end of range
 * @param	int		value to check
 * @return	bool
 */
function is_between($start,$end,$value)
{
	$the_start = false;
	$the_end = false;
	
	if (is_string($start))
	{
		$start = (int)preg_replace('/\D/', '', $start);
		$the_start = ($start<=$value);
	}
	else
		$the_start = ($start<$value);
	
	if (is_string($end))
	{
		$end = (int)preg_replace('/\D/', '', $end);
		$the_end = ($end>=$value);
	}
	else
		$the_end = ($end>$value);
		
	return ($the_start && $the_end);
}