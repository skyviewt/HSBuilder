/**
* Created with comp307.
* User: skyview
* Date: 2014-12-05
* Time: 12:40 AM
* To change this template use Tools | Templates.
*/
hsbuilder.controller('accountController', function ($scope, $http) {

    $scope.runs = [];
    
    $scope.setup = function(user_id){
        
        //get neutral cards
        $http.get("/api/runs/user_id/" + user_id + ".json").
        success(function(data, status,headers,config) {
            $scope.runs = data;
        }).
        error(function(data, status,headers,config) {
            //TODO: handle errors here!
        });  
        
    }
    
    $scope.parse = function(str){
        
        return parseInt(str);
    }
  
});
   

