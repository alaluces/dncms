<div class="container-fluid">
    
    {% include 'tabMenu.twig.php' %}
    
    <br>
    
    <div class="row">
        
        <div class="col-md-2">
        </div>            

        <div class="col-md-4">
            
            {{ Form.open({'action': 'apiDncChecker'}) }}
                <div class="form-group">
                    <label>Upload Phone Number(s)</label>
                                      
                </div>

                <div class="form-group">
                    <label>Select DNC Group</label>                  
                    <select class="form-control input-sm" name=""> 
                        {% for c in campaigns %}  
                        <option value="{{ c.campaign_id }}">{{ c.campaign_id }}-{{ c.campaign_name }}</option>              
                        {% endfor %}  
                    </select>
                </div>
                <div class="form-group">
                    
                    <textarea class="form-control input-sm" name="phoneNumber" style="height:200px">{% for phoneNumber in phoneNumbers %}{{ phoneNumber }}&#13;&#10;{% endfor %}</textarea>
                </div>

                {% if errors.first('phoneNumber') %}
                <div class="form-group">
                    <span class="label label-danger">{{ errors.first('phoneNumber') }} </span>
                </div>    
                {% endif %} 
                
                <button type="submit" class="btn btn-default btn-sm">
                    Upload
                </button>
            {{ Form.close() }}
        </div>    
        
        <div class="col-md-4">
        
        </div>
        
        <div class="col-md-2">
        </div>         
 
    </div>
</div>



