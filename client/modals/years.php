<div class="modal fade" id="yearModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop='static'>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center">Year and Terms Information</h3>
            </div>
            <div class="modal-body">
              <form role="form"  id="formchild">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                      <label>Year</label>
                      <input class="form-control" name="year" id="year" placeholder="Year.." / >
                      <span class="help-inline"></span>
                  </div>
                  <div class="form-group">
                      <label>Terms</label>
                      <input class="form-control" name="terms" id="terms"placeholder="Terms.." />
                      <span class="help-inline"></span>
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
