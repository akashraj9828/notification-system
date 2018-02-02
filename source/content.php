
<body class="w3-theme-l5">

    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"
                href="javascript:void(0);" onclick="openNav()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large ">
                <i class="fa fa-home w3-margin-right"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News">
                <i class="fa fa-globe"></i>
            </a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings">
                <i class="fa fa-user"></i>
            </a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages">
                <i class="fa fa-envelope"></i>
            </a>
            <div class="w3-dropdown-hover">
                <button class="w3-button w3-padding-large" title="Notifications">
                    <i class="fa fa-bell"></i>

            <!-- Notification drop down + badge here -->
           <?php
                $user_uid=$_SESSION['u_uid'];
                $sql2="SELECT posted_by_uid,comment_user_first,comment_user_last,comment_time
                        FROM `comments` 
                        WHERE posted_by_uid='".$user_uid."'
                        ORDER BY comment_time DESC
                        LIMIT 5";
                $notifications=0;                
                $result=mysqli_query($conn, $sql2);
                if($result){
                    $resultCheck = mysqli_num_rows( $result );
                   $notifications=$resultCheck;
                    echo '<span class="w3-badge w3-right w3-small w3-green ">'.$resultCheck.'</span>
                            </button>
                            <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">';
                         
                    if($notifications < 1){
                       echo ' <a href="#" class="w3-bar-item w3-button">No Ntifications</a>';
                    }else{
                         while($row=mysqli_fetch_assoc( $result )){
                            $comment_user_first=$row['comment_user_first'];
                            $comment_user_last=$row['comment_user_last'];
                            $comment_time=$row['comment_time'];
                            $time=strtotime($comment_time );

                            echo ' <a class="w3-bar-item w3-button w3-blue" style="text-transform: capitalize"><h5 ><b>'.$comment_user_first.' '.$comment_user_last.' </b>Commented on Your post on '.date("F j, Y  g:i a", $time ).'</h5>
                                    </a>';
                        }
                    }
                }else {
                      echo '<h2>Some error connecting to DATABASE :( </h2>
                                <br>';
                }
            ?>




                </div>
            </div>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
                <img src="images/avatar.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar">
            </a>
            <a href="#" class="w3-bar-item  w3-right " title="Logout">
            <form action="" method="POST">
            <button type="submit" name="logout" class=" w3-btn w3-right  w3-round-large w3-red btn-sm">
            <span class="glyphicon glyphicon-log-out"></span> Log out
            </button>
            </form>
            </a>
        </div>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Home</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Post</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Settings</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
    </div>

    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <!-- The Grid -->
        <div class="w3-row">
            <!-- Left Column -->
            <div class="w3-col m3">
                <!-- Profile -->
                <div class="w3-card w3-round w3-white">
                    <div class="w3-container">
                        <h4 class="w3-center">My Profile</h4>
                        <p class="w3-center">
                            <img src="images/avatar.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar">
                        </p>
                        <hr>
                        <p style="text-transform: capitalize">
                            <i class="fa fa-male fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION['u_first'].' '.$_SESSION['u_last'];?></p>
                        <p>
                        <p>
                            <i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Programmer</p>
                        <p>
                            <i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Delhi, INDIA</p>
                        <p>
                            <i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> Dec 2, 1988</p>
                    </div>
                </div>
                <br>

                <div class="w3-card w3-round">
                        <form action="" method="POST">
                        <div class="w3-card w3-round w3-white">
                            <div class="w3-container w3-padding w3-center" style="">
                                <h5>Post an status: &nbsp; </h5>
                                <input type="text" class="w3-border w3-padding " style="" placeholder="Status" name="post_data"></input>
                                <button type="submit" class="w3-button w3-theme" name="upload_post">
                                    <i class="fa fa-pencil"></i> &nbsp;Post</button>
                            </div>
                        </div>
                        </form>

      </div>

                <!-- End Left Column -->
            </div>

            <!-- Middle Column -->
            <div class="w3-col m7">

                <div class="w3-row-padding">
                    <div class="w3-col m12">
                       <h1>Posts....</h1>
                    </div>
                </div>
                <!-- posts appear here -->
               <?php include_once "posts.php"; ?>

          

                <!-- End Middle Column -->
            </div>


        </div>

        <!-- End Page Container -->
    </div>
    <br>

    <!-- Footer -->
    <footer class="w3-container w3-theme-d3 w3-padding-16">
        <h5>Footer</h5>
    </footer>

    <footer class="w3-container w3-theme-d5">
         <p>Made by
            <a href="https://github.com/akashraj9828" target="_blank">Akash Raj</a>
        </p>
    </footer>
     
    <script>
      
    </script>
