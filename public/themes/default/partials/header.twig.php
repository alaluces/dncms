<header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2" type="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL.to('/') }}">DNC Management System</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-2"> 
      
        {% if (Auth.guest()) %}        
            <div class="navbar-right">        
                <a href="{{ URL.to('login') }}" class="btn btn-default navbar-btn">
                    Login
                </a>
            </div>
        {% else %}        
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Menu <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ URL.to('changepw') }}">Change Password</a></li>
                <li><a href="{{ URL.to('logout') }}">Logout</a></li>
              </ul>
            </li>       
             </ul>        
        {% endif %}
     
    </div><!-- /.navbar-collapse -->
  </div>
</nav>
</header>