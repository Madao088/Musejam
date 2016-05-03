foreach($user['posts'] as $item)                                                                                      //for each post on user's timline
{
	 foreach($item['comments'] as $temp)                                                                          //for each comment on post
	 {
		  //$ctr=0;
		
		 //$ctr1=0;
		 
		    $time=$temp['created_time'] 								//get the year of the comment 
		    
	         	$tim=substr($time,0,4);									//created_time is in this format "2015-12-23T17:15:44+0000"=> get first four letters 		
			 //echo $tim."<br>";
		     
			 
			 
		       $from=$temp['from'];									//get the user who commented
		 
			$str="";
                        $name=var_export($from, true);								
			//var_dump($name);
			$temp1=preg_split( '/(\w+)/', $name, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);	/* this probably gave me the user.I don't remember why I did this  															  	but there was some problem back then in extracting the name in required format.*/
			for($i=1;$i<count($temp1);$i=$i+2)
			{
				$str=$str." ".$temp1[$i];
			}
			//$ctr=$ctr+1;
			$str=trim($str);
			
			
				
			if(array_key_exists($str,$array)==False)						/*if this user has never commented before create new entry with user name as key and 
			{											  value based on the year*/
			
				if(strcmp($tim,'2015')==0)
				{$array[$str]=3;}
				else if(strcmp($tim,'2014')==0)
				{$array[$str]=2.4;}
				else if(strcmp($tim,'2013')==0)
				{$array[$str]=1.8;}
				else if(strcmp($tim,'2012')==0)
				{$array[$str]=1.2;}
				else 
				{$array[$str]=1;}
				}
				else
				{
				if(strcmp($tim,'2015')==0)							/* if user already exists just add the value
				{$array[$str]=$array[$str]+3;}
				else if(strcmp($tim,'2014')==0)
				{$array[$str]=$array[$str]+2.4;}
				else if(strcmp($tim,'2013')==0)
				{$array[$str]=$array[$str]+1.8;}
				else if(strcmp($tim,'2012')==0)
				{$array[$str]=$array[$str]+1.2;}
				else 
				{$array[$str]=$array[$str]+1;}
				}
	}
			
		 
	 
}

