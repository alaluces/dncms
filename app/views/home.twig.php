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
            
            {{ Form.open({'action': 'apiDncChecker'}) }}
                <div class="form-group">
                    <label>Enter Phone Number(s)</label>
                    <textarea class="form-control" name="phoneNumber" style="height:200px">{% for phoneNumber in phoneNumbers %}{{ phoneNumber }}&#13;&#10;{% endfor %}</textarea>
                </div>
                {% if errors.first('phoneNumber') %}
                <div class="form-group">
                    <span class="label label-danger">{{ errors.first('phoneNumber') }} </span>
                </div>    
                {% endif %} 
                
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
            {% for dncError in dncErrors %}                   
                <div class="form-group">
                    <span class="label label-danger">{{ dncError }} </span>
                </div>                  
            {% endfor %}            
        </div>        
 
    </div>
</div>



