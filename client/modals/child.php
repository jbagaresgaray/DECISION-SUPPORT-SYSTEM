<div class="modal fade" id="childModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center">Child Information</h3>
            </div>
            <div class="modal-body">
              <form role="form"  id="formchild">
                  <input type="hidden" id="child_id" name="child_id">
                  <div class="form-group">
                      <label>First Name</label>
                      <input class="form-control" name="fname" id="fname" placeholder="First Name here" / >
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Middle Name</label>
                      <input class="form-control" name="mname" id="mname"placeholder="Middle Name here" />
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Last Name</label>
                      <input class="form-control"  name="lname" id="lname" placeholder="Last Name here" / >
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Address</label>
                      <input class="form-control" name="address" id= "address" placeholder="Complete Address here" / >
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Barrangay</label>
                      <select class="form-control" name="location" id= "location">
                        <option value="1"> barangay1</option>
                        <option value="2"> barangay2</option>
                      </select>
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <div class='input-group date' id='datetimepicker2'>
                        <input type='text' class="form-control" name="date" id="date"/>
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row">
                      <div class="col-md-4">
                          <label>Heigth</label>
                          <input class="form-control" name="height" id="height" placeholder="Height" />
                          <span class="help-inline"></span>
                      </div>
                      <div class="col-md-4">
                          <label>Weigth</label>
                          <input class="form-control" name="weight" id="weight" placeholder="Weight" />
                          <span class="help-inline"></span>
                      </div>
                       <div class="col-md-4">
                          <label>Months</label>
                          <input class="form-control" name="month" id="month" placeholder="Number of months" />
                          <span class="help-inline"></span>
                      </div>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label>Gender:</label>
                      <div class="radio">
                          <label>
                              <input type="radio" name="gender" id="gender" value="Male" checked />Male
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                              <input type="radio" name="gender" id="gender" value="Female" />Female
                          </label>
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
