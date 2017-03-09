<!doctype html>
<html ng-app="sortApp">
   <head>
      <title>SORT Boarding Pass </title>
      <link href="./css/bootstrap.css" rel="stylesheet" type="text/css" >
      <link href="./css/custom.css" rel="stylesheet" type="text/css" >
      <script src="./js/angular.js"></script>
      <script src="./js/angular-resource.min.js"></script>
      <script src="./js/angular-route.min.js"></script>
      <script src="./js/app.js"></script>
      <script src="./test.js"></script>
      <script>
         function openCity(evt, cityName) {
             var i, tabcontent, tablinks;
             tabcontent = document.getElementsByClassName("tabcontent");
             for (i = 0; i < tabcontent.length; i++) {
                 tabcontent[i].style.display = "none";
             }
             tablinks = document.getElementsByClassName("tablinks");
             for (i = 0; i < tablinks.length; i++) {
                 tablinks[i].className = tablinks[i].className.replace(" active", "");
             }
             document.getElementById(cityName).style.display = "block";
             evt.currentTarget.className += " active";
         }
      </script>
   </head>
   <body>
      <header>
         <h1> Sort Your Trip </h1>
      </header>
      <div class="container cont"  style="">
      <div ng-controller="myCtrl">
      <section  id="first">
         <div class="container" >
            <div class="row" >
               <div class="col-sm-10" >
                  <ul class="tab">
                     <li>
                        <a href="#" class="tablinks active" onclick="openCity(event, 'FLIGHT')">
                           <h4>FLIGHT</h4>
                        </a>
                     </li>
                     <li>
                        <a href="#" class="tablinks" onclick="openCity(event, 'train')">
                           <h4>TRAIN</h4>
                        </a>
                     </li>
                     <li>
                        <a href="#" class="tablinks" onclick="openCity(event, 'bus')">
                           <h4>BUS</h4>
                        </a>
                     </li>
                  </ul>
                  <div id="FLIGHT" class="tabcontent" style="display:block">
                     <div class="row" >
                        <div class="col-md-10">
                           <div class="col-md-3">
                              <label> Destination<span class="hint">*</span></label > <br />
                              <input type="text" class="form-control input-sm" ng-model="destiny" />
                           </div>
                           <div class="col-md-3">
                              <label> Arrival<span class="hint">*</span></label > <br />
                              <input type="text" class="form-control input-sm" ng-model="arrival" />
                           </div>
                           <div class="col-md-3">
                              <label> Flight NO: </label > <br />
                              <input type="text" class="form-control input-sm" ng-model="flightno" />
                           </div>
                        </div>
                     </div>
                     <br />
                     <div class="row" >
                        <div class="col-md-10">
                           <div class="col-md-3">
                              <label> GateNO </label > <br />
                              <input type="text" class="form-control input-sm" ng-model="gateno" />
                           </div>
                           <div class="col-md-3">
                              <label> Seat No: </label > <br />
                              <input type="text" class="form-control input-sm" ng-model="seatno" />
                           </div>
                           <div class="col-md-3">
                              <label> Baggage counter </label > <br />
                              <input type="text" class="form-control input-sm" ng-model="counter" />
                           </div>
                        </div>
                     </div>
                     <div class="row" >
                        <div class="col-md-10">
                           <div class="col-md-3">
                           </div>
                           <div class="col-sm-2" ><button  class="btn btn-default btn-sm"  ng-click="addflightTrip()"> ADD TRIP</button> </div>
                        </div>
                     </div>
                  </div>
                  <div id="train" class="tabcontent">
                     <div class="row" >
                        <div class="col-md-10">
                           <div class="col-md-3">
                              <label> Destination<span class="hint">*</span></label > <br />
                              <input type="text" class="form-control input-sm" ng-model="destiny" />
                           </div>
                           <div class="col-md-3">
                              <label> Arrival<span class="hint">*</span></label > <br />
                              <input type="text" class="form-control input-sm" ng-model="arrival" />
                           </div>
                           <div class="col-md-3">
                              <label> Train NO: </label > <br />
                              <input type="text" class="form-control input-sm" ng-model="flightno" />
                           </div>
                        </div>
                     </div>
                     <br />
                     <div class="row" >
                        <div class="col-md-10">
                           <div class="col-md-3">
                              <label> Seat No: </label > <br />
                              <input type="text" class="form-control input-sm" ng-model="seatno" />
                           </div>
                        </div>
                     </div>
                     <div class="row" >
                        <div class="col-md-10">
                           <div class="col-md-3">
                           </div>
                           <div class="col-sm-2" ><button  class="btn btn-default btn-sm"  ng-click="addtrainTrip()"> ADD TRIP</button> </div>
                        </div>
                     </div>
                  </div>
                  <div id="bus" class="tabcontent">
                     <div class="row" >
                        <div class="col-md-10">
                           <div class="col-md-3">
                              <label> Destination<span class="hint">*</span></label > <br />
                              <input type="text" class="form-control input-sm" ng-model="destiny" />
                           </div>
                           <div class="col-md-3">
                              <label> Arrival<span class="hint">*</span></label > <br />
                              <input type="text" class="form-control input-sm" ng-model="arrival" />
                           </div>
                           <div class="col-md-3">
                              <label> Bus NO: </label > <br />
                              <input type="text" class="form-control input-sm" ng-model="flightno" />
                           </div>
                        </div>
                     </div>
                     <br />
                     <div class="row" >
                        <div class="col-md-10">
                           <div class="col-md-3">
                              <label> Seat No: </label > <br />
                              <input type="text" class="form-control input-sm" ng-model="seatno" />
                           </div>
                        </div>
                     </div>
                     <div class="row" >
                        <div class="col-md-10">
                           <div class="col-md-3">
                           </div>
                           <div class="col-sm-2" ><button  class="btn btn-default btn-sm"  ng-click="addbusTrip()"> ADD TRIP</button> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class ="col-md-10">
                  <p style="color:red">{{errortext}}</p>
               </div>
            </div>
      </section>
      <section id="second">
      <div class="container">
      <!-- ADD Trip --> 
      <div class ="col-md-10">
      <h3>Trips</h3>
      <ul class="prvul">
      <li ng-repeat="x in prod">
      <div class="prv_sec">
      <div class="row" >
      <div class="col-md-12">
      <div class="col-md-1">
      <img src="images/{{x.type}}.png" />
      </div>
      <div class="col-md-3">
      <label> Destination</label >
      <label class="preview"> {{x.deploc}}</label>
      </div>
      <div class="col-md-3">
      <label> Arrival</label > 
      <label class="preview"> {{x.arriveloc}}</label>
      </div>
      <div class="col-md-2">
      <label> Number/Code: </label >
      <label class="preview"> {{x.number}}</label>
      </div>
      <div class="col-sm-2" ><span class="hint" ng-click="removeItem($index)">X</span></div>
      </div>
      </div>
      <div class="row" >
      <div class="col-md-12">
      <div class="col-md-1">
      </div>
      <div class="col-md-3" ng-if="showhide(x.type)" >
      <label> GateNO </label > :
      <label class="preview"> {{x.gateno}}</label>
      </div>
      <div class="col-md-3">
      <label> Seat No: </label > 
      <label class="preview"> {{x.seatno}}</label>
      </div>
      <div class="col-md-4" ng-if="showhide(x.type)">
      <label> Baggage counter </label > 
      <label class="preview"> {{x.counter}}</label>
      </div>
      </div>
      </div>
      </div>
      </li>
      </ul>
      <div class="row">
      <div class="col-md-4"><button ng-click="sortData()" ng-show="sortbt" class="btn btn-default btn-sm "> Sort </button></div>
      </div>
      </div></div>
      </section>
      <section id="third">
      <!--- prevoew section -->
      <div class="row">
      <div class="result" ng-show="sortview" ng-model="assa">
      <div class="col-md-10">
      <div class="col-md-10">
      <ul><li ng-repeat="trip in res">{{trip}}</li></ul>
      </div>
      </div>
      <div class="row">
      <div class="col-md-10">
      <button class="btn btn-sm btn-default">PRINT</button>
      </div>
      </div>
      </div>
      </section>
      </div>
      </div>
   </body>
</html>