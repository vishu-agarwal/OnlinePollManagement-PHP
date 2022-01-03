<?php
include "connection.php";
    $query = "select * from polladmin where status = 1";
    $res  = mysqli_query($con,$query);
    if(isset($res))
    {
        $data = mysqli_fetch_array($res);
        $que = $data["question"];
        $opt1 = $data["option1"];
        $opt2 = $data["option2"];
        $opt3 = $data["option3"];
        $opt4 = $data["option4"];
        //$count = 0;
        if (isset($_POST["btnvote"]))
        {
            if (isset($_POST["rdbVote"]))
            {
                $ans = $_POST["rdbVote"];
                $query1 = "select * from pollvote where optionName = '$ans';";
                echo $query1;
                $res1 = mysqli_query($con,$query1);
                $data1 = mysqli_fetch_array($res1);
                //print_r($data1);
                if ($data1)
                {
                   // echo "vote update:::";
               
                    $update = "update pollvote set vote = vote + 1 where optionName = '$ans';";
                   // echo $update;
                    $res2 = mysqli_query($con,$update);
                   if ($res2)
                   {
                       ?>
                   <script type="text/javascript">
                   alert("Your vote is successfully submitted!!!!");
                   </script>
                   <?php
                   }         
                }
                else
                {
                    
                    echo "vote insert:::";
               
                     $insert = "insert into pollvote (question,optionName,vote) values ('$que','$ans',1) ;";
                     //echo $insert;
                     $res2 = mysqli_query($con,$insert);
                    if ($res2)
                    {
                        ?>
                    <script type="text/javascript">
                    alert("Your vote is successfully submitted!!!!");
                    </script>
                    <?php
                    }
                    
                }

            }
            else
            {
            ?>
                <script>
                if(document.querySelector('input[name="rdbVote"]:checked') == null)
                {
                    window.alert("You need to choose an option!");
                }
                </script>
    <?php
            }
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
                    <a class="navbar-brand" href="login.php"><button type="button" class="btn btn-light btn-lg fw-bolder">Sign
                            In As Admin</button></a>

                </div>
                <div class="d-flex d-grid gap-2 d-md-flex justify-content-md-end">
                
                <form class = "d-grid gap-2 d-md-flex justify-content-md-end"  method = "post">
                <button type="submit" value="submit" name="upoll" id = "" class="btn btn-primary btn-lg fw-bolder">  Poll  </button>
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
                    <h3 class="navbar-brand fs-1 fw-bolder" >WELCOME To User Poll !</h3></b></center>
        </div>
         
        <div class = "row justify-content-md-center">

            <?php 
                    if (isset($_POST["upoll"]))
                    {
                        ?>
                        <form name="form1" method="POST" action="UserHome.php">
           
                            <input type="hidden" name="txtque" value="<?php echo $que; ?>" />
                            <table class="table table-bordered border-primary table-striped">
                                
                                <tr>
                                    <th scope="col" colspan="2" class="text-white bg-danger">Question: <?php echo $que;  ?></th> 
                                </tr>
                                <tr>
                                    <td><?php echo $opt1;  ?></td>
                                    <td><input type="radio" name="rdbVote" value="<?php echo $opt1;  ?>" /></td>
                                </tr>
                                <tr>
                                    <td><?php echo $opt2;  ?></td>
                                    <td><input type="radio" name="rdbVote" value="<?php echo $opt2;  ?>" /></td>
                                </tr>
                                <tr>
                                    <td><?php echo $opt3;  ?></td>
                                    <td><input type="radio" name="rdbVote" value="<?php echo $opt3;  ?>" /></td>
                                </tr>
                                <tr>
                                    <td><?php echo $opt4;  ?></td>
                                    <td><input type="radio" name="rdbVote" value="<?php echo $opt4;  ?>" /></td>
                                </tr>
                               
                                
                            </table>
                    <!-- /        <a href="./vote.php?ans=<?php echo $_POST["rdbVote"];?> " > -->
                            <input type="submit" name="btnvote" value="VOTE" class="btn btn-success" />
                               
                                <!-- </a> -->
                            <!-- <a href = "./vote.php?ans=<?php// echo $_GET["rdbVote"]; ?>"><input type="button" name="btnvote" value="VOTE" class="btn btn-success" /></a> -->
                        </form>

                        
                        <?php
                    }
                    
                    else if (isset($_POST["result"]))
                    {
                        ?>
                        <div class="border-3 border-primary">
                        <center><h1>Poll Results</h1>  </center>
                        <?php
                     
                                    $sql1 = "select sum(vote) as sum_tot from pollvote where question = '$que';";
                                    //echo $sql1;
                                    $q1 = mysqli_query($con,$sql1);                                    
                                    $row1 = mysqli_fetch_array($q1);
                                    $total = $row1["sum_tot"];
                                    if(isset($total))
                                    {     
                                       
                                    
                                    $sql2 = "select vote from pollvote where optionName = '$opt1';";
                                    $q2 = mysqli_query($con,$sql2);
                                    $row2 = mysqli_fetch_array($q2);
                                    if (isset($row2["vote"]))
                                    {                                   
                                    $option1 = $row2["vote"];
                                    }
                                    else
                                    {
                                        $option3 = 0;
                                    }
                                    
                                    $sql2 = "select vote from pollvote where optionName = '$opt2';";
                                    $q2 = mysqli_query($con,$sql2);
                                    $row2 = mysqli_fetch_array($q2); 
                                    if (isset($row2["vote"]))
                                    {                                  
                                    $option2 = $row2["vote"];
                                    }
                                    else
                                    {
                                        $option3 = 0;
                                    }
                                    $sql2 = "select vote from pollvote where optionName = '$opt3';";
                                    $q2 = mysqli_query($con,$sql2);
                                    $row2 = mysqli_fetch_array($q2);
                                    if (isset($row2["vote"]))
                                    {
                                        $option3 = $row2["vote"];
                                    }
                                    else
                                    {
                                        $option3 = 0;
                                    }
                                    $sql2 = "select vote from pollvote where optionName = '$opt4';";
                                    $q2 = mysqli_query($con,$sql2);
                                    $row2 = mysqli_fetch_array($q2);
                                    if (isset($row2["vote"]))
                                    {
                                    $option4 = $row2["vote"]; 
                                    }
                                    else
                                    {
                                        $option3 = 0;
                                    }                                  

                        ?>
                                    <div class="card border-3 border-primary">
                                        <div class="bg-primary text-white">

                                            <h3>Question :: <?php echo $que;  ?> </h3>
                                        </div><br>
                                        <label><h6>( Option 1 ) <?php echo $opt1;  ?></h6></label>
                                        <div class="progress">
                                        
                                        <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo round(($option1 / $total) * 100, 2); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <?php echo round(($option1 / $total) * 100, 2); ?>%
                                            </div>
                                        </div><br>
                                        <label><h6>( Option 2 ) <?php echo $opt2;  ?></h6></label>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo round(($option2 / $total) * 100, 2); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <?php echo round(($option2 / $total) * 100, 2); ?>%
                                            </div>
                                        </div><br>
                                        <label><h6>( Option 3 ) <?php echo $opt3;  ?></h6></label>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width:<?php echo round(($option3 / $total) * 100, 2); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <?php echo round(($option3 / $total) * 100, 2); ?>%
                                            </div>
                                        </div><br>
                                        <label><h6>( Option 4 )<?php echo $opt4;  ?></h6></label>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width:<?php echo round(($option4 / $total) * 100, 2); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <?php echo round(($option4 / $total) * 100, 2); ?>%
                                            </div>
                                        </div><br>
                                
                                    </div>
                                    <br>
                    <?php 

                                    
                                    }
                                    else
                                    {
                                        ?>
                                        <center><b>
                                        <h3 class="navbar-brand fs-1 fw-bolder" ">OPPs! Result is not made !!...</h3></b></center>
                                        <?php   
                                    }
                                
                        ?>
                        </div>
                        <?php
                    } 
                }
                else{
                    ?>
                                <center><b>
                                <h3 class="navbar-brand fs-1 fw-bolder" ">OPPs! No Poll is Active !!...</h3></b></center>
                                <?php
                }          
            ?>
        </div>
        

    </div>

</body>

</html>
