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
    $scope.cards = [
      {name:'Ragnaros the Firelord', class:'mage', type:'minion', cost: 8, rarity:'legendary', health:8, attack:8, value:8 },
      {name:'Bloodmage Thalnos', class:null, type:'minion', cost: 1, rarity:'legendary', health:1, attack:1, keyEffectList:['deathRattle', 'spellDamage'], value:7 },
      {name:'Dark Iron Dwarf', class:null, type:'minion', cost: 4, rarity:'common', health:4, attack:4, keyEffectList:['batlecry'], value:6 },
    ];
      /*$http.get("http://cobra-blast.codio.io:3000/api/cards/class/mage.json").
      success(function(data, status,headers,config) {
          alert('success');
      }).
      error(function(data, status,headers,config) {
          alert(data);
          console.log(data);
      });
      */   
    $scope.count = 0;

    $scope.addCard = function (card) {
        var isSelected = false;
        if($scope.count<30){
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
hsbuilder.filter('property', property);

function property(){
    function parseString(input){
        return input.split(".");
    }
 
    function getValue(element, propertyArray){
        var value = element;
 
        _.forEach(propertyArray, function(property){
            value = value[property];
        });
 
        return value;
    }
 
    return function (array, propertyString, target){
        var properties = parseString(propertyString);
 
        return _.filter(array, function(item){
            return getValue(item, properties) == target;
        });
    }
}

hsbuilder.directive('bars', function ($parse) {
      return {
         restrict: 'E',
         replace: true,
         template: '<div id="chart"></div>',
         link: function (scope, element, attrs) {
           var data = attrs.data.split(','),
           chart = d3.select('#chart')
             .append("div").attr("class", "chart")
             .selectAll('div')
             .data(data).enter()
             .append("div")
             .transition().ease("elastic")
             .style("width", function(d) { return d + "%"; })
             .text(function(d) { return d + "%"; });
         } 
      };
   });
