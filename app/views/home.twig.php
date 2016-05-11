<div class="container-fluid">
    
    {% include 'tabMenu.twig.php' %}
    
    <br>
    
    <div class="row">
        <div class="col-md-2">            
        </div>  
        <div class="col-md-4">
            
            {{ Form.open({'action': 'apiDncChecker'}) }}
                <div class="form-group">
                    <label>Enter Phone Number(s)</label>
                    <textarea class="form-control" name="phoneNumber" style="height:200px">{% for phoneNumber in phoneNumbers %}{{ phoneNumber }}&#13;&#10;{% endfor %}</textarea>
                    {% if errors.first('phoneNumber') %}     
                        <span class="label label-danger">{{ errors.first('phoneNumber') }}</span>         
                    {% endif %}                    
                </div> 
                
                <button type="submit" class="btn btn-default btn-sm">
                    Search
                </button>
            {{ Form.close() }}
        </div>
       
        <div class="col-md-4">
            {% if dncMsgs %}
                <div class="form-group">
                    <label>Result(s):</label>            
                </div>            
                {% for dncMsg in dncMsgs %}  
                    <div class="form-group">
                        <label>{{ dncMsg.phone }}</label>                   
                    {% for err in dncMsg.err %}                        
                        <span class="label label-danger">{{ err }}</span>&nbsp;                        
                    {% endfor %}  
                    {% if dncMsg.clean %}                        
                        <span class="label label-info">{{ dncMsg.clean }}</span>                        
                    {% endif %}                         
                    </div> 
                {% endfor %}
            {% endif %} 
            {% for dncError in dncErrors %}                   
                <div class="form-group">
                    <span class="label label-danger">{{ dncError }} </span>
                </div>                  
            {% endfor %}            
        </div>  
        <div class="col-md-2">
            
        </div>       
 
    </div>
</div>



