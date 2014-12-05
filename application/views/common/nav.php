<body ng-app="hsbuilder"  ng-controller="modalController">
    <nav class="collapse navbar-collapse bs-navbar-collapse"  role="navigation">
      <ul class="nav navbar-nav">
        <li>
            
          <a id="logo" href="/home/index"><!--<img src="<?=$base_url.$img_path?>logo.png"/>--> HearthBuilder</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a ng-click="login()"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a></li>
        <li><a ng-click="signup()"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Sign Up</a></li>
          <li><a ><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Stats</a></li>
          <li><a ><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> About</a></li>
      </ul>
    </nav>
    
    <script type="text/ng-template" id="login.html">
    <div id="modal">
        <div class="modal-header">
            <h3 class="modal-title">Login</h3>
        </div>
        <div class="modal-body">
      <form role="form">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" />
          </div>
            <div class="center">
            
                <button type="submit" class="styling-btn btn btn-default" ng-submit="submit()">Submit</button>
           
         
                <button type="submit" class="styling-btn btn btn-default" ng-click="cancel()">Cancel</button>
            
            </div>
    </form>
        </div>
      </div>
    </script>


<script type="text/ng-template" id="signup.html">
    <div id="modal">
        <div class="modal-header">
            <h3 class="modal-title">Sign Up</h3>
        </div>
        <div class="modal-body">
      <form role="form">
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" ng-model="regData.username" placeholder="Enter Username" />
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" ng-model="regData.email" placeholder="Enter email" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" ng-model="regData.password" placeholder="Password" />
          </div>
          <div class="form-group">
            <label for="password">Repeat Password</label>
            <input type="password" class="form-control" ng-model="regData.password2" placeholder="Password" />
          </div>
            <div class="center">
            
                <button type="submit" class="styling-btn btn btn-default" ng-click="submit2()">Submit</button>
           
         
                <button type="submit" class="styling-btn btn btn-default" ng-click="cancel()">Cancel</button>
                {{regData}}
                {{status}}
            </div>
    </form>
            
        </div>
      </div>
    </script>