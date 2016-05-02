 
<div class="row">
    <div class="col-md-12">            
        <ul class="nav nav-tabs">
            {% if Auth.guest() %}
                <li class="active">
                  <a href="{{ URL.to('/') }}">Check DNC</a>
                </li>               
            {% else %} 
                <li {{ tabSection == 'home' ? 'class="active"' }}>
                  <a href="{{ URL.to('/') }}">Check DNC</a>
                </li>
                <li {{ tabSection == 'upload' ? 'class="active"' }}>
                  <a href="{{ URL.to('dnc/upload') }}" >Upload DNC</a>
                </li>
                <li>
                  <a href="{{ URL.to('dnc/scrub') }}">Scrub Leads</a>
                </li>
                <li>
                  <a href="{{ URL.to('lead/generate') }}">Generate Leads</a>
                </li>                
                <li class="disabled">
                  <a href="#">Settings</a>
                </li>    
                <li {{ Auth.guest() ? 'class="disabled"' }}>
                  <a href="#" >X</a>
                </li>                
            {% endif %} 
        </ul>            
    </div>    
</div>




