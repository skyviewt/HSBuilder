/**
* Created with comp307.
* User: skyview
* Date: 2014-11-22
* Time: 11:24 PM
* To change this template use Tools | Templates.
*/


var hsbuilder = angular.module('hsbuilder', ['ngSanitize', 'ui.select','ui.bootstrap']);

 hsbuilder.controller('selectionController', function($scope, $http, $rootScope) {
     $scope.totalValue = 0;
     $scope.deferedValue = -1;
     $scope.user_id = 0;
     
     var pushCardsStates = function(){
         
        var selectedCardsString = $scope.selectedCards.map(function(c){
            var temp = [];
            var i;
            for (i = 0; i < c.cardNum; i++) {
                temp.push(c.card.id);
            }
            return temp.join(',');
        }).join(',');
        
        $rootScope.selectedCardsString = selectedCardsString;
        
            window.history.pushState($scope.selectedCards, 
                                     $scope.selectedCards, 
                                     "/home/selection?class=" +
                                     $scope.playerClass + 
                                     "&cards=" +
                                     selectedCardsString
                                     );
        
    };
     
    $scope.card1 = {}; 
    $scope.card2 = {};
    $scope.card3 = {};
    
    $scope.selectedCards=[];
    $rootScope.selectedCardsString = ""; 

    $scope.cards = [];
        
    $scope.setup = function(playerClass, selectedCards, user_id){
        $scope.playerClass = playerClass;
        $scope.user_id = user_id;
        
        var processInputCards = function(data){
            selectedCards.map(function(str){
                
                var foundCard = data.filter(function(e){return e.id === str})[0];
                if (foundCard) {
                    
                    var promise = $http.get("/api/values/id/" + foundCard.value_id + ".json");
                    promise.then(function(result) {
                
                        var value = computeValue(result.data[0][$scope.playerClass]);
                         $scope.addCard(foundCard, value);   
                            return foundCard;
                        });
                  
                } else {
                    return null;
                }
            });
        };
        selectedCards = selectedCards.split(',');


        //get neutral cards
        $http.get("/api/cards/class/neutral.json").
        success(function(data, status,headers,config) {
            $scope.cards = $scope.cards.concat(data);
            processInputCards(data);
        }).
        error(function(data, status,headers,config) {
        //TODO: handle errors here!
        });  

        //get class cards
        $http.get("/api/cards/class/" + playerClass +".json").
        success(function(data, status,headers,config) {
            $scope.cards = $scope.cards.concat(data);
            processInputCards(data);
        }).
        error(function(data, status,headers,config) {
        //TODO: handle errors here!
        });
        
    }; 

    $scope.count = 0;
    $scope.manaCount = {'0':0,'1':0,'2':0,'3':0, '4':0,'5':0, '6':0, '7':0};
    $scope.effects = {'battlecry':0,'taunt':0, 'deathrattle':0, 'charge':0, 'enrage':0, 'overload':0, 'stealth':0, 'windfury':0, 'spell damage':0};
     
     $scope.addCard = function (card, value) {

        var isSelected = false;
        if($scope.count<30){
            if (card.cost<7){
                $scope.manaCount[card.cost.toString()] +=1;
            } 
            else if (card.cost>=7) {
                $scope.manaCount['7'] +=1;
            }
            
            $scope.manaMax = _.reduce($scope.manaCount, function(memo, value){
                return memo + value;
            }, 0);
            
            for (var property in $scope.effects) {
                if ($scope.effects.hasOwnProperty(property)) {
              
                    if(card.text.toLowerCase().indexOf('<b>'+property) == 0 ){
                       $scope.effects[property] +=1;
                    }
                        
                }
            }
            var arrayLength = $scope.selectedCards.length;
            for (var i = 0; i < arrayLength; i++) {
                if($scope.selectedCards[i].card.name === card.name){
                    $scope.selectedCards[i].cardNum += 1;
                   isSelected = true; 
                    break;
                }
            }

            if(isSelected === false){
                if(card)
                $scope.selectedCards.push({card:angular.copy(card), cardNum: 1, value:value});
            }
            $scope.count += 1;
            $scope.totalValue += parseInt(value);
            console.log(value);
            
            pushCardsStates();
           

        }
       
     }; //end addcard
    
     $scope.value1= -1; $scope.value2= -1; $scope.value3= -1; 
     
      $scope.evaluate = function (card, int) {
         
         var value = 0;
         
         if(card.value_id > 0)
         {
            $http.get("/api/values/id/" + card.value_id + ".json").
            success(function(data, status,headers,config) {
                
                value = computeValue(data[0][$scope.playerClass]);
                switch(int) {
                    case 1:
                        $scope.value1 = value;
                        break;
                    case 2:
                        $scope.value2 = value;
                        break;
                    case 3:
                        $scope.value3 = value;
                        break;
                    case 0:
                       $scope.deferedValue = value;
                        break;
                     
                }
            return value;
            }).
            error(function(data, status,headers,config) {
            //TODO: handle errors here!
            
            });
             
         }
          
         
     }
     
     //TODO: compute the actually value
     function computeValue(val)
     {
        return val;
     }
       
  });

