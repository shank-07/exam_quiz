<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> Admin || Online Assesment</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});

function validateForm() {
  var y = document.forms["form"]["name"].value;
  if (y == null || y == "") {
    document.getElementById("errormsg").innerHTML="Name must be filled out.";
    return false;
  }
  var br = document.forms["form"]["branch"].value;
  if (br == "") {
    document.getElementById("errormsg").innerHTML="Please select your branch";
    return false;
  }
  var rn = (document.forms["form"]["rollno"].value).split("/");
  if (rn.length != 3) {
    document.getElementById("errormsg").innerHTML="Incorrect Rollno. Please enter in the format (BE/10XXX/YY)";
    return false;
  }
  if((rn[0].length != 2 && rn[0].length != 3) || (rn[0].match(/[A-Z]/g)).length != rn[0].length){
    document.getElementById("errormsg").innerHTML="Incorrect Rollno "+rn[0]+". Make sure all letters are capital (Ex. 'BE' in BE/10XXX/YY)";
    return false;
  }
  if(rn[1].length != 5 || (rn[1].match(/[0-9]/g)).length != rn[1].length){
    document.getElementById("errormsg").innerHTML="Incorrect Rollno "+rn[1];
    return false;
  }
  if(rn[2] != "12" && rn[2] != "13" && rn[2] != "14" && rn[2] != "15" && rn[2] != "16"){
    document.getElementById("errormsg").innerHTML="Incorrect Rollno "+rn[2];
    return false;
  }
  var g = document.forms["form"]["gender"].value;
  if (g=="") {
    document.getElementById("errormsg").innerHTML="Please select your gender";
    return false;
  }
  var x = document.forms["form"]["username"].value;
  if (x.length == 0) {
    document.getElementById("errormsg").innerHTML="Please enter a valid username";
    return false;
  }
  if (x.length < 4) {
    document.getElementById("errormsg").innerHTML="Username must be at least 4 characters long";
    return false;
  }
  var m = document.forms["form"]["phno"].value;
  if (m.length != 10) {
    document.getElementById("errormsg").innerHTML="Phone number must be 10 digits long";
    return false;
  }
  var a = document.forms["form"]["password"].value;
  if(a == null || a == ""){
    document.getElementById("errormsg").innerHTML="Password must be filled out";
    return false;
  }
  if(a.length<5 || a.length>15){
    document.getElementById("errormsg").innerHTML="Passwords must be 5 to 15 characters long.";
    return false;
  }
  var b = document.forms["form"]["cpassword"].value;
  if (a!=b){
    document.getElementById("errormsg").innerHTML="Passwords must match.";
    return false;
  }
}
</script>
</head>

<body  style="background:#eee;">
<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">E & B Academy</span></div>
<?php
include_once 'dbConnection.php';
session_start();
if (!(isset($_SESSION['username']))  || ($_SESSION['key']) != '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
    session_destroy();
    header("location:index.php");
} else {
    $name     = $_SESSION['name'];
    $username = $_SESSION['username'];

    include_once 'dbConnection.php';
    echo '<span class="" style="float:right;padding:5px;" >
    <span style="color:white">
    <span class="glyphicon glyphicon-user" aria-hidden="true">

    </span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span>
     <span class="log log1" style="color:lightyellow">' . $name . '&nbsp;&nbsp;|&nbsp;&nbsp;
     <a href="logout.php?q=account.php" style="color:lightyellow">
     <span class="glyphicon glyphicon-log-out" aria-hidden="true">

     </span>&nbsp;Logout</button></a></span>';
}
?>

</div></div>
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php
if (@$_GET['q'] == 0)
    echo 'class="active"';
?>><a href="dash.php?q=0">Home<span class="sr-only">(current)</span></a></li>
        <li <?php
if (@$_GET['q'] == 1)
    echo 'class="active"';
?>><a href="dash.php?q=1">Users</a></li>
    <li <?php
