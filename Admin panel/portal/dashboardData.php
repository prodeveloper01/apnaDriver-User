<?php
    if (isset($_SESSION[PRE_FIX . 'id']))  
    {
            echo $url = $baseurl . 'stats';
            $data = array();
            
            $json_data = @curl_request($data, $url);
            $json_data = $json_data['msg'];
            ?>
                <div class="main-content-container">
                    <div class="main-content-container-wrap">
                        <div class="dashboard-title-container">
                            <h2>Overview Dashboard</h2>
                        </div>
                        <div class="content-sec-container">
                            
                            <div class="content-sec-container-content">
                                <div class="content-sec-container-card-wrap">
                                    <div class="content-sec-container-card">
                                        <h2>Food Delivery</h2>
                                        <p>
                                            Total Orders
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['FoodDelivery']['total_orders'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Pending Orders
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['FoodDelivery']['pending_orders'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Active Orders
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['FoodDelivery']['active_orders'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Completed Orders
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['FoodDelivery']['completed_orders'];
                                                ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="content-sec-container-card">
                                        <h2>Parcel Delivery</h2>
                                        <p>
                                            Total Orders
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['ParcelDelivery']['total_orders'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Pending Orders
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['ParcelDelivery']['pending_orders'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Active Orders
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['ParcelDelivery']['active_orders'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Completed Orders
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['ParcelDelivery']['completed_orders'];
                                                ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="content-sec-container-card">
                                        <h2>Ride Hailing</h2>
                                        <p>
                                            Total Orders
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['RideSharing']['total_orders'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Completed Orders
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['RideSharing']['completed_orders'];
                                                ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="content-sec-container-card">
                                        <h2>Total Sales</h2>
                                        <h5>
                                            <?php 
                                                echo $_SESSION[PRE_FIX.'currency_symbol']; 
                                                echo $json_data['FoodDelivery']['total_sales']+$json_data['ParcelDelivery']['total_sales']+$json_data['RideSharing']['total_sales']
                                            ?>  
                                        </h5>
                                        <p>
                                            Food Delivery
                                            <span style="float: right;">
                                                <?php
                                                    echo $_SESSION[PRE_FIX.'currency_symbol'].$json_data['FoodDelivery']['total_sales'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Parcel Delivery
                                            <span style="float: right;">
                                                <?php
                                                    echo $_SESSION[PRE_FIX.'currency_symbol'].$json_data['ParcelDelivery']['total_sales'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Ride Hailing
                                            <span style="float: right;">
                                                <?php
                                                    echo $_SESSION[PRE_FIX.'currency_symbol'].$json_data['RideSharing']['total_sales'];
                                                ?>
                                            </span>
                                        </p>
                                        
                                    </div>
                                    
                                </div>
                                
                                <br>
                                <div class="content-sec-container-card-wrap">
                                    <div class="content-sec-container-card">
                                        <h2>Drivers</h2>
                                        <p>
                                            Total Drivers
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['Drivers']['total'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Online Drivers
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['Drivers']['total_online'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Offline Drivers
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['Drivers']['total_offline'];
                                                ?>
                                            </span>
                                        </p>
                                        
                                    </div>
                                    <div class="content-sec-container-card">
                                        <h2>Users</h2>
                                        <p>
                                            Total Users
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['Users']['total'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Total Customers
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['Users']['customers'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Total Drivers
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['Users']['drivers'];
                                                ?>
                                            </span>
                                        </p>
                                        <p>
                                            Total Vendors
                                            <span style="float: right;">
                                                <?php
                                                    echo $json_data['Users']['vendors'];
                                                ?>
                                            </span>
                                        </p>
                                       
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
        echo "<script>window.location='index.php'</script>";
        die;
    }
?>