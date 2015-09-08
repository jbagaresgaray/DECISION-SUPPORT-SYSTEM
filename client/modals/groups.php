<div class="modal fade" id="groupModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop='static'>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center">User Group Privilege</h3>
            </div>
            <div class="modal-body">
              <form role="form"  id="formchild">
                  <input type="hidden" id="id" name="id">
                  <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
                  <div class="form-group">
                      <label>Module</label>
                      <h3 class="text-primary" id="lblModule"></h3>
                  </div>
                  <div class="form-group">
                      <label>Level</label>
                      <h3 class="text-primary" id="lblLevel"></h3>
                  </div>
                  <div class="form-group">
                    <label>Permissions</label>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="checkboxRead">
                        Allow
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
