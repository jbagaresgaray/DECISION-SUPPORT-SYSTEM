<div class="modal fade" id="childModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop='static'>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center">Child Information</h3>
            </div>
            <div class="modal-body">
              <form role="form"  id="formchild">
                  <input type="hidden" id="child_id" name="child_id">
                  <div class="form-group">
                      <label>Years / Terms</label>
                      <select class="form-control" name="cboyears" id= "cboyears"></select>
                      <span class="help-inline"></span>
                  </div>
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
                      <div class="row">
                        <div class="col-md-4">
                          <label>Gender:</label>
                          <select class="form-control" name="gender" id= "gender">
                            <option value="Male"> Male</option>
                            <option value="Female"> Female</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label>Barangay</label>
                          <select class="form-control" name="location" id= "location"></select>
                          <span class="help-inline"></span>
                        </div>
                        <div class="col-md-4">
                          <label>Date of Birth</label>
                          <input type='date' class="form-control" name="date" id="date"/>
                          <span class="help-inline"></span>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                            <label>Height</label>
                            <input class="form-control" name="height" id="height" placeholder="Height" />
                            <span class="help-inline"></span>
                        </div>
                        <div class="col-md-4">
                            <label>Weight</label>
                            <input class="form-control" name="weight" id="weight" placeholder="Weight" />
                            <span class="help-inline"></span>
                        </div>
                         <div class="col-md-4">
                            <label>Months</label>
                            <input class="form-control" name="month" id="month" value="0"/>
                            <span class="help-inline"></span>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Status</label>
                      <h2 id="lblStatus" class="text-uppercase danger"></h2>
                      <input type="hidden" id="status_id" name="status_id">
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
