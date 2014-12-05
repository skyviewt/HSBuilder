<script type="text/javascript" src="<?=$base_url.$js_path?>account.js"></script>

<div class="container" ng-controller="accountController">
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
                   <a href="/home/selection?class=mage&cards=9,9,9,146,146,72,250,662,66,66,66,66,66,713,713,462,716,390,246,593,74,74,74,74,76,205,205,35,297,606">

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
            <h4 class="runtitle">Run {{r.run_id}}</h4>
            <form role="form">
                <div class="form-group number-group center">
                    <div class="row winloss-group">
                        <div class="col-md-4">
                            <label >Win:</label>
                        </div>
                        <div class="col-md-8">
                            <input class="winloss-input" type="number" min="0" max="12" ng-model="r.wins" name="{{r.run_id}}" class="form-control"/>

                        </div>

                    </div>
                    
                    <div class="row winloss-group">
                        <div class="col-md-4">
                            <label >Loss:</label>
                        </div>
                        <div class="col-md-8">
                            <input class="winloss-input" type="number" min="0" max="3" ng-model="r.losses" name="{{r.run_id}}" class="form-control"/>

                        </div>

                    </div>
                   <button class="updateBtn">Update</button>
                </div>
                
        </form>

        </div>
        
       
              
         
    </div>
    
</div>