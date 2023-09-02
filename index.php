
<?php
        error_reporting(0);
        $dbhost="localhost";
        $dbuser="devang";
        $dbpass="qwerty";
        $db="gdcairways";
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
        if(!$conn)
        {
          echo "Connection was failed".mysqli_connect_error();
        }
        $uname=$_POST['usernameSignUp'];
        $uname=mysqli_real_escape_string($conn,$uname);
        $em=$_POST['emailid'];
        $em=mysqli_real_escape_string($conn,$em);
        $passsign=$_POST['passwordSignUp'];
        $passsign=mysqli_real_escape_string($conn,$passsign);
        $confsign=$_POST['confpassword'];
        $confsign=mysqli_real_escape_string($conn,$confsign);
        $sbtn=$_POST['submit'];

        $unamelg=$_POST['usernameLogin'];
        $unamelg=mysqli_real_escape_string($conn,$unamelg);
        $passlg=$_POST['passwordLogin'];
        $passlg=mysqli_real_escape_string($conn,$passlg);
        $lbtn=$_POST['submit'];
    
        if(!empty($uname) && !empty($em) && !empty($passsign) && !empty($confsign) && $passsign==$confsign && $sbtn=="SUBMIT")
        {
          $sql="Insert into users values('".$uname."','".$em."','".$passsign."')";
          if(mysqli_query($conn,$sql))
          {
            echo "Done";
          }
          else
          {
            echo "Something Went Wrong";
          }
        }

        if(!empty($unamelg) && !empty($passlg) && $lbtn=="LOGIN")
        {
          $sql="select username, password from users";
          if(mysqli_query($conn,$sql))
          {
            $print=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($print))
            {
              if($row['username']==$unamelg && $row['password']==$passlg)
              {
                echo "<script type='text/javascript'>
                      alert('Welcome');
                      </script>";
                $ch=1;
              }
            }
            if($ch!=1)
            {
              echo "<script type='text/javascript'>
                      alert('Invalid Credentials');
                      </script>";
            }
          }
          else
          {
            echo "Something Went Wrong";
          }
        }

?>
