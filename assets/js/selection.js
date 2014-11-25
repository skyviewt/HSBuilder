/**
* Created with comp307.
* User: skyview
* Date: 2014-11-22
* Time: 11:24 PM
* To change this template use Tools | Templates.
card {
    name:
    class:
    type:(minion/spell/weapon)
    manaCost:
    rarity:
    health:
    attack:
    keyEffectList:[taunt,divineSheild, windFurry, charge, deathRattle, battleCry, silence, spellDamage, enrage, overload]
    value:
    }
*/


var hsbuilder = angular.module('hsbuilder', []);

 hsbuilder.controller('selectionController', function($scope) {
    //just here to be stubs.
    $scope.selectedCards=[];
    $scope.cards = [
      {name:'Ragnaros the Firelord', class:'mage', type:'minion', manaCost: 8, rarity:'legendary', health:8, attack:8, value:8 },
      {name:'Bloodmage Thalnos', class:null, type:'minion', manaCost: 1, rarity:'legendary', health:1, attack:1, keyEffectList:['deathRattle', 'spellDamage'], value:7 },
      {name:'Dark Iron Dwarf', class:null, type:'minion', manaCost: 4, rarity:'common', health:4, attack:4, keyEffectList:['batlecry'], value:6 },
    ];
      
    $scope.count = 0;
    $scope.addCard = function (card) {
        var isSelected = false;
        if($scope.count<30){
            var arrayLength = $scope.selectedCards.length;
            for (var i = 0; i < arrayLength; i++) {
                if($scope.selectedCards[i].card.name === card.name){
                    $scope.selectedCards[i].cardNum += 1;
                   isSelected = true; 
                }
            }
             if(isSelected === false){
                $scope.selectedCards.push({card:angular.copy(card), cardNum: 1});
             }
        $scope.count += 1;
        } 
     };
       
  });
