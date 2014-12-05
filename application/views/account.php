<script type="text/javascript" src="<?=$base_url.$js_path?>account.js"></script>
<div class="container">
    <div class="greeter">
        <h2>Welcome {{ username }}</h2>
    </div>

    <div class="row">
        <div class="col-md-3 runcontainer" ng-repeat="i in [0,1,2,3,4,5,6,7]">
            <img class="medal" src="/assets/img/NoviceMedal.png"/>
            <input type="text" class="form-control winloss" placeholder="win">
            <input type="text" class="form-control winloss" placeholder="loss">
            <button type="button" class="form-control btn btn-default">Submit</button>
        </div>
    </div>
    
</div>
