<!--{{mana0}}, {{mana1}}, {{mana2}}, {{mana3}}, {{mana4}}, {{mana5}}, {{mana6}}, {{mana7m}} 
}-->

  <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="<?=$base_url.$js_path?>selection.js"></script>
<div class="start-content">
    <div class="row " ng-app="hsbuilder" ng-controller="selectionController" ng-init = "setup('<?=$class?>')">
<div class="col-md-9" id="cardSelection">

    <div class="row content-frame">
        <div class="col-md-4 center">    
            <select ng-model="myCard1" ng-options="card.name for card in cards">
              <option value="">-- Choose card --</option>
              
            </select>
                  
                   <div class="place-card" ng-show="angular.isUndefined(myCard1) || myCard1 == null">  
                      <img src="<?=$base_url.$img_path?>cards/cardback.png">
                  </div>
             <a ng-click="addCard(myCard1)" ng-hide="angular.isUndefined(myCard1) || myCard1 == null">
                  <div class="place-card cardclick" > 
                   <img src="<?=$base_url.$img_path?>cards/{{myCard1.name}}.png">
                </div>
            </a>
        </div>
        
         <div class="col-md-4 center">    
            <select ng-model="myCard2" ng-options="card.name for card in cards">
              <option value="">-- Choose card --</option>
            </select>
             
                  <div class="place-card" ng-show="angular.isUndefined(myCard2) || myCard2 == null">  
                      <img src="<?=$base_url.$img_path?>cards/cardback.png">
                  </div>
              <a ng-click="addCard(myCard2)" ng-hide="angular.isUndefined(myCard2) || myCard2 == null">
                  <div class="place-card cardclick" > 
                   <img src="<?=$base_url.$img_path?>cards/{{myCard2.name}}.png">
                </div>
             </a>
        </div>
        
         <div class="col-md-4 center">    
            <select ng-model="myCard3" ng-options="card.name for card in cards">
              <option value="">-- Choose card --</option>
            </select>
             
                   <div class="place-card" ng-show="angular.isUndefined(myCard3) || myCard3 == null">  
                      <img src="<?=$base_url.$img_path?>cards/cardback.png">
                  </div>
             <a ng-click="addCard(myCard3)" ng-hide="angular.isUndefined(myCard3) || myCard3 == null">
                  <div class="place-card cardclick" > 
                   <img src="<?=$base_url.$img_path?>cards/{{myCard3.name}}.png">
                </div>
               </a>
        </div>
    
    </div>
    <div class="stats row">
        <div class="col-md-3">
             <div class="class">
                    <img src="<?=$base_url.$img_path.$class?>.jpg">
                    <h3 class="classname"><?=$class?></h3>
               </div>
             </div>
            <div class="col-md-3">
                <div class=" chartdiv">
                    <ul ng-repeat="i in [0,1,2,3,4,5,6,7]">
                        mana cost : {{ i }}
                       
                        
                        
                        
                     
                    </ul>
               
                    <bars data="1,2,3,4,5,6,7"></bars>
                </div>
                
        </div>
        
        </div>
        </div>
    
    <div class="col-md-3" >
        <div  id="deckdiv">
            <div id="deckcount">
                <p>Deck: <span>{{count}}</span> / 30 cards</p>
            </div>
            <li ng-repeat="c in selectedCards">
            <div class="deck screenshot">
                <div class="pull-left deck-caption">
                    <div class="deck-cost">{{c.card.cost}}</div>
                    <div style="float:left;padding: 4px">{{c.card.name}}&nbsp;x{{c.cardNum}}</div>
                </div>
                <div class="pull-right deck-pic" style="background: url('<?=$base_url.$img_path?>cards/{{c.card.name}}.png'); background-repeat: no-repeat; background-position: -85px -55px;background-size: 280%;">
                    <div class="deck-fade"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
                
                </li>
        </div>
        
    </div>
        </div>
    
   
  
</div>
</body>
</html>
