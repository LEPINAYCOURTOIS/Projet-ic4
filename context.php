<?php
class Context
{
	
		private $attributes;	
         	

		function decode()
		{
	
			if($_REQUEST["context"] == "")
			{

			 $this->attributes=array();
        	}	
			else
			{
			 $this->attributes =unserialize(base64_decode($_REQUEST["context"]));
			}
				
		}
		
		
		function encode()
		{
			return base64_encode(serialize($this->attributes));
		}
		
		function get_attribute($key)
		{
					return $this->attributes[$key];
		}
		
		
		function set_attribute($key,$value)
		{
			 $this->attributes[$key] = $value;    			
		}
		
		function Context()
		{
			$this->decode();
		}
		
}

$context=new Context();	

?>