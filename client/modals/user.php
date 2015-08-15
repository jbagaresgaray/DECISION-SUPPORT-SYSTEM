<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center">User Account Information</h3>
            </div>
            <div class="modal-body">
              <form role="form"  id="formchild">
                  <input type="hidden" id="user_id" name="user_id">
                  <div class="form-group">
                      <label>First Name</label>
                      <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name" / >
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Last Name</label>
                      <input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name" / >
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" type="email" name="email" id= "email" placeholder="Email Address" / >
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Mobile No.</label>
                      <input class="form-control" type="text" name="mobileno" id="mobileno" placeholder="Mobile No." / >
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Level:</label>
                      <select class="form-control" name="level" id= "level">
                        <option value="admin"> Admin</option>
                        <option value="user"> User</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" />
                            <span class="help-inline"></span>
                        </div>
                        <div class="col-md-4">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
                            <span class="help-inline"></span>
                        </div>
                        <div class="col-md-4">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm Password" />
                            <span class="help-inline"></span>
                        </div>
                      </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
                <a id="btn-save" class="btn btn-primary" onclick="save()">Submit</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