if (@$_GET['q'] == 2)
    echo 'class="active"';
?>><a href="dash.php?q=2">Leaderboard</a></li>
    <li <?php
if (@$_GET['q'] == 3)
    echo 'class="active"';
?>><a href="dash.php?q=3">Feedback</a></li>
        <li <?php
if (@$_GET['q'] == 4)
    echo 'class="active"';
?>><a href="dash.php?q=4">Add Quiz</a></li>
        <li <?php
if (@$_GET['q'] == 5)
    echo 'class="active"';
?>><a href="dash.php?q=5">Remove Quiz</a></li>
        <li <?php
if (@$_GET['q'] == 6)
    echo 'class="active"';
?>><a href="dash.php?q=6">Registration</a></li>
      </ul>
          </div>
  </div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-12">
<?php
if (@$_GET['q'] == 0) {

    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
    echo '<div class="panel" style="overflow-x:auto;"><table class="table table-striped title1"  style="vertical-align:middle">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Total question</b></td><td style="vertical-align:middle"><b>Marks</b></td><td style="vertical-align:middle"><b>Time limit</b></td><td style="vertical-align:middle"><b>Status</b></td><td style="vertical-align:middle"><b>Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        $status  = $row['status'];
        if ($status == "enabled") {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle"><b><a href="update.php?deidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#ff0000;font-size:12px;padding:5px;">&nbsp;<span><b>Disable</b></span></a></b></td></tr>';
        } else {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Disabled</td>
  <td style="vertical-align:middle"><b><a href="update.php?eeidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:darkgreen;font-size:12px;padding:5px;">&nbsp;<span><b>Enable</b></span></a></b></td></tr>';

        }
    }
}
if (@$_GET['q'] == 2) {
    if(isset($_GET['show'])){
        $show = $_GET['show'];
        $showfrom = (($show-1)*10) + 1;
        $showtill = $showfrom + 9;
    }
    else{
        $show = 1;
        $showfrom = 1;
        $showtill = 10;
    }
    $q = mysqli_query($con, "SELECT * FROM rank") or die('Error223');
    echo '<div class="panel title" style="overflow-x:auto;">
<table class="table table-striped title1" >
<tr><td style="vertical-align:middle"><b>Rank</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Branch</b></td><td style="vertical-align:middle"><b>Username</b></td><td style="vertical-align:middle"><b>Roll number</b></td><td style="vertical-align:middle"><b>Gender</b></td><td style="vertical-align:middle"><b>Score</b></td></tr>';
    $c = $showfrom-1;
    $total = mysqli_num_rows($q);
    if($total >= $showfrom){
        $q = mysqli_query($con, "SELECT * FROM rank ORDER BY score DESC, time ASC LIMIT ".($showfrom-1).",10") or die('Error223');
        while ($row = mysqli_fetch_array($q)) {
            $e = $row['username'];
            $s = $row['score'];
            $q12 = mysqli_query($con, "SELECT * FROM user WHERE username='$e' ") or die('Error231');
            while ($row = mysqli_fetch_array($q12)) {
                $name     = $row['name'];
                $branch   = $row['branch'];
                $username = $row['username'];
                $rollno     = $row['rollno'];
                $gender   = $row['gender'];
            }
            $c++;
            echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle">' . $branch . '</td><td style="vertical-align:middle">' . $username . '</td><td style="vertical-align:middle">' . $rollno . '</td><td style="vertical-align:middle">' . $gender . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle">';
        }
    }
    else{
    }
    echo '</table></div>';
    echo '<div class="panel title" style="overflow-x:auto;"><table class="table table-striped title1" ><tr>';
    $total = round($total/10) + 1;
    if(isset($_GET['show'])){
        $show = $_GET['show'];
    }
    else{
        $show = 1;
    }
    if($show == 1 && $total==1){
    }
    else if($show == 1 && $total!=1){
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    else if($show != 1 && $show==$total){
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';

        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
    }
    else{
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    echo '</tr></table></div>';
}
if (@$_GET['q'] == 1) {

    $result = mysqli_query($con, "SELECT * FROM user") or die('Error');
    echo '<div class="panel" style="overflow-x:auto;"><table class="table table-striped title1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Gender</b></td><td style="vertical-align:middle"><b>Rollno</b></td><td style="vertical-align:middle"><b>Branch</b></td><td style="vertical-align:middle"><b>Username</b></td><td style="vertical-align:middle"><b>Phno</b></td><td style="vertical-align:middle"></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $name      = $row['name'];
        $phno      = $row['phno'];
        $gender    = $row['gender'];
        $rollno    = $row['rollno'];
        $branch    = $row['branch'];
        $username1 = $row['username'];

        echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle">' . $gender . '</td><td style="vertical-align:middle">' . $rollno . '</td><td style="vertical-align:middle">' . $branch . '</td><td style="vertical-align:middle">' . $username1 . '</td><td style="vertical-align:middle">' . $phno . '</td>
  <td style="vertical-align:middle"><a title="Delete User" href="update.php?dusername=' . $username1 . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
    }
    $c = 0;
    echo '</table></div>';

}
if (@$_GET['q'] == 3) {
    $result = mysqli_query($con, "SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
    echo '<div class="panel" style="overflow-x:auto;"><table class="table table-striped title1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Subject</b></td><td style="vertical-align:middle"><b>Username</b></td><td style="vertical-align:middle"><b>Date</b></td><td style="vertical-align:middle"><b>Time</b></td><td style="vertical-align:middle"><b>By</b></td><td style="vertical-align:middle"></td><td style="vertical-align:middle"><b>Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $date      = $row['date'];
        $date      = date("d-m-Y", strtotime($date));
        $time      = $row['time'];
        $subject   = $row['subject'];
        $name      = $row['name'];
        $username1 = $row['username'];
        $id        = $row['id'];
        echo '<tr><td style="vertical-align:middle">' . $c++ . '</td>';
        echo '<td style="vertical-align:middle"><a title="Click to open feedback" href="dash.php?q=3&fid=' . $id . '">' . $subject . '</a></td><td style="vertical-align:middle">' . $username1 . '</td><td style="vertical-align:middle">' . $date . '</td><td style="vertical-align:middle">' . $time . '</td><td style="vertical-align:middle">' . $name . '</td>
  <td style="vertical-align:middle"><a title="Open Feedback" href="dash.php?q=3&fid=' . $id . '"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
        echo '<td style="vertical-align:middle"><a title="Delete Feedback" href="update.php?fdid=' . $id . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

  </tr>';
    }
    echo '</table></div>';
}
if (@$_GET['fid']) {
    echo '<br />';
    $id = @$_GET['fid'];
    $result = mysqli_query($con, "SELECT * FROM feedback WHERE id='$id' ") or die('Error');
    while ($row = mysqli_fetch_array($result)) {
        $name     = $row['name'];
        $subject  = $row['subject'];
        $date     = $row['date'];
        $date     = date("d-m-Y", strtotime($date));
        $time     = $row['time'];
        $feedback = $row['feedback'];

        echo '<div class="panel" style="overflow-x:auto;"><a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>' . $subject . '</b></h1>';
        echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;' . $date . '</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;' . $time . '</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;' . $name . '</span><br />' . $feedback . '</div></div>';
    }
}
if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
    echo '
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>
  <div class="col-md-12">
  <input autocomplete="off" id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>
  <div class="col-md-12">
  <input  autocomplete="off" id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>
  <div class="col-md-12">
  <input autocomplete="off" id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>
  <div class="col-md-12">
  <input autocomplete="off" id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>
  <div class="col-md-12">
  <input autocomplete="off" id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">

  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12">
    <input  autocomplete="off" type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
    echo '
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=5 "  method="POST">
<fieldset>
';

    for ($i = 1; $i <= @$_GET['n']; $i++) {
        echo '<b>Question number&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns' . $i . ' "></label>
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '1"></label>
  <div class="col-md-12">
  <input  autocomplete="off" id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '2"></label>
  <div class="col-md-12">
  <input autocomplete="off" id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '3"></label>
  <div class="col-md-12">
  <input autocomplete="off" id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '4"></label>
  <div class="col-md-12">
  <input autocomplete="off" id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">

  </div>

</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '5"></label>
  <div class="col-md-12">
  <input autocomplete="off" id="' . $i . '5" name="' . $i . '5" placeholder="Enter option e" class="form-control input-md" type="text">

  </div>

</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question ' . $i . '</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option>
  <option value="ae">option e</option>
 </select><br /><br />';
    }

    echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12">
    <input  autocomplete="off" type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
if (@$_GET['q'] == 5) {

    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
    echo '<div class="panel" style="overflow-x:auto;"><table class="table table-striped title1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Topic</b></td><td style="vertical-align:middle"><b>Total question</b></td><td style="vertical-align:middle"><b>Marks</b></td><td style="vertical-align:middle"><b>Time limit</b></td><td style="vertical-align:middle"><b>Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
  <td style="vertical-align:middle"><b><a href="update.php?q=rmquiz&eid=' . $eid . '" class="btn" style="margin:0px;background:red;color:white">&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
    }
    $c = 0;
    echo '</table></div>';



}

