/**
* Created with comp307.
* User: skyview
* Date: 2014-11-22
* Time: 11:24 PM
* To change this template use Tools | Templates.
*/


var hsbuilder = angular.module('hsbuilder', ['acute.select']);

 hsbuilder.controller('selectionController', function($scope, $http) {
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
        console.log("mycards", selectedCards);

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
     $scope.effects = {'battlecry':0,'taunt':0,'charge':0, 'enrage':0, 'overload':0, 'stealth':0, 'windfury':0, 'spell damage':0};
    $scope.addCard = function (card) {
        console.log(card);
        var isSelected = false;
        if($scope.count<30){
            if (card.cost<7){
                $scope.manaCount[card.cost.toString()] +=1;
            } 
            else if (card.cost>=7) {
                $scope.manaCount['7'] +=1;
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