<?php
include "connection.php";
session_start();
if (isset($_SESSION['user']))
  {
    $uname = $_SESSION['user'];
    $query = "select name from admin where email = '$uname';";
    $res = mysqli_query($con,$query);
    $ar = mysqli_fetch_array($res);
    $name = $ar[0];
    
            
          if (isset($_POST["create"]))
          {
            //storing all necessary data into the respective variables.
            $que = $_POST['txtque'];
            $ans1 = $_POST['txtans1'];
            $ans2 = $_POST['txtans2'];
            $ans3 = $_POST['txtans3'];
            $ans4 = $_POST['txtans4'];
            //tblpoll
            $query="insert into polladmin(`question`, `option1`,`option2`,`option3`,`option4`,`status`) VALUES ('$que', '$ans1', '$ans2', '$ans3', '$ans4', 0);";//mysql command to insert file name with extension into the table. Use TEXT datatype for a particular column in table.
            $res = mysqli_query($con,$query);
            
            if($res)
            {
                               
                    ?>
                    <script type="text/javascript">
                    alert("Poll successfully created!!!!");
                    </script>
                    <?php
                
            }  
            else
            {
                
                ?>
                <script type="text/javascript">
                alert("Poll not created!!!!");
                </script>
                <?php
            }
            //tblvotes
                     
        }
        
  }
  else
  {
        ?>
    <script type="text/javascript">
    window.location = "login.php";
    </script>
    <?php
  }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Admin Home</title>

    <style>
        
    .container1 {
        padding-top: 15px;

        padding-bottom: 15px;

        background-color: #fffca6;

        font-size: larger;

    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 20%;
        border-radius: 50%;
    }

    a {
        text-decoration: none;

    }
    </style>
</head>

