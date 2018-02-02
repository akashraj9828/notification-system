      <!-- posts and comments from database -->
            <?php
                $sql="SELECT *
                        FROM `posts`
                        ORDER BY post_time DESC
                        LIMIT 10";

                $result=mysqli_query( $conn, $sql);
                if($result){
                    $resultCheck = mysqli_num_rows( $result );
                    if($resultCheck < 1){
                        echo '
                         <div class="w3-container w3-card w3-white w3-round w3-margin">
                            <br>
                            <hr class="w3-clear">
                            <h2>There are no posts </h2>
                        </div>
                            <br>';
                    }else {
                        
                        /*** div posts starts here  ***/
                        while($row=mysqli_fetch_assoc( $result )){
                            $post_id=$row['post_id'];
                            $post_data=$row['post_data'];
                            $user_uid=$row['user_uid'];
                            $user_first=$row['user_first'];
                            $user_last=$row['user_last'];
                            $post_time=$row['post_time'];

                            //if using local server
                            date_default_timezone_set('Asia/Kolkata');
                            $time=strtotime($post_time);
                            // POSTS HERE
                            echo'   <div class="w3-container w3-card w3-dark-gray w3-round w3-margin-top w3-margin-left w3-margin-right" id="'.$post_id.'">
                                        <div name="post"><br>
                                        <img src="images/post_avatar.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                                        <span class="w3-right w3-opacity">'.date("F j, Y", $time ) . ' ' . date("g:i a", $time ).'</span>
                                        <h4 style="text-transform: capitalize">'.$user_first.' '.$user_last.'</h4>
                                        <br>
                                        <hr class="w3-clear">
                                        <p>'.$post_data.'</p>
                                        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" id="show_comment_form" data-div_to_tigger="comments_'.$post_id.'">
                                            <i class="fa fa-comment"></i> &nbsp;Comment</button>
                                        </div>';
                            
                            $sql2="SELECT comment_user_first,comment_user_last,comment_time,comment_data
                                        FROM `comments` 
                                        WHERE post_id='".$post_id."' 
                                         ORDER BY comment_time DESC
                                        LIMIT 5";
                                        $result2=mysqli_query($conn, $sql2);
                                        if($result2){
                                            $resultCheck2 = mysqli_num_rows( $result2 );
                                        $comments=$resultCheck2;
                                            // COMMENTS here
                                            echo '<div id="comments_'.$post_id.'" class="w3-gray w3-margin-bottom" name="comments" style="display:none">
                                                     <div class=" w3-panel w3-grey w3-round ">
                                                    <form id="comment_form_.'.$post_id.'" action="" method="POST">
                                                            <div class="w3-container w3-padding w3-round">
                                                                <input type="text" style="display:none" name="post_id" id="post_id" value="'.$post_id.'">
                                                                <input type="text" style="display:none" name="post_by_uid" id="post_by_uid" value="'. $user_uid.'">
                                                                <input type="text" class="w3-border w3-padding" placeholder="Comment" name="comment_data">
                                                                <button type="submit" class="w3-button w3-theme" name="upload_comment">
                                                                    <i class="fa fa-pencil"></i> &nbsp;Comment</button>
                                                            </div>
                                                        </form>
                                                    </div>';
                                                
                                            if($comments < 1){
                                            echo ' <p>No Comments</p></br>';
                                            }else{
                                                while($row2=mysqli_fetch_assoc( $result2 )){
                                                    $comment_user_first=$row2['comment_user_first'];
                                                    $comment_user_last=$row2['comment_user_last'];
                                                    $comment_data=$row2['comment_data'];
                                                    $comment_time=$row2['comment_time'];
                                                    $time2=strtotime($comment_time );
                                                     echo '<div class="w3-container ">
                                                      <span class="w3-right w3-opacity">'.date("F j, Y", $time2 ) . ' ' . date("g:i a", $time2 ).'</span>
                                                      <h5 style="text-transform: capitalize; "><b>'.$comment_user_first.' '.$comment_user_last.'</b> :- <p style="text-transform: none;">'.$comment_data.'</p></h5>
                                                      
                                                       </div>';

                                                }
                                            }
                                            echo '</div>
                                                </div>';
                                        }
                        }
                    }
                }
            ?>

