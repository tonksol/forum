 <!-- Log in Modal  -->
    <div id="loginModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-xs-center">Log in</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="http://localhost:41062/www/Forum/user/login.php" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <div>
                                <input type="email" class="form-control input-lg" name="email" id="inputEmail" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div>
                                <input type="password" class="form-control input-lg" name="password" id="inputPassword" placeholder="your password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <a class="btn btn-link" href="">Forgot Your Password?</a>
                                <button type="submit" class="btn btn-info modalForm" name="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-xs-center">
                    Don't have an account? <a href="http://localhost:41062/www/Forum/user/signUp_form.php">Sign up »</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" class="home" href="http://localhost:41062/www/Forum/home.php"> Boardgame Forum <span class="sr-only">(current)</span></a>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!-- left -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" class="a link" href="#"> Unknown </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" class="log-out" href="#">Unknown2</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div> 
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
      </ul>
      
      <!-- right -->
      <ul class="nav navbar-nav navbar-right"> 
        <li class="nav-item">
            <?php echo login_logout_button_switch(); ?>
      </ul>

      </form>
    </div>
  </nav>