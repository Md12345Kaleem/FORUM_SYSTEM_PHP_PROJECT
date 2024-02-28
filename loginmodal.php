<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
          <div class="modal-dialog" role="document">
                    <div class="modal-content">
                              <div class="modal-header">
                                        <h5 class="modal-title" id="loginmodal">Login to iDiscuss</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                        </button>
                              </div>
                              <div class="modal-body">

                                        <form action="handlelogin.php" method="POST">
                                                  <div class="form-group">
                                                            <label for="loginEmail">Username</label>
                                                            <input type="text" class="form-control"
                                                            for="loginEmail"  name="loginEmail"
                                                                      aria-describedby="emailHelp"
                                                                      placeholder="Enter email">
                                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll
                                                                      never share your email with anyone else.</small> -->
                                                  </div>
                                                  <div class="form-group">
                                                            <label for="exampleInputPassword1">Password</label>
                                                            <input type="password" class="form-control"
                                                                      id="loginPass" name="loginPass" placeholder="Password">
                                                  </div>
                                                  <!-- <div class="form-group form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                      id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Check me
                                                                      out</label>
                                                  </div> -->
                                                  <button type="submit" class="btn btn-primary">Submit</button>
                              

                              </div>
                              <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                  data-dismiss="modal">Close</button>
                              </div>

                              </form>  
                    </div>
          </div>
</div>