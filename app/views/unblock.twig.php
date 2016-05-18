<div class="container-fluid">
    
    {% include 'tabMenu.twig.php' %}
    
    <br>
    
    <div class="row">
        {{ Form.open({'action': 'dncUnblocker'}) }}
        <div class="col-md-2">
        </div> 
        
        <div class="col-md-2">
          
            <div class="form-group">
                <label>Eyebeam Number</label>                                 
                <select class="form-control input-sm" name="phoneId"> 
                    {% if Input.old('phoneId') %}                    
                        <option value="{{ Input.old('phoneId') }}">{{ Input.old('phoneId') }}</option>                     
                    {% endif %}                   
                    <option value="">SELECT</option>       
                    {% for p in 101..150 %}  
                    <option value="{{ p }}">{{ p }}</option>              
                    {% endfor %}  
                </select>
                {% if errors.first('phoneId') %}                    
                    <span class="label label-danger">{{ errors.first('phoneId') }}</span>                     
                {% endif %}
            </div>
            <div class="form-group">
                <label>Manager / Team Lead</label>
                <input class="form-control input-sm" type="text" name="managerName" value="{{ Input.old('managerName') }}">
                {% if errors.first('managerName') %}                    
                    <span class="label label-danger">{{ errors.first('managerName') }}</span>                     
                {% endif %}                
            </div>
            <div class="form-group">
                <label>Agent Name</label>
                <input class="form-control input-sm" type="text" name="agentName" value="{{ Input.old('agentName') }}">
                {% if errors.first('agentName') %}                    
                    <span class="label label-danger">{{ errors.first('agentName') }}</span>                     
                {% endif %}                
            </div>            
        </div>            
            
        <div class="col-md-3">
            
            <div class="form-group">
                <label>Unblock Phone Number(s)</label> 
                <textarea class="form-control input-sm" name="phoneNumber" style="height:200px"></textarea>
                {% if errors.first('phoneNumber') %}
                    <span class="label label-danger">{{ errors.first('phoneNumber') }}</span>
                {% endif %} 
            </div>

            <button type="submit" class="btn btn-default btn-sm">
                Unblock
            </button>
            
        </div>    
        
        <div class="col-md-3">
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
        
        
        {{ Form.close() }}
    </div>
</div>



