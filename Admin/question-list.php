

<?php
// session_start();
include_once '../config.php';
require_once('session_check.php');
//
// if(!isset($_SESSION['user']))
// {
// header("Location:../../login/index.php");
// }
$res=mysqli_query($con, "SELECT q.q_id as q_id,p.u_id as u_id,q.q_title as q_title FROM question q,post p where (p.q_a_c_id=q.q_id and p.p_type='q') and p.p_deletion_status=0");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Questions</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                            <b style="color:white"><i>My Questions</i></b>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"> </i></a> </li>


                    </ul>
                    <ul class="navbar-nav my-lg-0">
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="table-basic.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">User List</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="question-list.php" aria-expanded="false"><i class="mdi mdi-comment-question-outline"></i><span class="hide-menu">Question List</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Questions</h4>
                                <div class="table-responsive">

                                    <table class="table" >
                                        <thead>
                                            <tr>
                                                <th>Question Id</th>
                                                <th>User Id</th>
                                                <th>Question Title</th>
                                                <th>Related Tags</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($questionRow=mysqli_fetch_assoc($res))
                                            {
                                            echo"<tr>";
                                                echo"<td>".$questionRow['q_id']."</td>";
                                                echo"<td>".$questionRow['u_id']."</td>";
                                                echo"<td>".$questionRow['q_title']."</td>";


                                                echo"<td></td>";
                                                echo"<td>";?>
                                                    <div class="col-md-12 row text-center justify-content-md-left">
                                                        <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-delete">&nbsp&nbsp&nbsp&nbsp</i></a></div>
                                                        <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-send"></i></a></div>
                                                    </div>
                                                <?php
                                                echo"</td>";
                                            echo"</tr>";
                                        }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>

</html>
