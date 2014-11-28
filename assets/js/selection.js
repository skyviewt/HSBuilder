/**
* Created with comp307.
* User: skyview
* Date: 2014-11-22
* Time: 11:24 PM
* To change this template use Tools | Templates.
*/


var hsbuilder = angular.module('hsbuilder', []);

 hsbuilder.controller('selectionController', function($scope, $http) {
    //just here to be stubs.
    $scope.selectedCards=[];

    $scope.cards = [];
        
    $scope.setup = function(playerClass){
        
      //get neutral cards
      $http.get("/api/cards/class/neutral.json").
      success(function(data, status,headers,config) {
         $scope.cards = $scope.cards.concat(data);
        
      }).
      error(function(data, status,headers,config) {
        //TODO: handle errors here!
      });  
        
      //get class cards
      $http.get("/api/cards/class/" + playerClass +".json").
      success(function(data, status,headers,config) {
         $scope.cards = $scope.cards.concat(data);
        
      }).
      error(function(data, status,headers,config) {
        //TODO: handle errors here!
      });
        
    } 
        

    $scope.count = 0;
     $scope.manaCount = {'0':0,'1':0,'2':0,'3':0, '4':0,'5':0, '6':0, '7':0};
    $scope.addCard = function (card) {
        var isSelected = false;
        if($scope.count<30){
            if (card.cost<7){
                $scope.manaCount[card.cost.toString()] +=1;
            } 
            else if (card.cost>=7) {
                $scope.manaCount['7'] +=1;
            }
          
            console.log($scope.manaCount);
            var arrayLength = $scope.selectedCards.length;
            for (var i = 0; i < arrayLength; i++) {
                if($scope.selectedCards[i].card.name === card.name){
                    $scope.selectedCards[i].cardNum += 1;
                   isSelected = true; 
                    break;
                }
            }

            if(isSelected === false){
               $scope.selectedCards.push({card:angular.copy(card), cardNum: 1});
            }
            $scope.count += 1;

        }
       
     };
       
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



