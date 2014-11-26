<!--card {
    name:
    class:
    type:(minion/spell/weapon)
    manaCost:
    rarity:
    health:
    attack:
    keyEffectList:[taunt: ,divineShield:, windFurry:, charge:, deathRattle:, battleCry:, silence:, spellDamage:, enrage, overload:]
    value:
}-->

  <script type="text/javascript" src="<?=$base_url.$js_path?>selection.js"></script>
<div class="start-content">
    <div class="row " ng-app="hsbuilder" ng-controller="selectionController" ng-init = "setup('<?=$class?>')">
<div class="col-md-9 content-frame frame1" id="cardSelection">

    <div class="row">
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
        </div>
    
    <div class="col-md-3" >
        <div  id="deckdiv">
            <div id="deckcount">
                <p>Deck: <span>{{count}}</span> / 30 cards</p>
            </div>
            <li ng-repeat="c in selectedCards">

                
               
            <div class="deck screenshot">
                <div class="pull-left deck-caption">
                    <div class="deck-cost">{{c.card.manaCost}}</div>
                    <div style="float:left;padding: 4px">{{c.card.name}}&nbsp;x{{c.cardNum}}</div>
                </div>
                <div class="pull-right deck-pic" style="background: url('<?=$base_url.$img_path?>cards/{{c.card.name}}.png'); background-repeat: no-repeat; background-position: -85px -55px;background-size: 280%;">
                    <div class="deck-fade"></div></div>
                <div style="clear:both;"></div>
            </div>
                
                </li>
        </div>
        
    </div>
        </div>
    <div class="stats row">
        <div class="col-md-2">
             <div class="class">
                    <img src="<?=$base_url.$img_path.$class?>.jpg">
                    <h3 class="classname"><?=$class?></h3>
               </div>
        </div>
       
        
        </div>
   
  
</div>
</body>
</html>
