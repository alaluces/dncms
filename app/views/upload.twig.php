<div class="container-fluid">
    
    {% include 'tabMenu.twig.php' %}
    
    <br>
    
    <div class="row">

        <div class="col-md-4">
            
            {{ Form.open({'action': 'apiDncChecker'}) }}
                <div class="form-group">
                    <label>Upload Phone Number(s)</label>
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



