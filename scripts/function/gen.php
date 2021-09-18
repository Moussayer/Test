<?php

    function convert_youtube($link, $height, $width, $class="") {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe class=\"$class\" width=\"$width\" height=\"$height\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
            $link
        );
    }

    function resize_images($file,$type, $w, $h){			
		list($wo,$ho)=getimagesize($file);
		if($type=="image/gif"){
			$img=imagecreatefromgif($file);
		}else if($type=="image/jpeg"){
			$img=imagecreatefromjpeg($file);
		}else if($type=="image/png"){
			$img=imagecreatefrompng($file);
		}
		$chen = imagecreatetruecolor($w,$h);
		imagecopyresampled($chen,$img,0,0,0,0,$w,$h,$wo,$ho);
		imagejpeg($chen,$file,100);		
	}
	
    

    function date_diff_format($interval, $hour = 12){
		if(!$intv = $interval->format('%y')){											
			if(!$intv = $interval->format('%m')){     
			    $intv = $interval->format('%d');
                $inth = $interval->format('%h');
                //$hour = date();
				if($intv == 0){                   
                    if($inth > 12 && $hour >= 12){
                        return "Yesterday";
                    }
                    return "Today";					
				}else if($intv == 1){
                    if($inth > 12 && $hour >= 12){
                        return "2 Days Ago";
                    }
					return "Yesterday";
				}else if($intv >= 1 && $intv <= 5){
                    if($inth > 12 && $hour >= 12){
                        return $intv+1 . " Days Ago.";	
                    }
					return $intv . " Days Ago.";	
				}else if($intv >= 6 ){
                    if($intv == 6 && $inth > 12 && $hour >= 12){
                        return  "1 Week Ago";
                    }else if($intv == 6){
                        return  "6 Days Ago";
                    }
					return (int)($intv / 7) . " Week Ago";
				}
			}else{
				return $intv . " Month Ago";
			}
		}else{
		   return $intv . " Years Ago";
        }
	}
    
    function s_datediff( $str_interval, $dt_menor, $dt_maior, $relative=false){

       if( is_string( $dt_menor)) $dt_menor = date_create( $dt_menor);
       if( is_string( $dt_maior)) $dt_maior = date_create( $dt_maior);

       $diff = date_diff( $dt_menor, $dt_maior, ! $relative);
      
       switch( $str_interval){
           case "y":
               $total = $diff->y + $diff->m / 12 + $diff->d / 365.25; break;
           case "m":
               $total= $diff->y * 12 + $diff->m + $diff->d/30 + $diff->h / 24;
               break;
           case "d":
               $total = $diff->y * 365.25 + $diff->m * 30 + $diff->d + $diff->h/24 + $diff->i / 60;
               break;
           case "h":
               $total = ($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h + $diff->i/60;
               break;
           case "i":
               $total = (($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i + $diff->s/60;
               break;
           case "s":
               $total = ((($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i)*60 + $diff->s;
               break;
          }
       if($diff->invert)
            return -1 * $total;
       else    
           return $total;
   }
   
   
	
	 function object_to_array($data)
{
    if (is_array($data) || is_object($data))
    {
        $result = array();
        foreach ($data as $key => $value)
        {
            $result[$key] = object_to_array($value);
        }
        return $result;
    }
    return $data;
}
	
	function decode_constant($str){
		$data = array();
		$counter = 0;
        $str_old = $str;	
		for($i=0;$i<=strlen($str);$i++){
			if(substr($str, $i, 1) == '{'){
				$data[$counter]['start'] = $i; 
			}
			if(substr($str, $i, 1) == '}'){
				$data[$counter]['end'] = $i; 
				$counter++;
			}
		}
		$diff=0;		
		foreach($data as $k => $v){
			$constant = substr($str, $v['start']+1 + $diff, ($v['end'] + $diff) - ($v['start'] + $diff) -1);
			$constant = $GLOBALS[$constant];				
			$str = substr_replace($str, $constant,  $v['start'] + $diff, ($v['end'] + $diff) - ($v['start'] + $diff - 1));
			$diff = strlen($str) - strlen($str_old);            	
		}		
		return $str;
	}

	
	function sanitize_html($data){		
		return htmlentities($data);
	}
	
	function update_data($table, $field, $id, $col, $value){
		global $con;
		$query = "update `$table` set `$col` = '$value' where `$field`='$id'";
		if(mysqli_query($con, $query))
			return true;
		else
			return false;
	}
	
	
	
	function sanitize_sql($data){
		global $con;
		return mysqli_real_escape_string($con, $data);
	}
	
	function sanitize($data){
		global $con;
		return (mysqli_real_escape_string($con, $data));
	}
	
	function genarate_session(){
		return bin2hex(openssl_random_pseudo_bytes(32));
	}
	
	function get_data_from_id($table, $field, $value, $col){     
		global $con;
		$query = "select `$col` from `$table` where `$field`='$value'";
		if($res=mysqli_query($con, $query)){
			$data = mysqli_fetch_assoc($res);
			return $data[$col];
		}else{
			return false;
		}
	}
	
	function deactive_data_from_id($table, $field, $id, $col){
		global $con;
		$query = "update `$table` set `$col`='-1' where `$field` = '$id'";
		if(mysqli_query($con, $query)){			
			return true;
		}else{
			return false;
		}
	}
	
	function active_data_from_id($table, $field, $id, $col){
		global $con;
		$query = "update `$table` set `$col`='1' where `$field` = '$id'";
		if(mysqli_query($con, $query)){			
			return true;
		}else{
			return false;
		}
	}
	
	function update_table_data($table, $field, $value, $data){
	   global $con;
	   $fields = "";
	   $flag=false;	   
	 
	   foreach($data as $k => $v){		   
		   if($flag)
			   $fields = $fields . ", `$k` = '$v' ";
		   else
				$fields = $fields . "`$k` = '$v' ";
			$flag=true;
	   }
	   $query = "update `$table` set $fields where `$field` = '$value'";
	   if(mysqli_query($con, $query))
		   return true;
	   else		  
		  return false;
   }
			 
    function add_table_data($table, $data){
	   global $con;
	   $fields = array_keys($data);
	   $fields_str = "";
	   $values = array_values($data);
	   $values_str = "";
	   $flag = false;
	   foreach($fields as $field){
		    if(!$flag){
			   $flag = true;
			   $fields_str .=  "`" .  $field . "`";
		   }else{
			    $fields_str .=  ", `" . $field . "`";
		   }
	   }
	   $flag = false;
	   foreach($values as $value){
		   if(!$flag){
			   $flag = true;
			   $values_str .=  "'" .  $value . "'";
		   }else{
			    $values_str .=  ", '" . $value . "'";
		   }
		  
	   }
	   $query = "insert into `$table`($fields_str) values ($values_str)";
	   if(mysqli_query($con, $query)){
		   return mysqli_insert_id($con);
	   }else{
           //echo mysqli_error($con); 
           //die();		   
		   return false;
	   }
   }
   
   function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

    function get_table_data($table, $col = '*', $q = '', $group = '', $order = ''){
        global $con;
        $data = array();
        $query = "select $col from $table $q $group $order";    
        if($res=mysqli_query($con, $query)){
            while($row=mysqli_fetch_assoc($res)){
                $data[] = $row;
            }
        }
        return $data;
    }
    
    function get_table_data_array($table, $col = '*', $q = '', $group = '', $order = ''){
        global $con;
        $data = array();
        $query = "select $col from $table $q $group $order";    
        if($res=mysqli_query($con, $query)){
            while($row=mysqli_fetch_array($res,  MYSQL_NUM)){
                $data[] = $row;
            }
        }
        return $data;
    }
    
    function fetch_data_row($table, $field, $value, $col = '*'){
        global $con;
        $data = array();
        $query = "select $col from $table where `$field` = '$value'";    
        if($res=mysqli_query($con, $query)){
           $data=mysqli_fetch_assoc($res);      
        }
        return $data;
    }
    
    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
    
    function is_unique($table, $field, $value){
        $data = get_data_from_id($table, $field, $value, $field);
        if($data != ""){
            return false;
        }
        return true;
    }
	
	function clean($string) {
	   $string = str_replace(' ', '-', $string); 
	   return strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $string)); 
	}
    
    function clean_url($string) {
	   $string = str_replace(' ', '-', $string); 
	   return strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $string)); 
	}
    
    function get_table_column($table){
        global $con;
        $query = "SHOW COLUMNS FROM $table";
		$result = mysqli_query($con, $query);
        $table_col	= array();	
        while($row = mysqli_fetch_assoc($result)){			
			$table_col[] = $row['Field'];
		}
        return $table_col;
    }
    
    function delete_by_id($table, $field, $value){
        global $con;
        $query = "delete from `$table` where `$field` = '$value'";
        if(mysqli_query($con, $query))
            return true;
        else
            return false;       
        
    }
	

	
	
	
?>