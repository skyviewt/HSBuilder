
 
<script type="text/javascript" src="<?=$base_url.$js_path?>acute.select.js"></script>
 <script type="text/javascript" src="<?=$base_url.$js_path?>selection.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=$base_url.$css_path?>acute.select.css" />

<div class="start-content">
    <div class="row " ng-app="hsbuilder" ng-controller="selectionController" ng-init = "setup('<?=$class?>', '<?=$selectedCards?>')">
<div class="col-md-9" id="cardSelection">

    <div class="row content-frame">
        <div class="col-md-4 center"> 
           <!--<ac-select ac-model="myCard1" ac-options="card.name for card in cards"></ac-select>-->
            
             <select ng-model="myCard1" ng-change="evaluate(myCard1)" ng-options="card.name for card in cards">
                <option value="">-- Choose card --</option>
             </select>
                <div class="place-card" ng-show="angular.isUndefined(myCard1) || myCard1 == null">  
                      <img src="<?=$base_url.$img_path?>cards/cardback.png">
                </div>
             <a ng-click="addCard(myCard1)" ng-hide="angular.isUndefined(myCard1) || myCard1 == null">
                <div class="place-card cardclick" > 
                      <img ng-src="{{myCard1.image}}" err-src="<?=$base_url.$img_path?>cards/missing.png"/>
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
                      <img ng-src="{{myCard2.image}}" err-src="<?=$base_url.$img_path?>cards/missing.png"/>
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
                      <img ng-src="{{myCard3.image}}" err-src="<?=$base_url.$img_path?>cards/missing.png"/>
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
            <div class="col-md-4">
                <div class=" chartdiv row">
                    <li ng-repeat="i in [0,1,2,3,4,5,6,7]">
                   
                    <div class="bar pull-left col-md-1">
                            <div class="barfill" style="height:{{(manaCount[i.toString()] / 30) * 132}}px">                 
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
        <div class="col-md-5">
            <!--<ul id="effectlist" class="nav nav-pills" role="tablist">
              
              <li role="presentation"><a href="#">Messages <span class="badge">3</span></a></li>
            </ul>-->
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
                <div class="pull-right deck-pic" style="background: url('{{c.card.image}}'); background-repeat: no-repeat; background-position: -80px -80px;background-size: 280%;">
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
