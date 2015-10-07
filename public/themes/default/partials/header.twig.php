<header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2" type="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DNC Management System</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-2"> 
      <ul class="nav navbar-nav navbar-right">
        {% if not Auth.guest() %}  
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Menu <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Change Password</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </li>
        {% endif %}
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>
</header>