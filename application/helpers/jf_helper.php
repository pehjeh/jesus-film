<?php

/**
 * Retrieves videos of specified IDs
 *
 * First can accept either an array of IDs or and ID of string type
 * {elapsed_time} pseudo-variable. This permits the full system
 * execution time to be shown in a template. The output class will
 * swap the real value for this variable.
 *
 * @access	public
 * @param	string accepts an array if ids
 * @return	array of videos
 */

function jf_get_videos($ids = array())
{
    $result = array();
    $CI =& get_instance();
 
    $CI->jf->init();
    
    if (is_array($ids))
    {
        if (count($ids) > 0)
        {
            foreach($ids AS $id)
            {
                $result[] = $CI->jf->_getTitles();
            }
        }
        else
        {
            $result[] = $CI->jf->_getTitles($ids);
        }
    }

    return $result;
}

function jf_length_in_minutes($mils)
{

    $minutes = (($mils / 1000) / 60);
    return $minutes;
}