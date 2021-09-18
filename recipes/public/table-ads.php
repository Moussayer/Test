<?php
    
    include('public/fcm.php');

	$qry = "SELECT * FROM tbl_ads where id = '1'";
	$result = mysqli_query($connect, $qry);
	$settings_row = mysqli_fetch_assoc($result);

	if(isset($_POST['submit'])) {

	    $data = array(
            'ad_status'                   => $_POST['ad_status'],
            'ad_type'                     => $_POST['ad_type'],
            'admob_publisher_id'          => $_POST['admob_publisher_id'],
            'admob_app_id'                => $_POST['admob_app_id'],
	        'admob_banner_unit_id'        => $_POST['admob_banner_unit_id'],
            'admob_interstitial_unit_id'  => $_POST['admob_interstitial_unit_id'],
            'admob_native_unit_id'        => $_POST['admob_native_unit_id'],
            'fan_banner_unit_id'          => $_POST['fan_banner_unit_id'],     
            'fan_interstitial_unit_id'    => $_POST['fan_interstitial_unit_id'],
            'fan_native_unit_id'          => $_POST['fan_native_unit_id'],
            'startapp_app_id'             => $_POST['startapp_app_id'],
            'interstitial_ad_interval'    => $_POST['interstitial_ad_interval'],
            'native_ad_interval'          => $_POST['native_ad_interval'],
            'native_ad_index'             => $_POST['native_ad_index']
	    );

	    $update = Update('tbl_ads', $data, "WHERE id = '1'");

	    if ($update > 0) {
                $succes =<<<EOF
                    <script>
                    alert('Ads settings successfully updated...');
                    window.location = 'manage-ads.php';
                    </script>
EOF;
                echo $succes;
	    }
	}

?>


<script type="text/javascript">

    $(document).ready(function(e) {

        $("#ad_status").change(function() {
            var status = $("#ad_status").val();
            if (status == "on") {
                $("#ad_status_on").show();
            } else {
                $("#ad_status_on").hide();
            }
                    
        });

        $( window ).load(function() {
            var status = $("#ad_status").val();
            if (status == "on") {
                $("#ad_status_on").show();
            } else {
                $("#ad_status_on").hide();
            }
        });

        $("#ad_type").change(function() {
            var type = $("#ad_type").val();
            if (type == "admob") {
                $("#admob_ad_network").show();
                $("#fan_ad_network").hide();
                $("#startapp_ad_network").hide();
            }
            if (type == "fan") {
                $("#admob_ad_network").hide();
                $("#fan_ad_network").show();
                $("#startapp_ad_network").hide();
            }
            if (type == "startapp") {
                $("#admob_ad_network").hide();
                $("#fan_ad_network").hide();
                $("#startapp_ad_network").show();
            }
        });

        $( window ).load(function() {
            var type = $("#ad_type").val();
            if (type == "admob") {
                $("#admob_ad_network").show();
                $("#fan_ad_network").hide();
                $("#startapp_ad_network").hide();
            }
            if (type == "fan") {
                $("#admob_ad_network").hide();
                $("#fan_ad_network").show();
                $("#startapp_ad_network").hide();
            }
            if (type == "startapp") {
                $("#admob_ad_network").hide();
                $("#fan_ad_network").hide();
                $("#startapp_ad_network").show();
            }
        });

    });

</script>

