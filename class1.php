<?php 

class trips extends boardingPass{
	
	private $seatno ;
	private $vehno; 
	private $gateno; 
	private $tiketcounter; 
	
	private $sortarray = array();
	private $depindex = array();
	private $arriveindex = array();
		private $resultarray = array();

	
	private $passindex ="";
	private $deplocation = ""; 
	private $arriveloc = "";
	private $startingLocation = "";
	private $endingLocation = "";
	private $nextLocaoation = "";
	
	
	function __construct($boardingPasses){
		
		$this->boardingPasses = $boardingPasses;
		
		foreach( $this->boardingPasses  as  $key => $boardingpass){
			$this->depindex[$boardingpass->deploc] = $boardingpass->deploc;
			$this->arriveindex[$boardingpass->arriveloc] = $boardingpass->arriveloc ;
						
		}
		
		$fl = $this->selectindex();
		if($fl){
			$this->getnextTrip();
		}
	}
	
	function selectindex(){
		foreach( $this->boardingPasses  as  $key => $boardingpass){
			$boardingPass = new boardingPass(  $boardingpass->deploc, $boardingpass->arriveloc, $key);
			
			 $this->sortTrip( $key, $boardingpass->deploc, $boardingpass->arriveloc);
			
		}
		return true;
	}
	
	
	function sortTrip($passindex, $deplocation, $arriveloc)
	{
		if( $this->startingLocation == ""){
			if(array_key_exists($deplocation, $this->arriveindex)){ 

		}else{ 
		
				$this->startingLocation = $deplocation; 
				array_push($this->sortarray, $this->boardingPasses[$passindex] ) ;
				$this->nextLocaoation = $arriveloc;

				unset($this->boardingPasses[$passindex]);
				//echo "**********";
				//print_r($this->sortarray);
				//echo "**************";
				
			return ;

		
			}
		}
		$this->passindex  = $passindex; 
			 
	}
	
	function getnextTrip()
	{
		foreach( $this->boardingPasses  as  $ckey => $boardingdata){
				
						if(strcmp($this->nextLocaoation ,$boardingdata->deploc)==0){						
						//$this->startingLocation = $deplocation; 
						array_push($this->sortarray, $this->boardingPasses[$ckey] ) ;
						$this->nextLocaoation = $boardingdata->arriveloc;

						unset($this->boardingPasses[$ckey]);
						//echo "**********";
						//print_r($this->sortarray);
						//echo "**************";
						if(!empty($this->boardingPasses))		{$this->getnextTrip() ; }
						}
				}
								

		
	}
	function getroute(){
		  
		  foreach($this->sortarray as $data ){
			  switch(trim($data->type)){
				  case "plane":{
					  $flhtml = "From ".$data->deploc." take flight ";
					  if(isset($data->number)){
						  
						  $flhtml .=" ".$data->number;
					  }
					  $flhtml .= " to ".$data->arriveloc.".";
					if(isset($data->gateno)){
						  
						  $flhtml .="Gate ".$data->number;
					  }
					  if(isset($data->seatno)){
						  
						  $flhtml .=", seat ".$data->seatno.".";
					  }
					  if(isset($data->counter)){
						  
						  $flhtml .="Baggage drop at ticket counter ".$data->counter;
					  }
					  
					  $this->resultarray[] = $flhtml;
					       
					  break;
				  }
				  case "train":{
					  $trhtml = "Take train ";
					  if(isset($data->number)){
						  
						  $trhtml .=$data->number;
					  }
					  $trhtml .= " From ".$data->deploc;

					  $trhtml .= "  to ".$data->arriveloc.".";
					  if(isset($data->seatno)){
						  
						  $trhtml .=" Sit in seat ".$data->seatno.".";
					  }
					  $this->resultarray[] = $trhtml;

					  break;
				  }
				  case "bus":{
					   $bushtml = "Take the bus from ";
					    if(isset($data->number)){
						  
						  $bushtml .=$data->number;
					  }
					 	$bushtml .= "  ".$data->deploc;

					    $bushtml .= " to ".$data->arriveloc.".";

					  if(isset($data->seatno)){
						  
						  $bushtml .=" Sit in seat ".$data->seatno.".";
					  }else{
						  $bushtml .="No seat assignment.";

					  }
					  $this->resultarray[] = $bushtml;

					  break;
				  }
			  }
			  

			  
		  }
		  			  $this->resultarray[] = "You have arrived at your final destination";
		  			 return $this->resultarray;

	}
	
	
}


?>