/**
* Created with comp307.
* User: skyview
* Date: 2014-11-22
* Time: 11:24 PM
* To change this template use Tools | Templates.
*/


var hsbuilder = angular.module('hsbuilder', ['ngSanitize', 'ui.select']);

 hsbuilder.controller('selectionController', function($scope, $http, $location) {
    var pushCardsStates = function(){
        var selectedCardsString = $scope.selectedCards.map(function(c){
            var temp = [];
            var i;
            for (i = 0; i < c.cardNum; i++) {
                temp.push(c.card.id);
            }
            return temp.join(',');
        }).join(',');
        window.history.pushState($scope.selectedCards, 
                                 "cards added", 
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

    $scope.cards = [];
        
    $scope.setup = function(playerClass, selectedCards){
        $scope.playerClass = playerClass;
        var processInputCards = function(data){
            selectedCards.map(function(c){
                var foundCard = data.filter(function(e){return e.id === c;})[0];
                if (foundCard) {
                    $scope.addCard(foundCard);
                    return foundCard;
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
    $scope.addCard = function (card) {

        var isSelected = false;
        if($scope.count<30){
            if (card.cost<7){
                $scope.manaCount[card.cost.toString()] +=1;
            } 
            else if (card.cost>=7) {
                $scope.manaCount['7'] +=1;
            }
            
            for (var property in $scope.effects) {
                if ($scope.effects.hasOwnProperty(property)) {
              
                    if(card.text.toLowerCase().indexOf('<b>'+property) == 0 ){
                       $scope.effects[property] +=1;
                    }
                        
                }
            }
            /*console.log($scope.manaCount);*/
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
            pushCardsStates();

        }
       
     }; //end addcard
     
     $scope.evaluate = function (card){
         
         var value = 0;
         
         if(card.value_id > 0)
         {
            $http.get("/api/values/id/" + card.value_id + ".json").
            success(function(data, status,headers,config) {
                
                value = computeValue(data[0][$scope.playerClass]);
                
                
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
       
     
     $scope.evaluate = function (card){
         
         var value = 0;
         
         if(card.value_id > 0)
         {
            $http.get("/api/values/id/" + card.value_id + ".json").
            success(function(data, status,headers,config) {
                
                value = computeValue(data[0][$scope.playerClass]);
                
                
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