<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12">            
            <ul class="nav nav-tabs">
                {% if Auth.guest() %}
                    <li class="active">
                      <a href="{{ URL.to('/') }}">Check DNC</a>
                    </li>               
                {% else %} 
                    <li class="active">
                      <a href="{{ URL.to('/') }}">Check DNC</a>
                    </li>                 
                    <li {{ Auth.guest() ? 'class="disabled"' }}>
                      <a href="#" >Upload DNC</a>
                    </li>
                    <li>
                      <a href="#">Scrub Leads</a>
                    </li>
                    <li>
                      <a href="#">Generate Leads</a>
                    </li>                
                    <li class="disabled">
                      <a href="#">Settings</a>
                    </li>               
                {% endif %} 
            </ul>            
        </div>    
    </div>
    
    <br>
    
    <div class="row">

        <div class="col-md-4">
            
            {{ Form.open({'action': 'dncApiChecker'}) }}
                <div class="form-group">
                    <label>Enter Phone Number(s)</label>
                    <textarea class="form-control" name="phoneNumber" style="height:200px">{% for phoneNumber in phoneNumbers %}{{ phoneNumber }}&#13;&#10;{% endfor %}</textarea>
                </div>
                {% for dncError in dncErrors %} 
                    {% if dncError.first('phoneNumber') %}
                    <div class="form-group">
                        <span class="label label-danger">{{ dncError.first('phoneNumber') }} </span>
                    </div>    
                    {% endif %}
                {% endfor %}
             
                <button type="submit" class="btn btn-default btn-sm">
                    Submit
                </button>
            {{ Form.close() }}
        </div>
       <div class="col-md-4">

        </div>        
        <div class="col-md-4">
            {% if dncMatchMsgs or dncNoMatchMsgs %}
                <div class="form-group">
                    <label>Results</label>            
                </div>            
                {% for dncMatchMsg in dncMatchMsgs %}            
                    <div class="form-group">
                        <span class="label label-danger">{{ dncMatchMsg }} </span>
                    </div>             
                {% endfor %} 
                {% for dncNoMatchMsg in dncNoMatchMsgs %}            
                    <div class="form-group">
                        <span class="label label-info">{{ dncNoMatchMsg }} </span>
                    </div>             
                {% endfor %}  
            {% endif %} 
        </div>        
 
    </div>
</div>



