<?php require_once (__DIR__ . "/../include/functions.php"); ?>  
<?php require_once (__DIR__ . "/../business/forumPageDAO.php"); ?>  
<?php require_once (__DIR__ . "/../business/userDAO.php"); ?>  

 <!-- Log in Modal  -->
 <!-- TO DO mysqlPrepare() in action for form -->
    <div id="loginModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-xs-center">Log in</h4>
                </div>
                <div class="modal-body">

                      <form role="form" method="POST" action="business/login.php" enctype="multipart/form-data">
                        <br>
                        <div class="form-group row">
                        <label for="inputEmail" class="col-sm-1 col-form-label" class="icon-for-login">&#xf007;</label> <!-- label: email -->
                            <div class="col-sm-11">
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="name@example.com">
                            </div> <!-- ./ col-sm-11 -->
                        </div> <!-- ./ form-group row -->
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label" class="icon-for-login">&#xf023;</label> <!-- label: password -->
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
                    Don't have an account? &nbsp;<a href="presentation/signUp_form.php">Sign up</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<!-- NAVBAR -->
<div class="navbar-body">
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" class="home" href="presentation/home.php"> BOARDGAME FORUM <span class="sr-only">(current)</span></a>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!-- left -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php $forumPageInfos = getPages();
                foreach ($forumPageInfos as $page) { ?>
            <li class="nav-item">
                <a class="nav-link" class="a link" href="presentation/forumPage.php?forumPageID=<?php echo $page['id']?>"> <?php echo $page['name']?></a>
            </li>
                <?php } ?>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Overview
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="presentation/categoryOverview.php">Categories</a>
                        <a class="dropdown-item" href="presentation/newestPostsOverview.php">New Discussions</a>
                        <a class="dropdown-item" href="presentation/hotPostsOverview.php">Hot Discussions</a>
        </ul>
      
        <!-- right -->
        <ul class="nav navbar-nav navbar-right"> 
            <li class="nav-item">
                <?php echo visableUnvisableAdminSwitch() ?>
            </li>  
            <li class="nav-item">
                <?php echo myprofileSwitch()?>
            </li>
            <li class="nav-item">
                <?php echo loginLogoutButtonSwitch(); ?>
            </li>
        </ul>

       

      </form>
    </div>
  </nav>
  </div> <!-- ./ navbar-body -->