<?php
    
    include 'functions.php';

    if (isset($_GET['id'])) {

        $sql = 'SELECT * FROM tbl_fcm_template WHERE id=\''.$_GET['id'].'\'';
        $img_rss = mysqli_query($connect, $sql);
        $img_rss_row = mysqli_fetch_assoc($img_rss);

        if ($img_rss_row['image'] != "") {
            unlink('upload/notification/'.$img_rss_row['image']);
        }

        Delete('tbl_fcm_template','id='.$_GET['id'].'');

        header("location: push-notification.php");
        exit;

    }

?>

<?php
    $setting_query = "SELECT * FROM tbl_settings where id = '1'";
    $setting_result = mysqli_query($connect, $setting_query);
    $setting_row = mysqli_fetch_assoc($setting_result);
?>

    <?php 
        // create object of functions class
        $function = new functions;
        
        // create array variable to store data from database
        $data = array();
        
        if(isset($_GET['keyword'])) {   
            // check value of keyword variable
            $keyword = $function->sanitize($_GET['keyword']);
            $bind_keyword = "%".$keyword."%";
        } else {
            $keyword = "";
            $bind_keyword = $keyword;
        }
            
        if (empty($keyword)) {
            $sql_query = "SELECT id, title, message, image, link FROM tbl_fcm_template ORDER BY id DESC";
        } else {
            $sql_query = "SELECT id, title, message, image, link FROM tbl_fcm_template WHERE title LIKE ? ORDER BY id DESC";
        }
        
        
        $stmt = $connect->stmt_init();
        if ($stmt->prepare($sql_query)) {   
            // Bind your variables to replace the ?s
            if (!empty($keyword)) {
                $stmt->bind_param('s', $bind_keyword);
            }
            // Execute query
            $stmt->execute();
            // store result 
            $stmt->store_result();
            $stmt->bind_result( 
                    $data['id'],
                    $data['title'],
                    $data['message'],
                    $data['image'],
                    $data['link']
                    );
            // get total records
            $total_records = $stmt->num_rows;
        }
            
        // check page parameter
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
                        
        // number of data that will be display per page     
        $offset = 10;
                        
        //lets calculate the LIMIT for SQL, and save it $from
        if ($page) {
            $from   = ($page * $offset) - $offset;
        } else {
            //if nothing was given in page request, lets load the first page
            $from = 0;  
        }   
        
        if (empty($keyword)) {
            $sql_query = "SELECT id, title, message, image, link FROM tbl_fcm_template ORDER BY id DESC LIMIT ?, ?";
        } else {
            $sql_query = "SELECT id, title, message, image, link FROM tbl_fcm_template WHERE title LIKE ? ORDER BY id DESC LIMIT ?, ?";
        }
        
        $stmt_paging = $connect->stmt_init();
        if ($stmt_paging ->prepare($sql_query)) {
            // Bind your variables to replace the ?s
            if (empty($keyword)) {
                $stmt_paging ->bind_param('ss', $from, $offset);
            } else {
                $stmt_paging ->bind_param('sss', $bind_keyword, $from, $offset);
            }
            // Execute query
            $stmt_paging ->execute();
            // store result 
            $stmt_paging ->store_result();
            $stmt_paging->bind_result(
                $data['id'],
                $data['title'],
                $data['message'],
                $data['image'],
                $data['link']
            );
            // for paging purpose
            $total_records_paging = $total_records; 
        }

        // if no data on database show "No Reservation is Available"
        if ($total_records_paging == 0) {
    
    ?>

    <section class="content">

        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Manage Notification</a></li>
        </ol>

       <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>MANAGE NOTIFICATION</h2>
                            <div class="header-dropdown m-r--5">
                                <a href="add-notification.php"><button type="button" class="btn bg-blue waves-effect">Add New Template</button></a>
                            </div>
                            <br>
                                <?php echo isset($error['push_notification']) ? $error['push_notification'] : '';?>
                                <?php echo isset($error['delete_notification']) ? $error['delete_notification'] : '';?>
                        </div>

                        <div class="body table-responsive">
                            
                            <form method="get">
                                <div class="col-sm-10">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="keyword" placeholder="Search by name...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" name="btnSearch" class="btn bg-blue btn-circle waves-effect waves-circle waves-float"><i class="material-icons">search</i></button>
                                </div>
                            </form>
                                        
                            <table class='table table-hover table-striped'>
                                <thead>
                                    <tr>
                                        <th width="15%">Title</th>
                                        <th width="30%">Message</th>
                                        <th width="40%">Url</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>

                                
                            </table>

                            <div class="col-sm-10">Wopps! No data found with the keyword you entered.</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
        // otherwise, show data
        } else {
            $row_number = $from + 1;
    ?>

    <section class="content">

        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Manage Notification</a></li>
        </ol>

       <div class="container-fluid">

            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>MANAGE NOTIFICATION</h2>
                            <div class="header-dropdown m-r--5">
                                <a href="add-notification.php"><button type="button" class="btn bg-blue waves-effect">Add New Template</button></a>
                            </div>
                            <br>
                                <?php if(isset($_SESSION['msg'])) { ?>
                                    <div class='alert alert-info'>
                                        <?php echo $_SESSION['msg']; ?>
                                    </div>
                                <?php unset($_SESSION['msg']); }?>
                        </div>

                        <div class="body table-responsive">
                            
                            <form method="get">
                                <div class="col-sm-10">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="keyword" placeholder="Search by name...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" name="btnSearch" class="btn bg-blue btn-circle waves-effect waves-circle waves-float"><i class="material-icons">search</i></button>
                                </div>
                            </form>
                                        
                            <table class='table table-hover table-striped'>
                                <thead>
                                    <tr>
                                        <th width="15%">Title</th>
                                        <th width="10%">Image</th>
                                        <th width="30%">Message</th>
                                        <th width="30%">Url</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>

                                <?php 
                                    while ($stmt_paging->fetch()) { ?>
                                        <tr>
                                            <td><?php echo $data['title'];?></td>
                                            <td><img src="upload/notification/<?php echo $data['image']; ?>" width="72" height="48"/></td>
                                            <td><?php echo $data['message'];?></td>
                                            <td>
                                                <?php
                                                    if ($data['link'] == '') {           
                                                ?>
                                                    no_url
                                                <?php } else { ?>
                                                    <?php
                                                        $value = $data['link'];
                                                        if (strlen($value) > 50)
                                                            $value = substr($value, 0, 47) . '...';
                                                        
                                                        echo $value;
                                                    ?>
                                                <?php } ?>
                                            </td>
                                            
                                            <td>

                                            <?php if ($setting_row['providers'] == 'onesignal') { ?>
                                                <a href="send-onesignal-notification.php?id=<?php echo $data['id'];?>">
                                                    <i class="material-icons">notifications_active</i>
                                                </a>
                                            <?php } else { ?>
                                                <a href="send-fcm-notification.php?id=<?php echo $data['id'];?>">
                                                    <i class="material-icons">notifications_active</i>
                                                </a>
                                            <?php } ?>                                                

                                            <a href="edit-notification.php?id=<?php echo $data['id'];?>">
                                                <i class="material-icons">mode_edit</i>
                                            </a>

                                            <a href="push-notification.php?id=<?php echo $data['id'];?>" onclick="return confirm('Are you sure want to delete this template?')">
                                                <i class="material-icons">delete</i>
                                            </a>

                                        </td>
                                        </tr>
                                <?php 
                                    }
                                ?>
                            </table>

                            <h4><?php $function->doPages($offset, 'push-notification.php', '', $total_records, $keyword); ?></h4>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>