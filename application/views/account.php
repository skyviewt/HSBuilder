<script type="text/javascript" src="<?=$base_url.$js_path?>account.js"></script>

<div class="container" ng-controller="accountController" ng-init="setup('<?=$user_id?>')">
    <div class="classname">
<?php 
    if(isset($username)) {
            echo '<h2>Welcome, <span class="username"> '. $username.' </span> !</h2>';
            }else {
        echo '<h2>Welcome</h2>';
        
}?>
        
    </div>
    
    <div class="row">
       <div class="col-md-3 runcontainer" ng-repeat="r in runs">
                   <a ng-href="/home/selection?class=mage&cards={{r.cards}}">

            <div class="classimgdiv center" ng-if="r.wins == 0 || r.wins == null">
                <img class="medal" src="<?=$base_url.$img_path?>hearthstone1.png"/>
            </div>
            <div class="classimgdiv center"  ng-if="(r.wins < 2) && (r.wins > 0)">
                <img class="medal" src="<?=$base_url.$img_path?>NoviceMedal.png"/>
            </div>
            <div class="classimgdiv center" ng-if="r.wins == 2">
                <img class="medal" src="<?=$base_url.$img_path?>JourneymanMedal.png"/>
            </div>
            <div class="classimgdiv center" ng-if="r.wins == 3">
                <img class="medal" src="<?=$base_url.$img_path?>CopperMedal.png"/>
            </div>
            <div class="classimgdiv center" ng-if="r.wins == 4">
                <img class="medal" src="<?=$base_url.$img_path?>SilverMedal.png"/>
            </div>
            <div class="classimgdiv center" ng-if="r.wins == 5">
                <img class="medal" src="<?=$base_url.$img_path?>GoldMedal.png"/>
            </div>
            <div class="classimgdiv center"  ng-if="r.wins == 6">
                <img class="medal" src="<?=$base_url.$img_path?>PlatinumMedal.png"/>
            </div>
            <div class="classimgdiv center"  ng-if="(r.wins >= 7) && (r.wins < 10)">
                <img class="medal" src="<?=$base_url.$img_path?>DiamondMedal.png"/>
            </div>
            
            <div class="classimgdiv center"  ng-if="(r.wins == 10) || (r.wins == 11)">
                <img class="medal" src="<?=$base_url.$img_path?>MasterMedal.png"/>
            </div>
            
            <div class="classimgdiv center"  ng-if="(r.wins == 12) && (r.wins != 0)">
                <img class="medal" src="<?=$base_url.$img_path?>MasterMedal.png"/>
            </div>
           
            <div class="classimgdiv center"  ng-if="(r.wins == 12) && (r.losses == 0) ">
                <img class="medal" src="<?=$base_url.$img_path?>CrownMedal.png"/>
            </div>
                        </a>
            <h4 class="runtitle">{{r.name}}</h4>
            <form role="form">
                <div class="form-group number-group center">
                    <div class="row winloss-group">
                        <div class="col-md-4">
                            <label >Win:</label>
                        </div>
                        <div class="col-md-8">
                            <input class="winloss-input" type="number" min="0" max="12" ng-model="parse(r.wins)" name="{{r.run_id}}" class="form-control"/>

                        </div>

                    </div>
                    
                    <div class="row winloss-group">
                        <div class="col-md-4">
                            <label >Loss:</label>
                        </div>
                        <div class="col-md-8">
                            <input class="winloss-input" type="number" min="0" max="3" ng-model="parse(r.losses)" name="{{r.run_id}}" class="form-control"/>

                        </div>

                    </div>
                   <!-- will implement update later -->
                   <!-- <button class="updateBtn">Update</button> -->
                </div>
                
        </form>

        </div>
        
       
              
         
    </div>
    
</div>