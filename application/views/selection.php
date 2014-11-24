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
    <div class="row start-content" ng-app="hsbuilder">
<div class="col-md-9 content-frame" ng-controller="selectionController">

    <div class="row">
        <div class="col-md-4 center">    
            <select ng-model="myCard1" ng-options="card.name for card in cards">
              <option value="">-- Choose card --</option>
              
            </select>
            <div class="place-card">   
                <a><img src="<?=$base_url.$img_path?>cards/{{myCard1.name}}.png"></a>
            </div>
        </div>
        
         <div class="col-md-4 center">    
            <select ng-model="myCard2" ng-options="card.name for card in cards">
              <option value="">-- Choose card --</option>
            </select>
             
              <div class="place-card">   
                <a><img src="<?=$base_url.$img_path?>cards/{{myCard2.name}}.png"></a>
            </div>
        </div>
        
         <div class="col-md-4 center">    
            <select ng-model="myCard3" ng-options="card.name for card in cards">
              <option value="">-- Choose card --</option>
            </select>
            <div class="place-card">   
                <a><img src="<?=$base_url.$img_path?>cards/{{myCard3.name}}.png"></a>
            </div>

        </div>
    
    </div>
        </div>

    <div class="col-md-3" id="deck">
        
    </div>
    
    </div>
</body>
</html>
