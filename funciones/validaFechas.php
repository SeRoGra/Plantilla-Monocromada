<?php
	function is_Date($str){ 
        if (is_numeric($str) ||  preg_match('^[0-9]^', $str)){  
            $stamp = strtotime($str);
            $month = date( 'm', $stamp ); 
            $day   = date( 'd', $stamp ); 
            $year  = date( 'Y', $stamp ); 
            return checkdate($month, $day, $year); 
        } 
        return false; 
	}

?>