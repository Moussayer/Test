<?php        

	function valid_session($user, $ip){
		global $con;
		global $tbl_admin;
		$table = $tbl_admin;
		$query = "select `admin_id` from $table where `admin_id` = '$user'";
		if($res=mysqli_query($con, $query)){
			if(mysqli_num_rows($res)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function update_session($user, $session=''){
		global $con;
		global $tbl_admin;
		$table = $tbl_admin;
		$query = "update $table set `last_session` = '$session' where `admin_id` = '$user'";
		if(mysqli_query($con, $query)){
			return true;
		}else{
			return false;
		}
	}
	
	function update_password($user, $password){
		global $con;		
		$table = 'site_admin';
		$query = "update $table set `admin_pass` = '$password' where `admin_id` = '$user'";
		if(mysqli_query($con, $query)){
			return true;
		}else{
			return false;
		}
	}
	
	function admin_login($user, $pass){
		global $con;		
		$table = 'site_admin';
		$options = array('cost' => 12);
		$query = "select * from $table where `admin_email` = '$user' and admin_status = '1'";
		if($res=mysqli_query($con, $query)){
			$data = mysqli_fetch_assoc($res);
			$hash = $data['admin_pass'];
			$user_id = $data['admin_id'];
			if(password_needs_rehash($hash, PASSWORD_DEFAULT, $options) && md5($pass) === $hash){
				$hash = password_hash($pass, PASSWORD_DEFAULT, $options);                				
				update_password($user_id, $hash);				
				return $user_id;
			}else{
				if(password_verify($pass, $hash)){					
					return $user_id;
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
	}
	function login_user($user, $pass){
		global $con;		
		$table = 'users';
		//$options = array('cost' => 12);
		$query = "select * from $table where `user_email` = '$user' and `user_pass` = '$pass'";
		if($res=mysqli_query($con, $query)){
			$data = mysqli_fetch_assoc($res);
			//$hash = $data['user_pass'];
			$user_id = $data['user_id'];
			/* if(password_verify($pass, $hash)){					
					
				}else{
					return false;
				} */
			return $user_id;
		}else{
			return false;
		}
	}
    
   
    
    function get_all_active_chat_user($admin){
        
       $data = get_table_data('site_admin',  '*', "where admin_status = 1 and `admin_id` <> '$admin'"); 
        foreach($data as $key => $val){
            $time = $val['user_online_time'];
            $now = date("Y-m-d H:i:s");           
            if(user_online($time, $now)){
                $data[$key]['user_online'] = 1;
            }else{
                $data[$key]['user_online'] = 0;
            }
        }
        return $data;       
    }
    
    function user_online($time, $now){
        $diff =  s_datediff( 'i', $time, $now, $relative=false);
            settype($diff, 'integer');            
            if(!$diff)
                return true;
            else
                return false;         
    }
    
    function get_all_active_online_chat_user($admin){  
        $return_data = array();    
        $data =  get_table_data('site_admin',  '*', "where admin_status = 1 and `admin_id` <> '$admin'");
        foreach($data as $key => $val){
            $time = $val['user_online_time'];
            $now = date("Y-m-d H:i:s");           
            if(user_online($time, $now)){
                $return_data[] = $val;
            }
        }
        return $return_data;
    }
    
    function get_all_active_offline_chat_user($admin){
        $return_data = array();             
        $data =  get_table_data('site_admin',  '*', "where admin_status = 1 and `admin_id` <> '$admin'");
         foreach($data as $key => $val){
            $time = $val['user_online_time'];
            $now = date("Y-m-d H:i:s");           
            if(!user_online($time, $now)){
                $return_data[] = $val;
            }
        }
        return $return_data;
    }
    
    function get_admin($status){ 
        global $SITE;   
        $data = array();         
        $data = get_table_data_array('`site_admin`', ' * ', "where `admin_status` = $status");  
     
        foreach($data as $key=>$value){  
            $de = '<i data-toggle="" class="fa text-primary h5 m-none fa-plus-square-o" style="cursor: pointer;font-size:2.2em;"></i>';
            $id =  $value[0];  
            $name =  $value[1] . ' ' . $value[2];
                   
            $img =  $value[8];          
            $typ =  $value[10]; 
            $date =  $value[11];   
            $date = date("d/m/Y h:i:s A",strtotime($date));            
            
            $email = $value[3];     
            $phone = $value[5];   
            $desc =  $value[7]; 
            $dept =  $value[6]; 
            
            if($img != ''){
                $img_url = $SITE . 'uploads/profile/' . $img;
                $img = "<a class='image-popup-no-margins' href='$img_url' alt='image for $name'><img src='$img_url' width='120px' height='160px'></img></a>"; 
            }
            $type = 'deactive';
            $icon = 'fa fa-trash-o';
            if(!$status){
                $type = 'active';
                $icon = 'fa fa-file-o';
            }
            $action =  "<center><a style='margin-right:5px;' href='update-topic-info.php?id=$id' data-item='$id' class='on-default'><i class='fa fa-pencil' style='font-size:2.2em;color:#47a447;'></i></a>  
                                 <a style='margin-right:5px;' href='#' class='on-default'><i class='fa fa-unlock-alt' style='font-size:2.2em;color:#5bc0de;'></i></a>            
                               <a style='margin-right:5px;' href='user-login-stat.php?user=$id' target='_blank' class='on-default'><i class='fa fa-bar-chart' style='font-size:2.2em;color:#0088CC;'></i></a>
                               <a style='margin-right:5px;' href='#' class='on-default'><i class='fa fa-briefcase' style='font-size:2.2em;color:#e89113;'></i></a>
                              <a style='margin-right:5px;' href='javascript:$type($id)'  class='on-default'><i class='$icon' style='font-size:2.2em;color:#d2322d;'></i></a></center>";
                              
            unset($data[$key]);
            $data[$key][0] = $de;
            $data[$key][1] = $id;
            $data[$key][2] = $name;
            $data[$key][3] = $typ;
            $data[$key][4] = $img;           
            $data[$key][5] = $date;
            $data[$key][6] = $action;
            $data[$key][7] = $email;
            $data[$key][8] = $phone;
            $data[$key][9] = $desc;   
            $data[$key][10] = $dept;             
        }     
        return $data;   
   }
   
   function get_active_admin(){
       return get_table_data('`site_admin`', '*', "where `admin_status` = 1");
   }
   
    function get_active_administrator(){
       return get_table_data('`site_admin`', '*', "where `admin_status` = 1 and admin_type='administrator' ");
   }
   
   
   function get_inactive_admin(){
       return get_table_data('`site_admin`', '*', "where `admin_status` = 0");
   }
	
	
?>