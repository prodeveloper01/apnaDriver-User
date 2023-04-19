<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showTrips';
        $data = array();
        $json_data = @curl_request($data, $url);
        $json_data=$json_data['msg'];
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Manage trip</div>
                        <div class="page-header-btn">
                            <!-- <button class="add-product-btn" onclick="addParcelOrder();">Add ParcelOrders</button> -->
                        </div>
                    </div>
                    <div class="content-page-container">
                        <div class="content-tabel-container">
                            <div class="content-tabel-nav">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#All" role="tab" aria-controls="home" aria-selected="true">All</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Unfulfilled" role="tab" aria-controls="profile" aria-selected="false">Active</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Unpaid" role="tab" aria-controls="contact" aria-selected="false">Draft</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Open" role="tab" aria-controls="contact" aria-selected="false">Archived</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="All" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="order-tabel-container">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <input type="checkbox">
                                                    </th>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">User</th>
                                                        <th scope="col">Driver</th>
                                                        <th scope="col">Pickup</th>
                                                        <th scope="col">Dropoff</th>
                                                        <th scope="col">Trip Fare</th>
                                                        <th scope="col">Ride Fare</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                if(is_array($json_data) || is_object($json_data)) 
                                                {
                                                    foreach ($json_data as $singleRow) 
                                                    {
                                                        ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="tabel-img-container">
                                                                        <input type="checkbox">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <?php echo $singleRow['Trip']['id']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php echo $singleRow['User']['first_name'].' '.$singleRow['User']['last_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['User']['phone']);?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleRow['Driver']['first_name'].' '.$singleRow['Driver']['last_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['Vehicle']['license_plate']);?>
                                                                    </div>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Trip']['pickup_location']; ?>">
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['Trip']['pickup_lat'].",".$singleRow['Trip']['pickup_long']; ?>">View Map</a>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Trip']['dropoff_location']; ?>">
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['Trip']['dropoff_lat'].",".$singleRow['Trip']['dropoff_long']; ?>">View Map</a>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Trip']['dropoff_location']; ?>">
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['Trip']['trip_fare']; ?>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Trip']['dropoff_location']; ?>">
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['Trip']['ride_fare']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['Trip']['completed'] == '1')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnPending rider_changeStatus" data-id='.$singleRow["Trip"]["id"].' >Pending Payment</span>';
                                                                            }
                                                                            if($singleRow['Trip']['completed'] == '2')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive rider_changeStatus" data-id='.$singleRow["Request"]["id"].' >Payment Collected</span>';
                                                                            }
                                                                           
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td title="<?php echo $singleRow['Trip']['created'];?>">
                                                                    <?php
                                                                        $timestamp = strtotime($singleRow['Trip']['created']);
                                                                        echo date("d M Y", $timestamp);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="dashboard.php?p=tripDetails&id=<?php echo $singleRow['Trip']['id']; ?>"><i title="Order Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;&nbsp;
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                            ?>    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Unfulfilled" role="tabpanel" aria-labelledby="profile-tab">No Data Available</div>
                                <div class="tab-pane fade" id="Unpaid" role="tabpanel" aria-labelledby="contact-tab">No Data Available</div>
                                <div class="tab-pane fade" id="Open" role="tabpanel" aria-labelledby="profile-tab">No Data Available</div>
                                <div class="tab-pane fade" id="Closed" role="tabpanel" aria-labelledby="contact-tab">No Data Available</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    } 
    else 
    {
        echo "<script>window.location='login.php'</script>";
        die;
    }
?>