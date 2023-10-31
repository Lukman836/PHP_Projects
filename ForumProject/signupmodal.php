<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabel">Sign Up</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Training/PHP/17-10-23/ForumProject/handlesignupmodal.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">User name</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your Name with anyone else.</div>
                        <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                        <!-- <input type="email" name="email" class="form-control" id="exampleInputEmail1" required
                            aria-describedby="emailHelp"> -->
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" required name="password" class="form-control" maxlength="15" id="password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" required id="cpassword">
                        <div id="emailHelp" class="form-text">Please add same password as above.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary my-3">Signup</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
