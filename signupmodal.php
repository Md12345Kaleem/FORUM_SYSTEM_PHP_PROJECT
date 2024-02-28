<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupmodal">Signup for an iDiscuss Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="handleSignup.php" method="POST">
                                                  <div class="form-group">
                                                            <label for="exampleInputEmail1">Username</label>
                                                          
                                                            <input type="text" class="form-control"
                                                                      id="signupEmail" name="signupEmail"
                                                                      aria-describedby="emailHelp"
                                                                      placeholder="Enter email">
                                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll
                                                                      never share your email with anyone else.</small> -->
                                                  </div>
                                                  <div class="form-group">
                                                            <label for="exampleInputPassword1">Password</label>
                                                            <input type="password" class="form-control"
                                                                      id="password" name="signupPassword" placeholder="Password">
                                                  </div>
                                                  <div class="form-group">
                                                            <label for="exampleInputPassword1">Confirm Password</label>
                                                            <input type="password" class="form-control"
                                                                      id="cpassword" name="signupcPassword" placeholder="Password">
                                                  </div>
                                                
                                                  <button type="submit" class="btn btn-primary">Signup</button>
                              

                              </div>
                              <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                  data-dismiss="modal">Close</button>
                              </div>

                              </form> 
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>