if (@$_GET['q'] == 6){
  echo '	<div>

			<div class="col-md-8 panel" style="visibility:;">
  <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
<fieldset>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>
  <div class="col-md-12">
  <h3 align="center">Registration Form</h3>

  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>
  <div class="col-md-12">
  <div id="errormsg" style="font-size:14px;font-family:calibri;font-weight:normal;color:red"></div>

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>
  <div class="col-md-12">

  <input  autocomplete="off" id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text" value="">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="rollno"></label>
  <div class="col-md-12">
  <input autocomplete="off" id="rollno" name="rollno" placeholder="Enter your Roll no (Ex. BE/10XXX/YY)" class="form-control input-md" type="text" value="">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Select your gender" class="form-control input-md" >
   <option value="" >Select Gender</option>
  <option value="M" >Male</option>
  <option value="F" >Female</option> </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="branch"></label>
  <div class="col-md-12">
    <select id="branch" name="branch" placeholder="Select your branch" class="form-control input-md" >
   <option value="" >Select Branch</option>
  <option value="CSE" >Computer Science and Engineering</option>
  <option value="ECE" >Electronics and Communication Engineering</option>
  <option value="EEE" >Electrical and Electronics Engineering</option>
  <option value="IT" >Information Technology</option>
  <option value="CHEM" >Chemical Engineering</option>
  <option value="CIVIL" >Civil Engineering</option>
  <option value="MECH" >Mechanical Engineering</option>
  <option value="BIOTECH" >Biotechnology</option>
  <option value="IMSC" >Integrated MSc</option> </select>

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label title1" for="username"></label>
  <div class="col-md-12">
    <input autocomplete="off" id="username" name="username" placeholder="Choose a username" class="form-control input-md" type="username" value="">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="phno"></label>
  <div class="col-md-12">
  <input autocomplete="off" id="phno" name="phno" placeholder="Enter your mobile number" class="form-control input-md" type="number" value="">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input autocomplete="off" id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password">

  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input autocomplete="off" id="cpassword" name="cpassword" placeholder="Confirm Password" class="form-control input-md" type="password">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12" style="text-align: center">
    <input autocomplete="off" name="submit" type="submit" value=" Register Now " class="btn btn-primary" style="text-align:center" />
  </div>
</div>

</fieldset>
</form>
</div>
		</div>
	</div>';

}
?>
</div>
</div>
</div>
</body>
</html>
