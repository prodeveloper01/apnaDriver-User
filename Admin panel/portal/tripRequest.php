<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showTripRequests';
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Trip Request
                        </div>
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
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="profile" aria-selected="false">Pending</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#active" role="tab" aria-controls="contact" aria-selected="false">Accept</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="ordercancel-tab" data-toggle="tab" href="#ordercancel" role="tab" aria-controls="ordercancel" aria-selected="false">Reject</a>
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
                                                        <th scope="col">EST Fare</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $data = array();
                                                $json_data = @curl_request($data, $url);
                                                
                                                if(is_array($json_data['msg']) || is_object($json_data['msg'])) 
                                                {
                                                    foreach ($json_data['msg'] as $singleRow) 
                                                    {
                                                        ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="tabel-img-container">
                                                                        <input type="checkbox">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <?php echo $singleRow['Request']['id']; ?>
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
                                                                <td title="<?php echo $singleRow['Request']['pickup_location']; ?>">
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['Request']['pickup_lat'].",".$singleRow['Request']['pickup_long']; ?>">View Map</a>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Request']['dropoff_location']; ?>">
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['Request']['dropoff_lat'].",".$singleRow['Request']['dropoff_long']; ?>">View Map</a>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Request']['dropoff_location']; ?>">
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['Request']['estimated_fare']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['Request']['request'] == '0')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnPending rider_changeStatus" data-id='.$singleRow["Request"]["id"].' >Pending</span>';
                                                                            }
                                                                            if($singleRow['Request']['request'] == '1')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive rider_changeStatus" data-id='.$singleRow["Request"]["id"].' >Accept</span>';
                                                                            }
                                                                            if($singleRow['Request']['request'] == '2')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnCancel">Reject</span>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td title="<?php echo $singleRow['Request']['created'];?>">
                                                                    <?php
                                                                        $timestamp = strtotime($singleRow['Request']['created']);
                                                                        echo date("d M Y", $timestamp);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="dashboard.php?p=tripRequestDetails&amp;id=<?php echo $singleRow['Request']['id']; ?>"><i title="Order Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;&nbsp;
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
                                <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="profile-tab">
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
                                                        <th scope="col">EST Fare</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $data = array(
                                                    "request" => "0"
                                                );
                                                $json_data = @curl_request($data, $url);
                                                
                                                if(is_array($json_data['msg']) || is_object($json_data['msg'])) 
                                                {
                                                    foreach ($json_data['msg'] as $singleRow) 
                                                    {
                                                        ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="tabel-img-container">
                                                                        <input type="checkbox">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <?php echo $singleRow['Request']['id']; ?>
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
                                                                <td title="<?php echo $singleRow['Request']['pickup_location']; ?>">
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['Request']['pickup_lat'].",".$singleRow['Request']['pickup_long']; ?>">View Map</a>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Request']['dropoff_location']; ?>">
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['Request']['dropoff_lat'].",".$singleRow['Request']['dropoff_long']; ?>">View Map</a>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Request']['dropoff_location']; ?>">
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['Request']['estimated_fare']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['Request']['request'] == '0')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnPending rider_changeStatus" data-id='.$singleRow["Request"]["id"].' >Pending</span>';
                                                                            }
                                                                            if($singleRow['Request']['request'] == '1')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive rider_changeStatus" data-id='.$singleRow["Request"]["id"].' >Accept</span>';
                                                                            }
                                                                            if($singleRow['Request']['request'] == '2')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnCancel">Reject</span>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td title="<?php echo $singleRow['Request']['created'];?>">
                                                                    <?php
                                                                        $timestamp = strtotime($singleRow['Request']['created']);
                                                                        echo date("d M Y", $timestamp);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="dashboard.php?p=tripRequestDetails&amp;id=<?php echo $singleRow['Request']['id']; ?>"><i title="Order Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;&nbsp;
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
                                <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="contact-tab">
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
                                                        <th scope="col">EST Fare</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $data = array(
                                                    "request" => "1"
                                                );
                                                $json_data = @curl_request($data, $url);
                                                
                                                if(is_array($json_data['msg']) || is_object($json_data['msg'])) 
                                                {
                                                    foreach ($json_data['msg'] as $singleRow) 
                                                    {
                                                        ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="tabel-img-container">
                                                                        <input type="checkbox">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <?php echo $singleRow['Request']['id']; ?>
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
                                                                <td title="<?php echo $singleRow['Request']['pickup_location']; ?>">
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['Request']['pickup_lat'].",".$singleRow['Request']['pickup_long']; ?>">View Map</a>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Request']['dropoff_location']; ?>">
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['Request']['dropoff_lat'].",".$singleRow['Request']['dropoff_long']; ?>">View Map</a>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Request']['dropoff_location']; ?>">
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['Request']['estimated_fare']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['Request']['request'] == '0')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnPending rider_changeStatus" data-id='.$singleRow["Request"]["id"].' >Pending</span>';
                                                                            }
                                                                            if($singleRow['Request']['request'] == '1')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive rider_changeStatus" data-id='.$singleRow["Request"]["id"].' >Accept</span>';
                                                                            }
                                                                            if($singleRow['Request']['request'] == '2')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnCancel">Reject</span>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td title="<?php echo $singleRow['Request']['created'];?>">
                                                                    <?php
                                                                        $timestamp = strtotime($singleRow['Request']['created']);
                                                                        echo date("d M Y", $timestamp);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="dashboard.php?p=tripRequestDetails&amp;id=<?php echo $singleRow['Request']['id']; ?>"><i title="Order Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;&nbsp;
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
                                <div class="tab-pane fade" id="ordercancel" role="tabpanel" aria-labelledby="ordercancel-tab">
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
                                                        <th scope="col">EST Fare</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $data = array(
                                                    "request" => "2"
                                                );
                                                $json_data = @curl_request($data, $url);
                                                
                                                if(is_array($json_data['msg']) || is_object($json_data['msg'])) 
                                                {
                                                    foreach ($json_data['msg'] as $singleRow) 
                                                    {
                                                        ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="tabel-img-container">
                                                                        <input type="checkbox">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <?php echo $singleRow['Request']['id']; ?>
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
                                                                <td title="<?php echo $singleRow['Request']['pickup_location']; ?>">
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['Request']['pickup_lat'].",".$singleRow['Request']['pickup_long']; ?>">View Map</a>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Request']['dropoff_location']; ?>">
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['Request']['dropoff_lat'].",".$singleRow['Request']['dropoff_long']; ?>">View Map</a>
                                                                </td>
                                                                <td title="<?php echo $singleRow['Request']['dropoff_location']; ?>">
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['Request']['estimated_fare']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['Request']['request'] == '0')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnPending rider_changeStatus" data-id='.$singleRow["Request"]["id"].' >Pending</span>';
                                                                            }
                                                                            if($singleRow['Request']['request'] == '1')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive rider_changeStatus" data-id='.$singleRow["Request"]["id"].' >Accept</span>';
                                                                            }
                                                                            if($singleRow['Request']['request'] == '2')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnCancel">Reject</span>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td title="<?php echo $singleRow['Request']['created'];?>">
                                                                    <?php
                                                                        $timestamp = strtotime($singleRow['Request']['created']);
                                                                        echo date("d M Y", $timestamp);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="dashboard.php?p=tripRequestDetails&amp;id=<?php echo $singleRow['Request']['id']; ?>"><i title="Order Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;&nbsp;
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