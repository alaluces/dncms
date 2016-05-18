 
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
                <li {{ tabSection == 'unblock' ? 'class="active"' }}>
                  <a href="{{ URL.to('dnc/unblock') }}" >Unblock DNC</a>                
                </li>                
                <!--  
                <li class="disabled" >
                  <a href="{{ Auth.guest() ? '#' : URL.to('dnc/scrub') }}" disabled='disabled'>Scrub Leads</a>
                </li>
                
                <li class="disabled">
                  <a href="{{ URL.to('lead/generate') }}">Generate Leads</a>
                </li> 
                
                <li class="disabled">
                  <a href="#">Settings</a>
                </li> 
                -->
                <li {{ Auth.guest() ? 'class="disabled"' }}>
                  <a href="#" >?</a>
                </li>                
            {% endif %} 
        </ul>            
    </div>    
</div>




