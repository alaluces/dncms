<div class="container-fluid">
    
    {% include 'tabMenu.twig.php' %}
    
    <br>
    
    <div class="row">
        
        <div class="col-md-2">
        </div>            

        <div class="col-md-4">
            
            {{ Form.open({'action': 'dncUploader'}) }}
                <div class="form-group">
                    <label>Upload Phone Number(s)</label>
                                      
                </div>

                <div class="form-group">
                    <label>Select DNC Group</label>                  
                    <select class="form-control input-sm" name="dncCampaignId"> 
                        <option value="">SELECT</option>       
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
            {% if dncMsgs %}
                <div class="form-group">
                    <label>Result(s):</label>            
                </div>            
                {% for dncMsg in dncMsgs %}  
                    <div class="form-group">
                        <label>{{ dncMsg }}</label>   
                    </div> 
                {% endfor %} 

            {% endif %}             
        
        </div>
        
        <div class="col-md-2">
        </div>         
 
    </div>
</div>



