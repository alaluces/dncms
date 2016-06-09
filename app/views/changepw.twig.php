<div class="container-fluid">
    <br><br><br>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <form role="form" method="POST" action="changepw">            
                <div class="form-group">
                    <label>Current Password</label>
                    <input class="form-control input-sm" type="password" name="currentPassword">
                    {% if errors.first('currentPassword') %}
                    <span class="label label-danger">{{ errors.first('currentPassword') }}  </span>
                    {% endif %}
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control input-sm" type="password" name="newPassword1">
                    {% if errors.first('newPassword1') %}
                    <span class="label label-danger">{{ errors.first('newPassword1') }} </span>
                    {% endif %}                    
                </div> 
                <div class="form-group">
                    <label>Re-type New Password</label>
                    <input class="form-control input-sm" type="password" name="newPassword2">
                    {% if errors.first('newPassword2') %}
                    <span class="label label-danger">{{ errors.first('newPassword2') }} </span>
                    {% endif %}                    
                </div>                
                <button type="submit" class="btn btn-default btn-sm">
                    Submit
                </button>
                {% if errors.first('changepw') %}
                <span class="label label-danger">{{ errors.first('changepw') }}</span>
                {% endif %}  
                {% if a %}
                <span class="label label-info">{{ a }}</span>  
                {% endif %}  
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>