<section class="content">

    <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Manage Ads</a></li>
    </ol>

    <div class="container-fluid">

        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <form method="post" enctype="multipart/form-data">

                    <div class="card">
                        <div class="header">
                            <h2>MANAGE ADS</h2>
                            <div class="header-dropdown m-r--5">
                                <button type="submit" name="submit" class="btn bg-blue waves-effect">UPDATE</button>
                            </div>
                        </div>

                        <div class="body">

                            <div class="row clearfix">

                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="font-12">Ad Status</div>
                                            <select class="form-control show-tick" name="ad_status" id="ad_status">
                                                <?php if ($settings_row['ad_status'] == 'on') { ?>
                                                <option value="on" selected="selected">ON</option>
                                                <option value="off">OFF</option>
                                                <?php } else { ?>
                                                <option value="on">ON</option>
                                                <option value="off" selected="selected">OFF</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="ad_status_on">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="font-12">Ad Network Type</div>
                                                <select class="form-control show-tick" name="ad_type" id="ad_type">
                                                    <?php if ($settings_row['ad_type'] == 'admob') { ?>
                                                        <option value="admob" selected="selected">AdMob</option>
                                                        <option value="fan">Facebook Audience Network (FAN)</option>
                                                        <option value="startapp">StartApp</option>
                                                    <?php } else if ($settings_row['ad_type'] == 'fan') { ?>
                                                        <option value="admob">AdMob</option>
                                                        <option value="fan" selected="selected">Facebook Audience Network (FAN)</option>
                                                        <option value="startapp">StartApp</option>
                                                    <?php } else { ?>
                                                        <option value="admob">AdMob</option>
                                                        <option value="fan">Facebook Audience Network (FAN)</option>
                                                        <option value="startapp" selected="selected">StartApp</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="admob_ad_network">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">AdMob Publisher ID</div>
                                                        <input type="text" class="form-control" name="admob_publisher_id" id="admob_publisher_id" value="<?php echo $settings_row['admob_publisher_id'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">AdMob App ID</div>
                                                        <input type="text" class="form-control" name="admob_app_id" id="admob_app_id" value="<?php echo $settings_row['admob_app_id'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">AdMob Banner Unit ID</div>
                                                        <input type="text" class="form-control" name="admob_banner_unit_id" id="admob_banner_unit_id" value="<?php echo $settings_row['admob_banner_unit_id'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">AdMob Interstitial Unit ID</div>
                                                        <input type="text" class="form-control" name="admob_interstitial_unit_id" id="admob_interstitial_unit_id" value="<?php echo $settings_row['admob_interstitial_unit_id'];?>" required>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">AdMob Native Unit ID</div>
                                                        <input type="text" class="form-control" name="admob_native_unit_id" id="admob_native_unit_id" value="<?php echo $settings_row['admob_native_unit_id'];?>" required>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div id="fan_ad_network">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">FAN Banner Unit ID</div>
                                                        <input type="text" class="form-control" name="fan_banner_unit_id" id="fan_banner_unit_id" value="<?php echo $settings_row['fan_banner_unit_id'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">FAN Interstitial Unit ID</div>
                                                        <input type="text" class="form-control" name="fan_interstitial_unit_id" id="fan_interstitial_unit_id" value="<?php echo $settings_row['fan_interstitial_unit_id'];?>" required>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">FAN Native Unit ID</div>
                                                        <input type="text" class="form-control" name="fan_native_unit_id" id="fan_native_unit_id" value="<?php echo $settings_row['fan_native_unit_id'];?>" required>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div id="startapp_ad_network">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">StartApp App ID</div>
                                                        <input type="text" class="form-control" name="startapp_app_id" id="startapp_app_id" value="<?php echo $settings_row['startapp_app_id'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">Interstitial Ad Interval</div>
                                                        <input type="number" class="form-control" name="interstitial_ad_interval" id="interstitial_ad_interval" value="<?php echo $settings_row['interstitial_ad_interval'];?>" required>
                                                    </div>
                                                </div>    
                                            </div>   

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">Native Ad Interval</div>
                                                        <input type="number" class="form-control" name="native_ad_interval" id="native_ad_interval" value="<?php echo $settings_row['native_ad_interval'];?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <div class="font-12">Native Ad Index</div>
                                                        <input type="number" class="form-control" name="native_ad_index" id="native_ad_index" value="<?php echo $settings_row['native_ad_index'];?>" required>
                                                    </div>
                                                </div>
                                            </div>                

                                    </div>

                                </div>

                                <div>
                                    <ul>
                                        <li>If you want to deactivate a particular ad, give the value 0 on the ad id form.</li>
                                        <li>If you want to completely deactivate the ad, set OFF in the Ad Config form.</li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>

                </form>

            </div>
        </div>

    </div>

</section>