<?php require_once ("../include/functions.php"); ?>  

 <!-- Log in Modal  -->
    <div id="loginModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-xs-center">Log in</h4>
                </div>
                <div class="modal-body">

                      <form role="form" method="POST" action="http://localhost:41062/www/Forum/user/login.php" enctype="multipart/form-data">
                        <br>
                        <div class="form-group row">
                        <label for="inputEmail" class="col-sm-1 col-form-label">&#xf007;</label> <!-- label: email -->
                            <div class="col-sm-11">
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="name@example.com">
                            </div> <!-- ./ col-sm-11 -->
                        </div> <!-- ./ form-group row -->
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">&#xf023;</label> <!-- label: password -->
                            <div class="col-sm-11">
                                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="your password">
                            </div> <!-- ./ col-sm-11 -->
                        </div> <!-- ./ form-group row -->

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
                    Don't have an account? &nbsp;<a href="http://localhost:41062/www/Forum/user/signUp_form.php">Sign up</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<!-- NAVBAR -->
<div class="navbar-body">
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" class="home" href="http://localhost:41062/www/Forum/presentation/home.php"> BOARDGAME FORUM <span class="sr-only">(current)</span></a>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!-- left -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" class="a link" href="#"> About </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" class="log-out" href="#">Rules</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" class="my-profile" href="http://localhost:41062/www/Forum/user/user_profile_html.php">My profile</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div> 
      </ul>
      
      <!-- right -->
      <ul class="nav navbar-nav navbar-right"> 
        <li class="nav-item">
            <?php echo login_logout_button_switch(); ?>
      </ul>

      </form>
    </div>
  </nav>
  </div> <!-- ./ navbar-body -->