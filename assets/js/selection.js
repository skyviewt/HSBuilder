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


angular.module('hsbuilder', [])
  .controller('selectionController', ['$scope', function($scope) {
    //just here to be stubs.
    $scope.cards = [
      {name:'Ragnaros the Firelord', class:'mage', type:'minion', manaCost: 8, rarity:'legendary', health:8, attack:8, value:8 },
      {name:'Bloodmage Thalnos', class:null, type:'minion', manaCost: 1, rarity:'legendary', health:1, attack:1, keyEffectList:['deathRattle', 'spellDamage'], value:7 },
      {name:'Dark Iron Dwarf', class:null, type:'minion', manaCost: 4, rarity:'common', health:4, attack:4, keyEffectList:['batlecry'], value:6 },
    ];
    $scope.myCard1 = 'cardback';
  }]);
