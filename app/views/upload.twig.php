<div class="container-fluid">
    
    {% include 'tabMenu.twig.php' %}
    
    <br>
    
    <div class="row">
        
        <div class="col-md-2">
        </div>            
            {{ Session.get('test') }}
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
                    {% if errors.first('dncCampaignId') %}                    
                        <span class="label label-danger">{{ errors.first('dncCampaignId') }}</span>                     
                    {% endif %}
                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="addToVicidialDnc">
                            Add to Vicidial DNC
                        </label>
                    </div>
                </div>
                <div class="form-group">                    
                    <textarea class="form-control input-sm" name="phoneNumber" style="height:200px"></textarea>
                    {% if errors.first('phoneNumber') %}
                        <span class="label label-danger">{{ errors.first('phoneNumber') }}</span>
                    {% endif %} 
                </div>
             
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
                    <label>{{ dncMsg.phoneNumber }}</label>
                    {% if dncMsg.err %}                        
                        <span class="label label-danger">{{ dncMsg.err }}</span>                        
                    {% endif %}               
                    {% if dncMsg.msg %}                        
                        <span class="label label-info">{{ dncMsg.msg }}</span>                        
                    {% endif %}
                    </div>
                {% endfor %}
            {% endif %}             
        
        </div>
        
        <div class="col-md-2">
        </div>         
 
    </div>
</div>



