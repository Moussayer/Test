<?php include('session.php'); ?>
<?php include('public/menubar.php'); ?>
<style>
div.ex1 {
    margin-bottom: 8px;
}
</style>

<?php

	if (isset($_GET['id'])) {
		$ID = $_GET['id'];
	} else {
		$ID = "";
	}
			
	// create array variable to handle error
	$error = array();
			
	// create array variable to store data from database
	$data = array();
		
	// get data from reservation table
	$sql_query = "SELECT recipe_id, recipe_title, recipe_description, recipe_image, content_type, video_id FROM tbl_recipes WHERE recipe_id = ?";
		
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
		// Bind your variables to replace the ?s
		$stmt->bind_param('s', $ID);
		// Execute query
		$stmt->execute();
		// store result 
		$stmt->store_result();
		$stmt->bind_result(
				$data['recipe_id'], 
				$data['recipe_title'],
				$data['recipe_description'],
				$data['recipe_image'],
				$data['content_type'],
				$data['video_id']
				);
		$stmt->fetch();
		$stmt->close();
	}
			
?>

<?php

    $setting_qry    = "SELECT * FROM tbl_settings where id = '1'";
    $setting_result = mysqli_query($connect, $setting_qry);
    $settings_row   = mysqli_fetch_assoc($setting_result);
    $protocol_type = $settings_row['protocol_type'];

?>

<?php
    $value = $data['recipe_description'];
    if (strlen($value) > 100)
    $value = substr($value, 0, 97) . '...';
?>

	<section class="content">

        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="manage-recipe.php">Manage Recipes</a></li>
            <li class="active">Send Notification</a></li>
        </ol>

        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<form method="post" action="send-push.php">
	                	<div class="card">
	                        <div class="header">
	                            <h2>SEND NOTIFICATION</h2>
	                        </div>
	                        <div class="body">

	                        	<div class="row clearfix">

	                        		<input type="hidden" name="id" id="id" value="<?php echo $data['recipe_id']; ?>" required>
                              		<input type="hidden" name="link" id="link" />

			                        <div class="form-group col-sm-12">
			                            <div class="font-12">Title *</div>
			                            <div class="form-line">
			                            	<input type="text" name="title" id="title" class="form-control" value="<?php echo $app_name; ?>" required>
			                            </div>
			                       	</div>

			                       	<div class="form-group col-sm-12">
			                            <div class="font-12">Message *</div>
			                            <div class="form-line">
	                        				<input type="text" name="message" id="message" class="form-control" value="<?php echo $data['recipe_title']; ?>" required>
			                            </div>
			                       	</div>

			                       	<div class="col-sm-6">
			                       		<div class="font-12 ex1">Image *</div>
                                        <div class="form-group">
                                        	<?php if ($data['content_type'] == 'youtube') { ?>
                                        		<input type="file" class="dropify-image" data-max-file-size="3M" data-allowed-file-extensions="jpg jpeg png gif" data-default-file="https://img.youtube.com/vi/<?php echo $data['video_id'];?>/mqdefault.jpg" data-show-remove="false" disabled/>
                                            <input type="hidden" name="image" value="https://img.youtube.com/vi/<?php echo $data['video_id'];?>/mqdefault.jpg">
                                        	<?php } else { ?>
                                            	<input type="file" class="dropify-image" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png gif" data-default-file="upload/<?php echo $data['recipe_image']; ?>" data-show-remove="false" disabled/>
                                              <input type="hidden" name="image" value="<?php echo $protocol_type.'://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI']).'/upload/'.$data['recipe_image']; ?>">
                                        	<?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                		<button class="btn bg-blue waves-effect pull-right" type="submit" name="submit">SEND NOW</button>
                            		</div>
										
		                       	</div>
		                    </div>
		                </div>
                	</form>
                </div>
            </div>
        </div>

    </section>

<?php include('public/footer.php'); ?>