<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12">            
            <ul class="nav nav-tabs">
                {% if Auth.guest() %}
                    <li class="active">
                      <a href="#">Check DNC</a>
                    </li>               
                {% else %} 
                    <li class="active">
                      <a href="#">Check DNC</a>
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
    
    <br><br><br>
    
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <form role="form" method="POST" action="dnc/check">
                <div class="form-group">
                    <label>Enter Phone Number(s)</label>
                    <textarea class="form-control" name="phoneNumber">{{ phoneNumber }}</textarea>
                </div>
                {% if errors.first('phoneNumber') %}
                <span class="label label-danger">{{ errors.first('phoneNumber') }} </span><br>
                {% endif %}
             
                <button type="submit" class="btn btn-default btn-sm">
                    Submit
                </button>
            </form>
        </div>
        <div class="col-md-4">
            {{ msg }}
        </div>
    </div>
</div>



