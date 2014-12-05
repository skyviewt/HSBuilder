<script type="text/javascript" src="<?=$base_url.$js_path?>account.js"></script>
<script type="text/javascript" src="<?=$base_url.$js_path?>jquery.bootstrap-touchspin.js"></script>

<div class="container" ng-controller="accountController">
    <div class="greeter">
        <h2>Welcome {{ username }}</h2>
    </div>

    <div class="row">
        <div class="col-md-3 runcontainer" ng-repeat="r in runs">
            {{r}}
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
            
            <div class="classimgdiv center"  ng-if="(r.wins >= 10) && (r.wins <= 12) &&( (r.wins == 12) && (r.losses != 0) )">
                <img class="medal" src="<?=$base_url.$img_path?>MasterMedal.png"/>
            </div>
           
            <div class="classimgdiv center"  ng-if="(r.wins == 12) && (r.losses == 0) ">
                <img class="medal" src="<?=$base_url.$img_path?>CrownMedal.png"/>
            </div>
            
            <form role="form">
                <div class="form-group">
                    <input id="{{r.run_id}}" type="text" ng-model="r.wins" name="{{r.run_id}}" class="col-md-8 form-control">
                </div>
        </form>

        <script>
            $("input[name='{{r.run_id}}']").TouchSpin({
                min: 0,
                max: 12,
                
                verticalbuttons: true,
      verticalupclass: 'glyphicon glyphicon-plus',
      verticaldownclass: 'glyphicon glyphicon-minus'
            });
        </script>
              
         
          
        </div>
    </div>
    
</div>
