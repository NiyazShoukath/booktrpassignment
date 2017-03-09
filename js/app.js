var app = angular.module("sortApp", ["ngRoute"]);


app.controller("myCtrl", function ($scope, $http) {

    $scope.products = ["Milk", "Bread", "Cheese"];
	$scope.prod = [];
	
	$scope.sortview = false;
	$scope.sortbt = false;
	
	$scope.hidebt = function(){
		
			if($scope.prod.length == 0){
	$scope.sortview = false;
			$scope.sortbt = false;
	}else{
	$scope.sortbt = true;
	}
	
	
	}
	/**
	*Flight Trip Adding function 
	*/
    $scope.addflightTrip = function () {

		
			//$scope.prod.push({name: $scope.addMe}) ;
			        $scope.errortext = "";

			        if (!$scope.destiny || !$scope.arrival) {return;}

			
			if( typeof $scope.destiny !== 'undefined' && $scope.destiny.length > 0)
			{

					var dd = $scope.prod.map(function(location){
							return location.deploc;
					}).indexOf($scope.destiny);
					//alert(dd);
					if(dd == -1){
										$scope.prod.push({deploc: $scope.destiny,arriveloc:$scope.arrival,number:$scope.flightno,seatno:$scope.seatno, gateno:$scope.gateno,counter:$scope.counter, type:"plane"}) ;

					}else{
									$scope.errortext = " already Traveled From This location.";

					}

								
			}
			else{
										$scope.prod.push({name: $scope.destiny}) ;
			}
		
		
		
		$scope.hidebt();

			
        /*if ($scope.prod.name.indexOf($scope.addMe) == -1) {
            $scope.products.push($scope.addMe);
        } else {
            $scope.errortext = "The item is already in your shopping list.";
        }*/
    }
	
	/**
	*Train Trip Adding function 
	*/
    $scope.addtrainTrip = function () {
			//$scope.prod.push({name: $scope.addMe}) ;
			        $scope.errortext = "";

			        if (!$scope.destiny || !$scope.arrival) {return;}

			
			if( typeof $scope.destiny !== 'undefined' && $scope.destiny.length > 0)
			{

					var dd = $scope.prod.map(function(location){
							return location.deploc;
					}).indexOf($scope.destiny);
					//alert(dd);
					if(dd == -1){
										$scope.prod.push({deploc: $scope.destiny,arriveloc:$scope.arrival,number:$scope.flightno,seatno:$scope.seatno, gateno:"",counter:"", type:"train"}) ;

					}else{
									$scope.errortext = "Already Traveled From This location.";

					}

								
			}
			else{
										$scope.prod.push({name: $scope.destiny}) ;
			}
		
		
				$scope.hidebt();


			
        /*if ($scope.prod.name.indexOf($scope.addMe) == -1) {
            $scope.products.push($scope.addMe);
        } else {
            $scope.errortext = "The item is already in your shopping list.";
        }*/
    }
	/**
	*Bus Trip Adding function 
	*/
    $scope.addbusTrip = function () {
			//$scope.prod.push({name: $scope.addMe}) ;
			        $scope.errortext = "";

			        if (!$scope.destiny || !$scope.arrival) {return;}

			
			if( typeof $scope.destiny !== 'undefined' && $scope.destiny.length > 0)
			{

					var dd = $scope.prod.map(function(location){
							return location.deploc;
					}).indexOf($scope.destiny);
					//alert(dd);
					if(dd == -1){
										$scope.prod.push({deploc: $scope.destiny,arriveloc:$scope.arrival,number:$scope.flightno,seatno:$scope.seatno, gateno:"",counter:"", type:"bus"}) ;
										
					}else{
									$scope.errortext = "Already Traveled From This location.";

					}

								
			}
			else{
										$scope.prod.push({name: $scope.destiny}) ;
			}
		
		
				$scope.hidebt();


			
        /*if ($scope.prod.name.indexOf($scope.addMe) == -1) {
            $scope.products.push($scope.addMe);
        } else {
            $scope.errortext = "The item is already in your shopping list.";
        }*/
    }
	
	
	
    $scope.removeItem = function (x) {
		
        $scope.errortext = "";
        $scope.prod.splice(x, 1);
				$scope.hidebt();

    }

	
	
	
	
	
	
	
	$scope.sortData =  function(){

			//document.getElementById("message").textContent = "";

			var request = $http({
			method: "post",
			//url: window.location.href + "login.php",
			url:  "testapi.php",
			data: {
			email: $scope.prod
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			});

			/* Check whether the HTTP Request is successful or not. */
			request.success(function (data) {
				
					$scope.res = [];


				angular.forEach(data.data, function(value, key) {
					
					$scope.res.push(value);
						$scope.sortview = true;

					//alert(value);
					//$("")
				});
				//alert(data.data[0]);
			//document.getElementById("message").textContent = "You have login successfully with email "+data;
			});
		}

		$scope.showhide =function( type){
			
			if(type=="plane")
			{
				return true;
				
			}else{
				return false;
			}
		}
		

	
	});
	

