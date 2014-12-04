
 

<div class="start-content">
    <div class="row"  ng-controller="selectionController" ng-init = "setup('<?=$class?>', '<?=$selectedCards?>')">
<div class="col-md-9" id="cardSelection">

    <div class="row content-frame">
        <div class="col-md-4 center cardpick"> 
      
         <ui-select ng-change="evaluate(card1.selected, 1)" class="ui-select" ng-model="card1.selected" >
            <ui-select-match placeholder="Select or search a card...">{{$select.selected.name}}</ui-select-match>
             <ui-select-choices repeat="card1 in cards | propsFilter: {name: $select.search}">
               <span ng-bind-html="card1.name | highlight: $select.search"></span>
             </ui-select-choices>
         </ui-select>
             
                   <div class="place-card cardback" ng-show="angular.isUndefined(card1.selected) || card1.selected == null">  
                      <img src="<?=$base_url.$img_path?>cards/cardback.png">
                  </div>
             <a ng-click="addCard(card1.selected, value1)" ng-hide="angular.isUndefined(card1.selected) || card1.selected == null">
                  <div class="place-card cardclick" > 
                      <img ng-src="{{card1.selected.image}}" err-src="<?=$base_url.$img_path?>cards/missing.png"/>
                </div>
            </a>
            <h4>Value: <span ng-if="value1 > 0">{{value1}}</span></h4>
            
        </div>
        
         <div class="col-md-4 center cardpick">    
            <ui-select ng-change="evaluate(card2.selected, 2)" class="ui-select" ng-model="card2.selected">
            <ui-select-match placeholder="Select or search a card...">{{$select.selected.name}}</ui-select-match>
             <ui-select-choices repeat="card2 in cards | propsFilter: {name: $select.search}">
               <span ng-bind-html="card2.name | highlight: $select.search"></span>
             </ui-select-choices>
         </ui-select>
              
                   <div class="place-card cardback" ng-show="angular.isUndefined(card2.selected) || card2.selected == null">  
                      <img src="<?=$base_url.$img_path?>cards/cardback.png">
                  </div>
             <a ng-click="addCard(card2.selected, value2)" ng-hide="angular.isUndefined(card2.selected) || card2.selected == null">
                  <div class="place-card cardclick" > 
                      <img ng-src="{{card2.selected.image}}" err-src="<?=$base_url.$img_path?>cards/missing.png"/>
                </div>
            </a>
             <h4>Value: <span ng-if="value2 > 0">{{value2}}</span></h4>
        </div>
        
         <div class="col-md-4 center cardpick">    
            <ui-select ng-change="evaluate(card3.selected, 3)" class="ui-select" ng-model="card3.selected">
            <ui-select-match placeholder="Select or search a card...">{{$select.selected.name}}</ui-select-match>
             <ui-select-choices repeat="card3 in cards | propsFilter: {name: $select.search}">
               <span ng-bind-html="card3.name | highlight: $select.search"></span>
             </ui-select-choices>
         </ui-select>
                
                   <div class="place-card cardback" ng-show="angular.isUndefined(card1.selected) || card3.selected == null">  
                      <img src="<?=$base_url.$img_path?>cards/cardback.png">
                  </div>
             <a ng-click="addCard(card3.selected, value3)" ng-hide="angular.isUndefined(card3.selected) || card3.selected == null">
                  <div class="place-card cardclick" > 
                      <img ng-src="{{card3.selected.image}}" err-src="<?=$base_url.$img_path?>cards/missing.png"/>
                </div>
            </a>
             <h4>Value: <span ng-if="value3 > 0">{{value3}}</span></h4>
             <div ng-switch="value3">
                  <p ng-switch-when="value3<10 && value3>0">Horrible</p>
                  <p ng-switch-when="value3<25 && value3>=10">Bad</p>                  
                  <p ng-switch-when="value3<40 && value3>=25">Mediocre</p>                  
                  <p ng-switch-when="value3<50 && value3>=40">Average</p>    
                  <p ng-switch-when="value3<70 && value3>=50">Above Average</p>
                 <p ng-switch-when="value3<80 && value3>=70">Good</p>
                 <p ng-switch-when="value3<85 && value3>=80">Great</p>
                 <p ng-switch-when="value3>=85">Excellent!</p>
                </div>
        </div>
    
    </div>
    <div class="stats row">
        <div class="col-md-3">
             <div class="class">
                    <img src="<?=$base_url.$img_path.$class?>.jpg">
                    <h3 class="classname"><?=$class?></h3>
               </div>
             </div>
            <div class="col-md-4">
                <div class=" chartdiv row">
                    <li ng-repeat="i in [0,1,2,3,4,5,6,7]">
                   
                    <div class="bar pull-left col-md-1">
                            <div class="barfill" style="height:{{ manaCount[i.toString()] / 30  * 140 }}px">                 
                                     <p ng-if="manaCount[i.toString()]!==0">{{manaCount[i.toString()]}}</p>
  
                            </div> 
                        
                        </div> 
                        
                         </li>
             
                </div>
                <div class="row">
                    <li ng-repeat="j in [0,1,2,3,4,5,6,7]">
                   
                    <div class="manaCost pull-left col-md-1">
                        <p ng-if="j<7">{{j}}</p>
                        <p ng-if="j>=7">{{j}}+</p>
                        </div>
                        
                         </li>
             
                </div>
                
                
            </div>
        <div class="col-md-5" id="effectcol">
            <h4 >Card Effects</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-7 no-padding"><p>Battlecry: </p></div>
                        <div class="col-md-5 pull-left no-padding"><span class="badge">{{effects.battlecry}}</span></div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-7 no-padding"><p>Taunt: </p></div>
                        <div class="col-md-5 pull-left no-padding"><span class="badge">{{effects.taunt}}</span></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-7  no-padding"><p>Charge: </p></div>
                        <div class="col-md-5 pull-left no-padding"><span class="badge">{{effects.charge}}</span></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-7  no-padding"><p>Deathrattle: </p></div>
                        <div class="col-md-5 pull-left no-padding"><span class="badge">{{effects.deathrattle}}</span></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-7  no-padding"><p>Enrage: </p></div>
                        <div class="col-md-5 pull-left no-padding"><span class="badge">{{effects.enrage}}</span></div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-7 no-padding"><p>Overload: </p></div>
                        <div class="col-md-5 pull-left no-padding"><span class="badge">{{effects.overload}}</span></div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-7 no-padding"><p>Stealth: </p></div>
                        <div class="col-md-5 pull-left no-padding"><span class="badge">{{effects.stealth}}</span></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-7  no-padding"><p>Windfury: </p></div>
                        <div class="col-md-5 pull-left no-padding"><span class="badge">{{effects.windfury}}</span></div>
                    </div>
                </div>
               <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-7  no-padding"><p>SpellDmg: </p></div>
                        <div class="col-md-5 pull-left no-padding"><span class="badge">{{effects['spell damage']}}</span></div>
                    </div>
                </div>
               
                
            </div>
        </div>
        
        </div>
    </div>
    
    <div class="col-md-3" >
        <div  id="deckdiv">
            <div id="deckcount">
                <p>Deck: <span>{{count}}</span> / 30 cards</p>
                <p>Total Value: <span>{{totalValue}}</span></p>
            </div>
            <li ng-repeat="c in selectedCards">
            <div class="deck screenshot">
                <div class="pull-left deck-caption">
                    <div class="deck-cost">{{c.card.cost}}</div>
                    <div style="float:left;padding: 4px">{{c.card.name}}&nbsp;x{{c.cardNum}}</div>
                </div>
                <div class="pull-right deck-pic" style="background: url('{{c.card.image}}'); background-position: -75px -100px; background-size: 260%;">
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
   