<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showParcelOrders';
        
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Parcel Orders</div>
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
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#active" role="tab" aria-controls="contact" aria-selected="false">Active</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="ordercancel-tab" data-toggle="tab" href="#ordercancel" role="tab" aria-controls="ordercancel" aria-selected="false">Cancel</a>
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
                                                        <th scope="col">Sender</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Rider</th>
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
                                                                    <?php echo $singleRow['ParcelOrder']['id']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['sender_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['ParcelOrder']['sender_phone']);?>
                                                                    </div>
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['ParcelOrder']['sender_location_lat'].','.$singleRow['ParcelOrder']['sender_location_long']; ?>" title="<?php echo $singleRow['ParcelOrder']['sender_location_string']; ?>" target="_blank" style="color:rgb(31 81 153);">View on map</a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['ParcelOrder']['price']; ?>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php
                                                                            if($singleRow['ParcelOrder']['status']=='1' || $singleRow['ParcelOrder']['status']=='0')
                                                                            {
                                                                                if(count($singleRow['RiderOrder'])!='0')
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnPending parcel_assignRider" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">
                                                                                            <?php echo $singleRow['RiderOrder']['Rider']['first_name']." ".$singleRow['RiderOrder']['Rider']['last_name']; ?>
                                                                                        </span>
                                                                                    <?php        
                                                                                }
                                                                                else
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnActive parcel_assignRider" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">Assign Rider</span>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            else
                                                                            if($singleRow['ParcelOrder']['status']=='2')
                                                                            {
                                                                                if(count($singleRow['RiderOrder'])!='0')
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnPending" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">
                                                                                            <?php echo $singleRow['RiderOrder']['Rider']['first_name']." ".$singleRow['RiderOrder']['Rider']['last_name']; ?>
                                                                                        </span>
                                                                                    <?php        
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "-";
                                                                            }
                                                                            
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['ParcelOrder']['status'] == '0')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnPending parcel_changeStatus" data-id='.$singleRow["ParcelOrder"]["id"].' >Pending</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '1')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive parcel_changeStatus" data-id='.$singleRow["ParcelOrder"]["id"].' >Active</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '2')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive">Completed</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '3')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnCancel">Cancel</span>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td title="<?php echo $singleRow['ParcelOrder']['created'];?>">
                                                                    <?php
                                                                        $timestamp = strtotime($singleRow['ParcelOrder']['created']);
                                                                        echo date("d M Y", $timestamp);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="dashboard.php?p=parcelOrderDetail&amp;id=<?php echo $singleRow['ParcelOrder']['id']; ?>"><i title="Order Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;&nbsp;
                                                                        
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
                                                        <th scope="col">Sender</th>
                                                        <th scope="col">Receiver</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Item</th>
                                                        <th scope="col">Rider</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $data = array(
                                                    "status" =>"0"
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
                                                                    <?php echo $singleRow['ParcelOrder']['id']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['sender_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['ParcelOrder']['sender_phone']);?>
                                                                    </div>
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['ParcelOrder']['sender_location_lat'].','.$singleRow['ParcelOrder']['sender_location_long']; ?>" title="<?php echo $singleRow['ParcelOrder']['sender_location_string']; ?>" target="_blank" style="color:rgb(31 81 153);">View on map</a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['receiver_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['ParcelOrder']['receiver_phone']);?>
                                                                    </div>
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['ParcelOrder']['receiver_location_lat'].','.$singleRow['ParcelOrder']['receiver_location_long']; ?>" title="<?php echo $singleRow['ParcelOrder']['receiver_location_string']; ?>" target="_blank" style="color:rgb(31 81 153);">View on map</a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['ParcelOrder']['price']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['item_title']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['PackageSize']['title']);?>
                                                                    </div>
                                                                    
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php
                                                                            if($singleRow['ParcelOrder']['status']=='1' || $singleRow['ParcelOrder']['status']=='0')
                                                                            {
                                                                                if(count($singleRow['RiderOrder'])!='0')
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnPending parcel_assignRider" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">
                                                                                            <?php echo $singleRow['RiderOrder']['Rider']['first_name']." ".$singleRow['RiderOrder']['Rider']['last_name']; ?>
                                                                                        </span>
                                                                                    <?php        
                                                                                }
                                                                                else
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnActive parcel_assignRider" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">Assign Rider</span>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            else
                                                                            if($singleRow['ParcelOrder']['status']=='2')
                                                                            {
                                                                                if(count($singleRow['RiderOrder'])!='0')
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnPending" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">
                                                                                            <?php echo $singleRow['RiderOrder']['Rider']['first_name']." ".$singleRow['RiderOrder']['Rider']['last_name']; ?>
                                                                                        </span>
                                                                                    <?php        
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "-";
                                                                            }
                                                                            
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['ParcelOrder']['status'] == '0')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnPending parcel_changeStatus" data-id='.$singleRow["ParcelOrder"]["id"].' >Pending</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '1')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive parcel_changeStatus" data-id='.$singleRow["ParcelOrder"]["id"].' >Active</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '2')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive">Completed</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '3')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnCancel">Cancel</span>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td title="<?php echo $singleRow['ParcelOrder']['created'];?>">
                                                                    <?php
                                                                        $timestamp = strtotime($singleRow['ParcelOrder']['created']);
                                                                        echo date("d M Y", $timestamp);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="dashboard.php?p=parcelOrderDetail&amp;id=<?php echo $singleRow['ParcelOrder']['id']; ?>"><i title="Order Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;&nbsp;
                                                                        
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
                                                        <th scope="col">Sender</th>
                                                        <th scope="col">Receiver</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Item</th>
                                                        <th scope="col">Rider</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $data = array(
                                                    "status" =>"1"
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
                                                                    <?php echo $singleRow['ParcelOrder']['id']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['sender_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['ParcelOrder']['sender_phone']);?>
                                                                    </div>
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['ParcelOrder']['sender_location_lat'].','.$singleRow['ParcelOrder']['sender_location_long']; ?>" title="<?php echo $singleRow['ParcelOrder']['sender_location_string']; ?>" target="_blank" style="color:rgb(31 81 153);">View on map</a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['receiver_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['ParcelOrder']['receiver_phone']);?>
                                                                    </div>
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['ParcelOrder']['receiver_location_lat'].','.$singleRow['ParcelOrder']['receiver_location_long']; ?>" title="<?php echo $singleRow['ParcelOrder']['receiver_location_string']; ?>" target="_blank" style="color:rgb(31 81 153);">View on map</a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['ParcelOrder']['price']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['item_title']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['PackageSize']['title']);?>
                                                                    </div>
                                                                    
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php
                                                                            if($singleRow['ParcelOrder']['status']=='1' || $singleRow['ParcelOrder']['status']=='0')
                                                                            {
                                                                                if(count($singleRow['RiderOrder'])!='0')
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnPending parcel_assignRider" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">
                                                                                            <?php echo $singleRow['RiderOrder']['Rider']['first_name']." ".$singleRow['RiderOrder']['Rider']['last_name']; ?>
                                                                                        </span>
                                                                                    <?php        
                                                                                }
                                                                                else
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnActive parcel_assignRider" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">Assign Rider</span>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            else
                                                                            if($singleRow['ParcelOrder']['status']=='2')
                                                                            {
                                                                                if(count($singleRow['RiderOrder'])!='0')
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnPending" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">
                                                                                            <?php echo $singleRow['RiderOrder']['Rider']['first_name']." ".$singleRow['RiderOrder']['Rider']['last_name']; ?>
                                                                                        </span>
                                                                                    <?php        
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "-";
                                                                            }
                                                                            
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['ParcelOrder']['status'] == '0')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnPending parcel_changeStatus" data-id='.$singleRow["ParcelOrder"]["id"].' >Pending</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '1')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive parcel_changeStatus" data-id='.$singleRow["ParcelOrder"]["id"].' >Active</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '2')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive">Completed</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '3')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnCancel">Cancel</span>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td title="<?php echo $singleRow['ParcelOrder']['created'];?>">
                                                                    <?php
                                                                        $timestamp = strtotime($singleRow['ParcelOrder']['created']);
                                                                        echo date("d M Y", $timestamp);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="dashboard.php?p=parcelOrderDetail&amp;id=<?php echo $singleRow['ParcelOrder']['id']; ?>"><i title="Order Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;&nbsp;
                                                                        
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
                                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                    <div class="order-tabel-container">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <input type="checkbox">
                                                    </th>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Sender</th>
                                                        <th scope="col">Receiver</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Item</th>
                                                        <th scope="col">Rider</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $data = array(
                                                    "status" =>"2"
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
                                                                    <?php echo $singleRow['ParcelOrder']['id']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['sender_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['ParcelOrder']['sender_phone']);?>
                                                                    </div>
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['ParcelOrder']['sender_location_lat'].','.$singleRow['ParcelOrder']['sender_location_long']; ?>" title="<?php echo $singleRow['ParcelOrder']['sender_location_string']; ?>" target="_blank" style="color:rgb(31 81 153);">View on map</a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['receiver_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['ParcelOrder']['receiver_phone']);?>
                                                                    </div>
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['ParcelOrder']['receiver_location_lat'].','.$singleRow['ParcelOrder']['receiver_location_long']; ?>" title="<?php echo $singleRow['ParcelOrder']['receiver_location_string']; ?>" target="_blank" style="color:rgb(31 81 153);">View on map</a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['ParcelOrder']['price']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['item_title']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['PackageSize']['title']);?>
                                                                    </div>
                                                                    
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php
                                                                            if($singleRow['ParcelOrder']['status']=='1' || $singleRow['ParcelOrder']['status']=='0')
                                                                            {
                                                                                if(count($singleRow['RiderOrder'])!='0')
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnPending parcel_assignRider" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">
                                                                                            <?php echo $singleRow['RiderOrder']['Rider']['first_name']." ".$singleRow['RiderOrder']['Rider']['last_name']; ?>
                                                                                        </span>
                                                                                    <?php        
                                                                                }
                                                                                else
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnActive parcel_assignRider" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">Assign Rider</span>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            else
                                                                            if($singleRow['ParcelOrder']['status']=='2')
                                                                            {
                                                                                if(count($singleRow['RiderOrder'])!='0')
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnPending" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">
                                                                                            <?php echo $singleRow['RiderOrder']['Rider']['first_name']." ".$singleRow['RiderOrder']['Rider']['last_name']; ?>
                                                                                        </span>
                                                                                    <?php        
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "-";
                                                                            }
                                                                            
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['ParcelOrder']['status'] == '0')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnPending parcel_changeStatus" data-id='.$singleRow["ParcelOrder"]["id"].' >Pending</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '1')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive parcel_changeStatus" data-id='.$singleRow["ParcelOrder"]["id"].' >Active</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '2')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive">Completed</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '3')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnCancel">Cancel</span>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td title="<?php echo $singleRow['ParcelOrder']['created'];?>">
                                                                    <?php
                                                                        $timestamp = strtotime($singleRow['ParcelOrder']['created']);
                                                                        echo date("d M Y", $timestamp);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="dashboard.php?p=parcelOrderDetail&amp;id=<?php echo $singleRow['ParcelOrder']['id']; ?>"><i title="Order Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;&nbsp;
                                                                        
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
                                                        <th scope="col">Sender</th>
                                                        <th scope="col">Receiver</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Item</th>
                                                        <th scope="col">Rider</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $data = array(
                                                    "status" =>"3"
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
                                                                    <?php echo $singleRow['ParcelOrder']['id']; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['sender_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['ParcelOrder']['sender_phone']);?>
                                                                    </div>
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['ParcelOrder']['sender_location_lat'].','.$singleRow['ParcelOrder']['sender_location_long']; ?>" title="<?php echo $singleRow['ParcelOrder']['sender_location_string']; ?>" target="_blank" style="color:rgb(31 81 153);">View on map</a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['receiver_name']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['ParcelOrder']['receiver_phone']);?>
                                                                    </div>
                                                                    <a href="https://maps.google.com/maps?q=+<?php echo $singleRow['ParcelOrder']['receiver_location_lat'].','.$singleRow['ParcelOrder']['receiver_location_long']; ?>" title="<?php echo $singleRow['ParcelOrder']['receiver_location_string']; ?>" target="_blank" style="color:rgb(31 81 153);">View on map</a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['ParcelOrder']['price']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleRow['ParcelOrder']['item_title']; ?>
                                                                    <div class="tdSubTitle">
                                                                        <?php  echo ucwords($singleRow['PackageSize']['title']);?>
                                                                    </div>
                                                                    
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php
                                                                            if($singleRow['ParcelOrder']['status']=='1' || $singleRow['ParcelOrder']['status']=='0')
                                                                            {
                                                                                if(count($singleRow['RiderOrder'])!='0')
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnPending parcel_assignRider" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">
                                                                                            <?php echo $singleRow['RiderOrder']['Rider']['first_name']." ".$singleRow['RiderOrder']['Rider']['last_name']; ?>
                                                                                        </span>
                                                                                    <?php        
                                                                                }
                                                                                else
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnActive parcel_assignRider" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">Assign Rider</span>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            else
                                                                            if($singleRow['ParcelOrder']['status']=='2')
                                                                            {
                                                                                if(count($singleRow['RiderOrder'])!='0')
                                                                                {
                                                                                    ?>
                                                                                        <span class="statusbtn statusBtnPending" data-id="<?php echo $singleRow['ParcelOrder']['id']; ?>">
                                                                                            <?php echo $singleRow['RiderOrder']['Rider']['first_name']." ".$singleRow['RiderOrder']['Rider']['last_name']; ?>
                                                                                        </span>
                                                                                    <?php        
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "-";
                                                                            }
                                                                            
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['ParcelOrder']['status'] == '0')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnPending parcel_changeStatus" data-id='.$singleRow["ParcelOrder"]["id"].' >Pending</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '1')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive parcel_changeStatus" data-id='.$singleRow["ParcelOrder"]["id"].' >Active</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '2')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnActive">Completed</span>';
                                                                            }
                                                                            if($singleRow['ParcelOrder']['status'] == '3')
                                                                            {
                                                                                echo '<span class="statusbtn statusBtnCancel">Cancel</span>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td title="<?php echo $singleRow['ParcelOrder']['created'];?>">
                                                                    <?php
                                                                        $timestamp = strtotime($singleRow['ParcelOrder']['created']);
                                                                        echo date("d M Y", $timestamp);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="dashboard.php?p=parcelOrderDetail&amp;id=<?php echo $singleRow['ParcelOrder']['id']; ?>"><i title="Order Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;&nbsp;
                                                                        
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