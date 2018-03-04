

<?php
// session_start();
include_once '../config.php';
require_once('session_check.php');
//
// if(!isset($_SESSION['user']))
// {
// header("Location:../../login/index.php");
// }
$res=mysqli_query($con, "SELECT p.u_id as u_id,p.p_creation_date as p_creation_date,p.p_upvote_count as p_upvote_count,p.p_downvote_count as p_downvote_count , q.* FROM question q,post p where (p.q_a_c_id=q.q_id and p.p_type='q') and p.p_deletion_status=0");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Question-List</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <script src="assets/plugins/jquery/jquery.min.js">

    </script>
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

                                <div class="table-responsive">
                                    <h4 class="card-title">Questions</h4>
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                                <th><center>Question Id</center></th>
                                                <th><center>User Id</center></th>
                                                <th><center>Question Title</center></th>
                                                <th><center>Related Tags</center></th>
                                                <th><center>Upvote</center></th>
                                                <th><center>Downvote</center></th>
                                                <th><center>Total Views</center></th>
                                                <th><center>Creation Date</center></th>
                                                <th><center>Actions</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($questionRow=mysqli_fetch_assoc($res))
                                            {
                                                $t_ids_array = explode(',',$questionRow['q_related_tag_ids']);
                                                // $t_names;
                                                //print_r($t_ids_array);

                                                echo"<tr>";
                                                echo"<td><center>".$questionRow['q_id']."<cneter></td>";
                                                echo"<td><center>".$questionRow['u_id']."<cneter></td>";
                                                echo"<td><center>".$questionRow['q_title']."<cneter></td>";
                                                echo"<td><center>";
                                                foreach($t_ids_array as $t_id)
                                                {
                                                    //echo"$t_id";

                                                    $res1=mysqli_query($con,"select t_name from tag where t_id= $t_id and t_deletion_status=0");
                                                    $tag_row= mysqli_fetch_assoc($res1);
                                                    echo"$tag_row[t_name]";

                                                    // if(++$t_ids_array == NULL)
                                                    // break;
                                                    echo" ";
                                                }
                                                echo"<cneter></td>";
                                                echo"<td><center>".$questionRow['p_upvote_count']."<cneter></td>";
                                                echo"<td><center>".$questionRow['p_downvote_count']."<cneter></td>";
                                                echo"<td><center>".$questionRow['q_total_view']."<cneter></td>";
                                                echo"<td><center>".$questionRow['p_creation_date']."<cneter></td>";
                                                echo"<td><center>";
                                                $id =  $questionRow['q_id'];
                                                ?>

                                                    <div class="col-md-12 row text-center justify-content-md-left">

                                                        <span class="delete" id="del_<?php echo $id ;?>">
                                                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-delete"></i></a></div>
                                                        </span>
                                                        <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-send"></i></a></div>
                                                    </div>
                                                <?php
                                                echo"<cneter></td>";
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
    <script>
        $(document).ready(function(){

            // Delete
            $('.delete').click(function(){
            var el = this;
            var id = this.id;
            var splitid = id.split("_");

            // Delete id
            var deleteid = splitid[1];

            // AJAX Request
            $.ajax({
            url: 'delete_question.php',
            type: 'POST',
            data: { id:deleteid },
            success: function(response){
                alert(response);
            // Removing row from HTML Table
            $(el).closest('tr').css('background','tomato');
            $(el).closest('tr').fadeOut(800, function(){
             $(this).remove();
            });

            }
            });

            });

            });
        </script>
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>

</html>