hsbuilder.directive('errSrc', function() {
return {
   link: function(scope, element, attrs) {
     element.bind('error', function() {        
         if (attrs.src != attrs.errSrc) {
         attrs.$set('src', attrs.errSrc);
        }
      });
    }
 }
});
hsbuilder.filter('propsFilter', function() {
  return function(items, props) {
    var out = [];

    if (angular.isArray(items)) {
      items.forEach(function(item) {
        var itemMatches = false;

        var keys = Object.keys(props);
        for (var i = 0; i < keys.length; i++) {
          var prop = keys[i];
          var text = props[prop].toLowerCase();
          if (item[prop].toString().toLowerCase().indexOf(text) !== -1) {
            itemMatches = true;
            break;
          }
        }

        if (itemMatches) {
          out.push(item);
        }
      });
    } else {
      // Let the output be the input untouched
      out = items;
    }

    return out;
  }
});

hsbuilder.controller('modalController', function ($scope, $http, $modal) {
   
  $scope.login = function (size) {
   
    var modalInstance = $modal.open({
      templateUrl: 'login.html',
      controller: 'ModalInstanceCtrl',
      size: size,
     });

    };
    
   $scope.signup = function (size) {
   
    var modalInstance = $modal.open({
      templateUrl: 'signup.html',
      controller: 'ModalInstanceCtrl',
      size: size,
    });

  };
    
  $scope.getSaveRunForm = function(size){
      
      var modalInstance = $modal.open({
      templateUrl: 'saverun.html',
      controller: 'ModalInstanceCtrl',
      size: size,
    });
      
  }
    
  $scope.logout = function(){
          $http({
            url: '/account/logout',
            method: "POST",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data, status, headers, config) {

            console.log(data);
            window.location = "/";
        }).error(function (data, status, headers, config) {
            $scope.error=data['error'];
            $modal.open({
                  templateUrl: 'feedbackerror.html',
                  controller: 'ModalInstanceCtrl',
                });
        }); 
  }
     $scope.toimplement = function (){
       $modal.open({
                  templateUrl: 'toimplement.html',
                  controller: 'ModalInstanceCtrl',
                });
   };
    
   
});
hsbuilder.controller('ModalInstanceCtrl', function ($scope, $modalInstance, $http, $modal, $rootScope) {
   
    
    $scope.errormsg={};
    $scope.logData = {};
    $scope.regData = {};
    $scope.arenaRun = {};
    function isPropertyNull(o) {
        if(o === ""){
            return true;
        }
        else if (o === null) {
            return true;
        }
        else if( typeof o === 'undefined' ) {
            return true;
        }
        return false;
        
    }
    
     $scope.saveRun = function (player_class, user_id) {
         
        if(!(isPropertyNull($scope.arenaRun.name)) && !(isPropertyNull($scope.arenaRun.wins)) && !(isPropertyNull($scope.arenaRun.losses)) ){
        
        $scope.arenaRun.user_id = user_id;
        $scope.arenaRun.player_class = player_class;
        $scope.arenaRun.cards = $rootScope.selectedCardsString;
            
        if(isPropertyNull($scope.arenaRun.rewards))
        {
            $scope.arenaRun.rewards = "";
        }
            
        $http({
            url: '/api/runs.json',
            method: "POST",
            data: $scope.arenaRun,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data, status, headers, config) {
            $modalInstance.dismiss('cancel');
            $modal.open({
                templateUrl: 'runSaved.html',
                controller: 'ModalInstanceCtrl',
            });
        }).error(function (data, status, headers, config) {
           /*console.log(status);
            $modal.open({
                  templateUrl: 'loginerror.html',
                  controller: 'ModalInstanceCtrl',
                });*/
        });        
        }else {
            
        }
    };
    
    
    //login
    $scope.submit = function () {
        if(!(isPropertyNull($scope.logData.username) && isPropertyNull($scope.logData.password)) ){
            
        var tmpPass = $scope.logData.password;
        $scope.logData.password = CryptoJS.MD5($scope.logData.password).toString();
        $http({
            url: '/account/login',
            method: "POST",
            data: $scope.logData,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data, status, headers, config) {
            $modalInstance.dismiss('cancel');
            console.log(data);
            window.location = "/account/profile";
        }).error(function (data, status, headers, config) {
           
           $scope.logData.password = tmpPass;
            
           $modal.open({
                  templateUrl: 'loginerror.html',
                  controller: 'ModalInstanceCtrl',
                });
        });        
        }else {
            
        }
    };
    
    //create user
    $scope.submit2 = function () {
        if(!(isPropertyNull($scope.regData.username) || isPropertyNull($scope.regData.password) || isPropertyNull($scope.regData.password2) || isPropertyNull($scope.regData.email)) ){
        if($scope.regData.password== $scope.regData.password2) {
            delete $scope.regData.password2;
            var tmpPass = $scope.regData.password;
            $scope.regData.password = CryptoJS.MD5($scope.regData.password).toString();
            
            $http({
            url: '/api/users.json',
            method: "POST",
            data: $scope.regData,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (data, status, headers, config) {
                 $modalInstance.dismiss('cancel'); 
                 $modal.open({
                  templateUrl: 'ok.html',
                  controller: 'ModalInstanceCtrl',
                });              
            }).error(function (data, status, headers, config) {
                 $modalInstance.dismiss('cancel');
                 $scope.regData.password = tmpPass;
                 $modal.open({
                  templateUrl: 'error.html',
                  controller: 'ModalInstanceCtrl',
                });
                  
            });
            }else{
            //pass dont match
            document.getElementById('password1').setCustomValidity('Passwords must match.');
            }
        }else{
            //null fields 
            //do nothing html5 form validation will trigger
            
        }
    
  };
    


  $scope.cancel = function () {
     
    $modalInstance.dismiss('cancel');
  };

});