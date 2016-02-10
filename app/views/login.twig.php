<div class="container-fluid">
    <br><br><br>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <form role="form" method="POST" action="sessions">            
                <div class="form-group">
                    <label>User Name</label>
                    <input class="form-control input-sm" type="text" name="username" value="{{ Input.old('username') }}">
                    {% if errors.first('username') %}
                    <span class="label label-danger">{{ errors.first('username') }}  </span>
                    {% endif %}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control input-sm" type="password" name="password">
                    {% if errors.first('password') %}
                    <span class="label label-danger">{{ errors.first('password') }}  </span>
                    {% endif %}                    
                </div>             
                <button type="submit" class="btn btn-default btn-sm">
                    Submit
                </button>
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>



