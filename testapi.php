<?php
   /*
   * Collect all Details from Angular HTTP Request.
   */ 
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$email = $request->email;
    /*
     * You can use $email and $pass for further work. Such as Database calls.
    */    
	
	include_once("class1.php");
	
	$trips = new trips($email);
	
	$data = $trips->getroute();
	print_r(json_encode(array("data"=>$data)));
	
	class boardingPass{
		
		private  $departurelocation  ; 
		private  $arrivedLocation ;
		private  $currentindex;
		
		function __construct($departurelocation, $arrivedLocation,$index){
			$this->departurelocation = $departurelocation;
			$this->arrivedLocation = $arrivedLocation;
			$this->currentindex = $index;
			
		}
		
		public function getdeparturelocation()
		{
			return $this->departurelocation;
		}
		
		public function getarrivedlocation(){
			return $this->arrivedLocation;
		}
		public function getindex(){
			return $this->currentindex;
		}
		
		
		
	}
?>
