<?php
class Validation
{
/*
Usage: 
alphanum, alpha, alphanospace, num, dec, email, url

$val = new Validation();
$val->addRule($value,'num','Field 1', true, false, false );
*/
	var $error = array();
	
	//field name, type, req, min, max, error msg//
	function addRule($field, $type, $label, $req=false, $min=false, $max=false)
	{
		if($req==true and trim($field) =='' and $type!='file')
		{
			$this->error[] = $label.' cannot be left blank.';
			return false;
		}		
		
		if($min)
		{
			if(strlen($field)<$min)
			{
				$this->error[] = "Minimum $min characters required in $label";
				return false;
			}
		}
		
		if($max)
		{
			if(strlen($field)>$max)
			{
				$this->error[] = "Maximum $max characters allowed in $label";
				return false;
			}
		}
		
		
		if($type=='alphanum')
		{
			$result = preg_match ("/^[A-Za-z0-9\ .,-_]+$/", $field);
			if (!$result)
			{
				$this->error[] = "Please enter valid characters in $label";
				return false;
			}		
		}
		elseif($type=='alpha')
		{
			$result = preg_match ("/^[A-Za-z\ ]+$/", $field);
			if (!$result)
			{
				$this->error[] = "Please enter alphabets only in $label";
				return false;
			}		
		}
		elseif($type=='alphanospace')
		{
			$result = preg_match ("^[A-Za-z\]+$", $field);
			if (!$result)
			{
				$this->error[] = "Please enter alphabets without space in $label";
				return false;
			}	
		}
		elseif($type=='alphanumnospace')
		{
			$result = preg_match ("/^[A-Za-z0-9\]+$/", $field);
			if (!$result)
			{
				$this->error[] = "Space & Special Characters are not allowed in $label";
				return false;
			}		
		}
		elseif($type=='messagechar')
		{
			$result = preg_match ("/^[A-Za-z0-9\ .,-_]+$/", $field);
			if (!$result)
			{
				$this->error[] = "Special Characters are not allowed in $label";
				return false;
			}		
		}	
		//elseif($type=='facebook')
//		{
//			$result = explode(":", $field);
//			if (!$result)
//			{
//				$this->error[] = "Space not allowed in $label";
//				return false;
//			}		
//		}
		elseif($type=='num')
		{
			$result = preg_match ("/^[0-9\ ]+$/", $field);
			if (!$result)
			{
				$this->error[] = "Please enter numbers only in $label";
				return false;
			}		
		}
		elseif($type=='decimal')
		{
			$result = preg_match ("/^[0-9\.]+$/", $field);
			//$pos=substr($field, 0, 1);
			//if (!$result || $pos==0)
			if (!$result)
			{
				//$this->error[] = "$label must be Numbers or Decimals or First Digit should not be zero";
				$this->error[] = "$label must be Numbers or Decimals";
				return false;
			}		
		}
		elseif($type=='seconddec')
		{
			$result = preg_match ("/^[0-9\.]+$/", $field);
			$pos=substr($field, 0, 1);
			if (!$result || $pos==0)
			{
				$this->error[] = "$label must be Numbers or Decimals or First Digit should not be zero";
				//$this->error[] = "$label must be Numbers or Decimals";
				return false;
			}		
		}
		elseif($type=='percent')
		{
			$result = preg_match ("/^[0-9\.]+$/", $field);
			$pos=substr($field, 0, 1);
			$pos2=substr($field, 0,2);
			$pos3=substr($field, 2,1);
			if((!$result || ($pos==0 && $field.length==0 && $pos2==0 && $pos3==0)))
			{
				$this->error[] = "$label must be Numbers or Decimals or should not be zero";
				return false;
			}	
			elseif($field>100)
			{
				$this->error[] = "$label can't be greater than 100";
				return false;
			}
		}
		elseif($type=='pass')
		{
			$uppercase = preg_match('@[A-Z]@', $field);
			$lowercase = preg_match('@[a-z]@', $field);
			$number    = preg_match('@[0-9]@', $field);

			if(!$uppercase || !$lowercase || !$number  || strlen($field) < 8)
			{
				$this->error[]= "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
				return false;
			}
		}
  	    elseif($type=='stock')
		{
			$result = preg_match("/^[0-9]+$/", $field);
			$pos=substr($field, 0, 1);
			if (!$result || $pos==0)
			{
				$this->error[] = "Invalid $label value";
				return false;
			}		
		}
		elseif($type=='price')
		{
			$result = preg_match ("/^[0-9\.]+$/", $field);
			$pos=substr($field, 0, 1);
			$count=split('.',$field);
			if ((!$result || $pos==0) && count($count)>1)
			{
				$this->error[] = "Invalid $label value";
				return false;
			}		
		}
		elseif($type=='dec')
		{
			$result = preg_match ("/^[0-9\.]+$/", $field);
			if (!$result)
			{
				$this->error[] = "Please enter numbers only in $label";
				return false;
			}		
		}
		elseif($type=='email')
		{	
			$result = preg_match("^[^@ ]+@[^@ ]+\.[^@ \.]+$", $field);
			if (!$result)
			{
				$this->error[] = "Please enter valid email address";
				return false;
			}
		}
                elseif($type=='mail')
                {
                    if( !preg_match("#^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$#i", $field) ) 
                    {
                        $this->error[] = "Please enter valid email address";
			return false;                        
                    }
                }
		elseif($type=='newemail')
		{	
			$result = preg_match("^[^@ ]+@[^@ ]+\.[^@ \.]+$", $field);
			if (!$result)
			{
				$this->error[] = "Please enter valid email address";
				return false;
			}
		}
		
		elseif($type=='drop')
		{			
			if($field=="0")
			{
				$this->error[] = "Please Select $label.";
				return false;
			}
			elseif($field=="")
			{
				$this->error[] = "Please Select $label.";
				return false;
			}
		}
		elseif($type=='file')
		{
			if (!$field)
			{
				$this->error[] = "$label is Required";
				return false;
			}		
		}
		elseif($type=='url')
		{
			
			$result = preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $field);
			if (!$result)
			{
				$this->error[] = "Please enter valid url in $label";
				return false;
			}
		}
		elseif($type=='day')
		{
			
			if($field<1 || $field>31)
			{
				$this->error[] = "Invalid Number in $label";
				return false;
			}
		}
		elseif($type=='month')
		{
			
			if($field<1 || $field>12)
			{
				$this->error[] = "Invalid Number in $label";
				return false;
			}
		}
		elseif($type=='contact')
		{	
		   //Pattrerns which we follow
		   // +91-9893111128
//			(+91)9893111128
//			1-(123)-123-1234
//			+1(123)-123-1234
//			123456789
//			(910)456-7890
			$result  = preg_match("/^\+?([0-9]( |-)?)?(\(?[0-9]{3}\)?|[0-9]{3})( |-)?([0-9]{3}( |-)?[0-9]{4}|[a-zA-Z0-9]{8})$/", $field );
			$result1 = preg_match("/^([\+][0-9]{2}\-)[0-9]{10}$/", $field );
			$result2 = preg_match("/^([\(][0][0-9]{2}[\)])[\-][0-9]{10}$/", $field );
			$result3 = preg_match("/^([\(][\+][0-9]{2}[\)])[0-9]{10}$/", $field );
			
			if (!$result && !$result1 && !$result2 && !$result3)
			{
				$this->error[] = "Please enter valid $label.";
				return false;
			}
		 }
		
	}
	function Showerrormsg($field,$msg)
	{
		if($field=="")
		{
			$this->error[] = $msg;
			return true;
		}
		else
		{
			return false;
		}
	}
	function oldPassword($field1,$field2)
	{
		if($field1!=$field2)	
		{
			$this->error[] = "Invalid Current Password";
			return false;
		}
	}
	function confirmPassword($field1,$field2)
	{
		if($field1!=$field2)	
		{
			$this->error[] = "Confirm Password doesn't match";
			return false;
		}
	}
        
	function confirmMsg($field1,$field2,$label)
	{
		if($field1!=$field2)	
		{
			$this->error[] = $label;
			return false;
		}
	}
	function UniqueMsg($field1,$field2,$label)
	{
		if($field1==$field2)	
		{
			$this->error[] = $label;
			return false;
		}
	}
	function confirmEmail($field1,$field2)
	{
		if($field1!=$field2)	
		{
			$this->error[] = "Email doesn't match";
			return false;
		}
	}
	function NotSame($field1,$field2,$msg)
	{
		if($field1==$field2)	
		{
			$this->error[] = "$msg";
			return false;
		}
	}
	function Captcha($field1,$field2)
	{
		if($field1!=$field2)	
		{
			$this->error[] = "Invalid security code";
			return false;
		}
	}
	function FileImage($field1,$label)
	{
		if($field1=="")
		{
			$this->error[] = "$label. ";
			return false;
		}
	}
	function Dropdown($field1,$label)
	{
		if($field1==0)
		{
			$this->error[] = "Please Select $label. ";
			return false;
		}
	}
	function Checkbox($field1,$label)
	{
		if($field1=='')
		{
			$this->error[] = 'Please Select $label';
			return false;
		}
	}
	function DropdownMultiple($field1,$label)
	{
		if(count($field1)==0)
		{
			$this->error[] = "Please Select $label. ";
			return false;
		}
	}
	function Equity($field1,$field2,$label)
	{
		if($field1=="" && $field2=="")
		{
			$this->error[] = "Please Select atleast one $label. ";
			return false;
		}
	}
	function Radio($field1,$label)
	{
		if($field1=="")
		{
			$this->error[] = "Please Select $label. ";
			return false;
		}
	}
	
	function CompareLess($field1,$field2,$label1,$label2)
	{
		if($field1<$field2)
		{
			$this->error[] = "$label1 should not be less than from $label2. ";
			return false;
		}
	}
	function CompareGreater($field1,$field2,$label1,$label2)
	{
		if($field1>$field2)
		{
			$this->error[] = "$label1 should not be greater than from $labe2. ";
			return false;
		}
	}
	function confirmcheckBox($field1)
	{
		if($field1=="")
		{
			$this->error[] = "Please check on terms and conditions. ";
			return false;
		}
	}
	function Alreadyexist($field,$msg)
	{
		if($field>0)
		{
			$this->error[] = $msg;
			return true;
		}
		else
		{
			return false;
		}
	}
	function Notexist($field,$msg)
	{
		if($field==0)
		{
			$this->error[] = $msg;
			return true;
		}
		else
		{
			return false;
		}
	}
	function NotInArray($array,$field,$msg)
	{
		if(!$array>0 && $field!="")
		{
			$this->error[] = $msg;
			return true;
		}
		else
		{
			return false;
		}
	}
	function abuseWord($field1,$aryAbuse,$label)
	{
		$aryDis=array();
		$exp=explode(" ",$field1);
		foreach($exp as $iExp)
		{
			$aryDis[]=$iExp;
		}
		if(is_array($aryAbuse) && is_array($aryDis))
		{
		$data=array_intersect($aryAbuse,$aryDis);
		if(count($data)>0)
		{
			$this->error[] = $label;
			return false;
		}
		}
	}
	function validate()
	{
		if(!count($this->error))
		{
			/*$stat = '';
			foreach($this->error as $k => $val)
			{
				$stat.=$val.'<br />';
			}*/
			return true;		
		}
		else
		{
			return false;
		}
	}
	
	function errors()
	{
		
		return $this->error[0];		
		
	}
	function checkDateFormat($date,$label)
	{
	//match the format of the date
	if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts))
	{
	//check weather the date is valid of not
	if(checkdate($parts[2],$parts[3],$parts[1]))
	return true;
	else
	$this->error[] = "Please Enter Valid Date in $label";
	return false;
	}
	else
	$this->error[] = "Please Enter Valid Date in $label";
	return false;
	}
	
	function verifycaptcha($code1,$code2)
	{
		if($code1!=$code2)
		{
			$this->error[] = "Please enter valid verification code";
			return false;
		}
		else
		{
		   return true;
		}
	}
        
        function dateValidation($testStartDate, $testEndDate, $msg) {
        global $db;        
        $days = strtotime($testEndDate) - strtotime($testStartDate);
        $new = floor($days / (60 * 60 * 24));
        if ($new < 0) {
            //not_valid
            $this->error[] = $msg;
            return false;            
        }        
        }
        
        function birthday($birthday){
            $age = strtotime($birthday);
            if($age === false){
            return false;
            }
            list($y1,$m1,$d1) = explode("-",date("Y-m-d",$age));
            $now = strtotime("now");
            list($y2,$m2,$d2) = explode("-",date("Y-m-d",$now));
            $age = $y2 - $y1;
            if((int)($m2.$d2) < (int)($m1.$d1))
            $age -= 1;
            if($age < 18){
                $this->error[] = "Your Age is below 18. So you could not able to join in Jhumuka";
		return false;
            }
        }
	

}

?>