<body>

    <div class="container container1">
        <div class="row">

            <nav class="navbar navbar-expand navbar-dark bg-dark">
                <div class="container-fluid ">
                    <a class="navbar-brand" href="logout.php"><button type="button" class="btn btn-light btn-lg fw-bolder">Sign
                            Out</button></a>


                </div>
                <div class="d-flex d-grid gap-2 d-md-flex justify-content-md-end">
                
                <form class = "d-grid gap-2 d-md-flex justify-content-md-end"  method = "post">
                    <button type="submit" value="submit" name="add" id = "addid" class="btn btn-primary btn-lg fw-bolder" >Add</button>
                    <button type="submit" value="submit" name="activePoll" id = "activeid" class="btn btn-primary btn-lg fw-bolder">Active Poll</button>
                    <button type="submit" value="submit" name="result" id = "resultid" class="btn btn-primary btn-lg fw-bolder">Results</button>
                </div>
                </form>

            </nav>
        </div>
        <div >
            <div class="imgcontainer">
                <img src="bioimg.jpg" alt="Avatar" class="avatar">
            </div>
            <center><b>
                    <h3 class="navbar-brand fs-1 fw-bolder" >WELCOME  <?php echo strtoupper($name);?> !</h3></b></center>
        </div>
         
        <div class = "row justify-content-md-center">
            <?php  
                    if (isset($_POST["add"]))
                    {
                     ?>
                        <form class = "  col-6" action="adminHome.php" method="post">
                                 <div class="mb-3">
                                    <label for="question" class="form-label">Poll Question:</label>
                                    <input type="text" class="form-control" name="txtque" value="">
                                
                                </div>
                                <div class="mb-3">
                                    <label for="opt1" class="form-label">Option 1:</label>
                                    <input type="text" class="form-control" name="txtans1" value="">
                                
                                </div>
                                <div class="mb-3">
                                    <label for="opt2" class="form-label">Option 2:</label>
                                    <input type="text" class="form-control" name="txtans2" value="">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="op3" class="form-label">Option 3:</label>
                                    <input type="text" class="form-control" name="txtans3" value="">
                                
                                </div>
                                <div class="mb-3">
                                    <label for="op4" class="form-label">Option 4:</label>
                                    <input type="text" class="form-control" name="txtans4" value="">
                                    
                                </div>                            
                                                                        
                                <div class ="row justify-content-md-center"> 
                                <button  type="submit" name ="create" class="btn btn-success btn-lg fw-bolder" >Create Poll</button>
                                </div>
                            </form>
                        <?php
                    }  
                    else if (isset($_POST["activePoll"]))
                    {
                        $sql = "select * from polladmin ;";
                        $q = mysqli_query($con,$sql);
                        if($q)
                        {
                            
                            if (mysqli_num_rows($q)> 0)
                            {
                                //$ques = $row["question"];
                                ?>
                                <table class="table table-bordered border-primary text-center">
                                    <thead>
                                            <tr class="bg-danger text-white">
                                                <th>No.</th>
                                                <th>Question</th>
                                                <th>Option 1</th>
                                                <th>Option 2</th>
                                                <th>Option 3</th>
                                                <th>Option 4</th>
                                                <th>Action</th>
                                            </tr>
                                    </thead>
                                        <tbody>
                                            
                                            <?php
                                            $i = 1;
                                            while($row = mysqli_fetch_array($q))
                                            {
                                                ?>
                                                    <tr >
                                                            <td><?php echo $i++;  ?></td>
                                                            <td ><?php echo $row["question"];  ?></td>
                                                            <td ><?php echo $row["option1"];  ?></td>
                                                            <td ><?php echo $row["option2"];  ?></td>
                                                            <td ><?php echo $row["option3"];  ?></td>
                                                            <td ><?php echo $row["option4"];  ?></td>
                                                            <!-- <form action="adminHome.php" method="post"> -->
                                                                
                                                            <td>
                                                                <a href="./active.php?id=<?php echo $row["id"];?>&status=<?php echo $row["status"];?>">
                                                                    <?php 
                                                                    if($row["status"]==0) 
                                                                    { 
                                                                        echo "<p class='btn btn-warning'>NOT ACTIVE</p>";
                                                                    } 
                                                                    else 
                                                                    {
                                                                        echo "<p class='btn btn-success'>ACTIVE</p>";
                                                                    }
                                                                    ?>
                                                                </a>
                                                            </td>
                                                            <!-- </form>  -->
                                                                                                          
                                                    </tr>
                                                <?php    
                                            }
                                                ?>
                                        </tbody>
                                </table>
                                <?php
                            }
                            else
                            {
                                ?>
                                <center><b>
                                <h3 class="navbar-brand fs-1 fw-bolder" ">OPPs! first Add some POLL...</h3></b></center>
                                <?php
                            }

                        }
                        else
                        {
                            ?>
                                <center><b>
                                <h3 class="navbar-brand fs-1 fw-bolder">OPPs! Some problem while fetch data from database...</h3></b></center>
                            <?php
                        }

                    }  
                    else if (isset($_POST["result"]))
                    {
                        ?>
                        <div class="border-3 border-primary">
                        <center><h1>Poll Results</h1>  </center>
                        <?php
                        $sql = "select distinct * from polladmin order by question;";
                        //echo $sql;
                        $q = mysqli_query($con,$sql);
                        
                        // $row3 = mysqli_fetch_array($q);
                        // echo "<br> distimct :::";
                        // print_r( $row3);
                        if($q)
                        {
                            
                            
                            if (mysqli_num_rows($q)> 0)
                            {
                                
                                while($row = mysqli_fetch_array($q))
                                {
                                    
                                    $question = $row["question"];
                                    // fech total of votes of a particular question
                                    $sql1 = "select sum(vote) as sum_tot from pollvote where question = '$question';";
                                    //echo $sql1;
                                    $q1 = mysqli_query($con,$sql1);                                    
                                    $row1 = mysqli_fetch_array($q1);
                                    $total = $row1["sum_tot"];
                                    if(isset($total))
                                    {     
                                       
                                   // echo $sum;
                                    // $row1 = mysqli_fetch_array($q1);
                                    // $total = $row1["sum_tot"];
                                    $opt1 = $row["option1"];
                                    $opt2 = $row["option2"];
                                    $opt3 = $row["option3"];
                                    $opt4 = $row["option4"];
                                    //echo $total;
                                    //print_r( $row1) ;
                                    
                                    // fetch vaote of a particular option based on question
                                    $sql2 = "select vote from pollvote where optionName = '$opt1';";
                                    $q2 = mysqli_query($con,$sql2);
                                    $row2 = mysqli_fetch_array($q2);                                   
                                    $option1 = $row2["vote"];
                                    
                                    $sql2 = "select vote from pollvote where optionName = '$opt2';";
                                    $q2 = mysqli_query($con,$sql2);
                                    $row2 = mysqli_fetch_array($q2);                                   
                                    $option2 = $row2["vote"];
                                    
                                    $sql2 = "select vote from pollvote where optionName = '$opt3';";
                                    $q2 = mysqli_query($con,$sql2);
                                    $row2 = mysqli_fetch_array($q2);
                                    $option3 = $row2["vote"];
                                    
                                    $sql2 = "select vote from pollvote where optionName = '$opt4';";
                                    $q2 = mysqli_query($con,$sql2);
                                    $row2 = mysqli_fetch_array($q2);
                                    $option4 = $row2["vote"];                                   

                        ?>
                                    <div class="card border-3 border-primary">
                                        <div class="bg-primary text-white">

                                            <h3>Question :: <?php echo $question;  ?> </h3>
                                        </div><br>
                                        <label><h6>( Option 1 ) <?php echo $row["option1"];  ?></h6></label>
                                        <div class="progress">
                                        
                                        <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo round(($option1 / $total) * 100, 2); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <?php echo round(($option1 / $total) * 100, 2); ?>%
                                            </div>
                                        </div><br>
                                        <label><h6>( Option 2 ) <?php echo $row["option2"];  ?></h6></label>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo round(($option2 / $total) * 100, 2); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <?php echo round(($option2 / $total) * 100, 2); ?>%
                                            </div>
                                        </div><br>
                                        <label><h6>( Option 3 ) <?php echo $row["option3"];  ?></h6></label>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width:<?php echo round(($option3 / $total) * 100, 2); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <?php echo round(($option3 / $total) * 100, 2); ?>%
                                            </div>
                                        </div><br>
                                        <label><h6>( Option 4 )<?php echo $row["option4"];  ?></h6></label>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width:<?php echo round(($option4 / $total) * 100, 2); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <?php echo round(($option4 / $total) * 100, 2); ?>%
                                            </div>
                                        </div><br>
                                
                                    </div>
                                    <br>
                    <?php 
                                    
                                    }
                                }
                            }
                        }
                        ?>
                        </div>
                        <?php
                    }           
            ?>
        </div>
        

    </div>

</body>

</html>

