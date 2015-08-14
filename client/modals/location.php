<div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center">Barangay Information</h3>
            </div>
            <div class="modal-body">
              <form role="form"  id="formchild">
                  <input type="hidden" id="child_id" name="id">
                  <div class="form-group">
                      <label>Barangay Name</label>
                      <input class="form-control" name="name" id="name" placeholder="First Name here" / >
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Land Area</label>
                      <input class="form-control" name="landarea" id="landarea"placeholder="Middle Name here" />
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Description</label>
                      <input class="form-control"  name="description" id="description" placeholder="Last Name here" / >
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label>X Coordinate</label>
                          <input class="form-control"  name="x_coord" id="x_coord" placeholder="Last Name here" / >
                          <span class="help-inline"></span>
                        </div>
                        <div class="col-md-4">
                          <label>Y Coordinate</label>
                          <input class="form-control"  name="y_coord" id="y_coord" placeholder="Last Name here" / >
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
