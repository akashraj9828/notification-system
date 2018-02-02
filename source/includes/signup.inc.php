<?php
if(isset($_POST['signup'])){        //RUN THIS CODE ONLY IF ACCESS REQUEsT COMES FROM BUTTON
    include_once 'dbh.inc.php';     

    $firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);


    //ERROR HANDLERS
    //EMPTY FIELD CHECKs
    if (empty($firstname)||empty($lastname)||empty($email)||empty($username)||empty($password)||empty($phone)) {
        header("Location: ?signup=empty_fields");
        exit();
      
    }else {
    //DATA TYPE CHECKER
        //name check
        if (!preg_match("/^[a-zA-Z]*$/",$firstname) || !preg_match("/^[a-zA-Z]*$/",$lastname)) {
           header("Location: ?signup=invalid_charachter_in_name");
           exit();
        }else{
            //email check
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
           header("Location: ?signup=invalid_email");
           exit();
            }else{
                //username check (if alredy taken or not)
                $sql="SELECT * FROM @@users 
                     WHERE user_uid='$username' OR user_uid='$email'";


                $result=mysqli_query($conn,$sql);       //query if username or email is alredy registered or not
                $resultCheck=mysqli_num_rows($result);  //check if query returned any row
                
                if($resultCheck>0){
                    header("Location: ?signup=username_email_taken");
                    exit();
                }else{
                    //password hashing
                    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
                    //sql command to push user into database
                    $sql="INSERT INTO `@@users` (user_first,user_last,user_email,user_uid,user_pwd,user_phone,hashed_pwd,notification) VALUES ('$firstname','$lastname','$email','$username','$password','$phone','$hashedPassword',0)";
                  
                    //       | | | | | | | | | |   
                   //pushing vvvvvvvvvvvvvvvvvvvv into database 
                        if (mysqli_query($conn, $sql)) {
                            header("Location: ?signup=success");
                            exit();
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn). '<br>';
                    }
                }
            }
    }
}
}

