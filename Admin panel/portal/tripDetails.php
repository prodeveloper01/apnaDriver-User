<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $id= $_GET['id'];
        $url = $baseurl . 'showTrips';
        $data = array(
            "id" => $id
        );
        
        $json_data = @curl_request($data, $url);
        $json_data = $json_data['msg'];
        
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header-container">
                        <div class="page-header-container-wrap">
                            <div class="page-header-content-container">
                                <div class="page-header-content-left">
                                    <div class="page-header-left-content">
                                        <h1>
                                           Order #<?php echo $id; ?>
                                        </h1>
                                        
                                        <?php
                                       
                                            if($json_data['Request']['payment_type']=="cash")
                                            {
                                                echo '<span class="statusbtn statusBtnActive">Cash</span>';
                                            }
                                            else
                                            {
                                                echo '<span class="statusbtn statusBtnActive">Credit Card</span>';
                                            }
                                            
                                            if($json_data['Trip']['completed'] == '1')
                                            {
                                                echo '<span class="statusbtn statusBtnPending " >Pending Payment</span>';
                                            }
                                            if($json_data['Trip']['completed'] == '2')
                                            {
                                                echo '<span class="statusbtn statusBtnActive"  >Payment Collected</span>';
                                            }
                                            
                                            
                                        ?>
                                    
                                    </div>
                                </div>
                                
                            </div>
                            <div class="header-sub-content">
                                <?php
                                    $timestamp = strtotime($json_data['Trip']['created']);
                                    echo date("M d Y", $timestamp) ." at ";
                                    echo date("h:i a", $timestamp);
                                ?>
                            </div>
                            
                        </div>
                    </div>
                    <section class="page-content-card-container">
                        
                        <div style="margin-left: -20px;">
                            <div class="items-card-container">
                                <div class="items-card-header p-0">
                                    <div class="item-card-body-content pb-0">
                                        <h2 class="descriptionTitle">Order Description</h2>
                                    </div>
                                    <div class="item-card-body-container b--top" style="padding:0px">

                                    <?php
                                        if(is_array($json_data['Trip']) || is_object($json_data['Trip'])) 
                                        { 
                                            ?>
                                                <div class="item-card-body-container" style="border-bottom: 1px solid rgb(225 227 229);"> 
                                                    <!--<strong>Order Name</strong>-->
                                                    <div class="orderDetail">
                                                        
                                                        <div>
                                                            <p>
                                                                <span style="color:black;font-weight: 600;">Ride Type:</span> 
                                                                <?php echo ucfirst($json_data['Vehicle']['RideType']['name']);?>
                                                                (<?php echo ucfirst($json_data['Vehicle']['RideType']['RideSection']['title']);?>)
                                                            </p>
                                                        
                                                            <p><span style="color:black;font-weight: 600;">Pickup Location:</span> <?php echo ucfirst($json_data['Trip']['pickup_location']);?></p>
                                                            <p><span style="color:black;font-weight: 600;">Dropoff Location:</span> <?php echo ucfirst($json_data['Trip']['dropoff_location']);?></p>
                                                        </div>  
                                                    </div>
                                                    <br>
                                                    <div class="orderDetail">
                                                        <div>
                                                            
                                                            <p>
                                                                <span style="color:black;font-weight: 600;">Pickup Time:</span> 
                                                                <?php
                                                                    echo date("M d Y h:i a", strtotime($json_data['Trip']['pickup_datetime']));
                                                                ?>
                                                            </p>
                                                            
                                                            <p>
                                                                <span style="color:black;font-weight: 600;">Dropoff Time:</span> 
                                                                <?php
                                                                    echo date("M d Y h:i a", strtotime($json_data['Trip']['dropoff_datetime']));
                                                                ?>
                                                            </p>
                                                            
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                        
                                                </div>
                                            <?php
                                        }
                                    ?> 

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div style="margin-left: -20px;">
                            <div class="items-card-container">
                                <div class="items-card-header p-0">
                                    <div class="item-card-body-content pb-0">
                                        <h2 class="descriptionTitle">Payment Summery</h2>
                                    </div>
                                    <div class="item-card-body-container b--top" style="padding:0px">

                                        <div class="payment-card-body-container"> 
                                            <div class="orderDetail">
                                                <div>
                                                    Trip Fare                                                                
                                                </div>  
                                                <p> <?php echo $_SESSION[PRE_FIX.'currency_symbol']; ?><?php echo $json_data['Trip']['trip_fare']; ?></p>
                                            </div>
                                        </div>
                                        
                                        <div class="payment-card-body-container"> 
                                            <div class="orderDetail">
                                                <div>
                                                    Initial Waiting Time                                                          
                                                </div>  
                                                <p> <?php echo $_SESSION[PRE_FIX.'currency_symbol']; ?><?php echo $json_data['Trip']['initial_waiting_time_price']; ?></p>
                                            </div>
                                        </div>
                                        
                                        <div class="payment-card-body-container"> 
                                            <div class="orderDetail">
                                                <div>
                                                    Discount                                                                 
                                                </div>  
                                                <p> 
                                                    <?php
                                                        if($json_data['Request']['coupon_id']!="0")
                                                        {
                                                            echo $json_data['Coupon']['discount'];
                                                        }
                                                        else
                                                        {
                                                            echo "-";
                                                        }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="payment-card-body-container"> 
                                            <div class="orderDetail">
                                                <div>
                                                    Payment Type                                                                 
                                                </div>  
                                                <p>
                                                    <?php
                                                        if($json_data['Request']['payment_type']=="cash")
                                                        {
                                                            echo "Cash";
                                                        }
                                                        else
                                                        {
                                                            echo "Credit Card";
                                                        }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="payment-card-body-container" style="border-bottom: 1px solid rgb(225 227 229);"> 
                                            <div class="orderDetail">
                                                <div>
                                                    Total                                                                 
                                                </div>  
                                                <p> <?php echo $_SESSION[PRE_FIX.'currency_symbol']; ?><?php echo $json_data['Trip']['ride_fare']; ?></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="right-sec-card-container">
                            
                            <?php
                                if(count($json_data['Driver'])!="0") 
                                {
                                    ?>
                                        <div class="items-card-container">
                                            <div class="item-card-body-container b--top">
                                                <div class="item-card-body-content">
                                                    <h3>RIDER NAME</h3>
                                                    
                                                </div>
                                                <div class="item-note" style="align-items: flex-start;">
                                                    <div class="shipping-address"> 
                                                        <?php  
                                                            $name = strtolower($json_data['Driver']['first_name'].' '.$json_data['Driver']['last_name']);
                                                            echo ucwords($name);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-card-body-container b--top">
                                                <div class="item-card-body-content">
                                                    <h3>CONTACT INFORMATION</h3>
                                                </div>
                                                <div class="item-note">
                                                    <?php
                                                        echo $json_data['Driver']['phone'].'<br>';   
                                                    ?>
                                                    <a href="#"><?php echo $json_data['Driver']['email'];?></a>
                                                </div>
                                            </div>
                                            <div class="item-card-body-container b--top">
                                                <div class="item-card-body-content">
                                                    <h3>VEHICLE</h3>
                                                </div>
                                                <div class="item-note" style="align-items: flex-start;">
                                                    <div class="shipping-address">
                                                        <?php 
                                                            echo $json_data['Vehicle']['make']." ".$json_data['Vehicle']['model'];
                                                        ?>
                                                        (<?php echo ucfirst($json_data['Vehicle']['RideType']['name']);?>)
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-card-body-container b--top">
                                                <div class="item-card-body-content">
                                                    <h3>created</h3>
                                                </div>
                                                <div class="item-note" style="align-items: flex-start;">
                                                    <div class="shipping-address">
                                                        <?php                 
                                                            $timestamp = strtotime($json_data['User']['created']);
                                                            echo date("d M Y h:i a", $timestamp);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php        
                                }
                                else
                                {
                                    ?>
                                        <div class="items-card-container">
                                            <div class="item-card-body-container b--top">
                                                <div class="item-card-body-content">
                                                    <h3>Assign Rider</h3>
                                                    
                                                </div>
                                                <div class="item-note" style="align-items: flex-start;">
                                                    <a href="#" class="assignRider" data-id="<?php echo $id; ?>">Assign Rider</a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    <?php
                                }
                                
                            ?>
                            
                            
                            
                            <div class="items-card-container">
                                <div class="item-card-body-container b--top">
                                    <div class="item-card-body-content">
                                        <h3>Customer Name</h3>
                                        
                                    </div>
                                    <div class="item-note" style="align-items: flex-start;">
                                        <div class="shipping-address"> 
                                            <?php  
                                                $name = strtolower($json_data['User']['first_name'].' '.$json_data['User']['last_name']);
                                                echo ucwords($name);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-card-body-container b--top">
                                    <div class="item-card-body-content">
                                        <h3>CONTACT INFORMATION</h3>
                                    </div>
                                    <div class="item-note">
                                        <?php
                                            echo $json_data['User']['phone'].'<br>';   
                                        ?>
                                        <a href="#"><?php echo $json_data['User']['email'];?></a>
                                    </div>
                                </div>
                                
                                <div class="item-card-body-container b--top">
                                    <div class="item-card-body-content">
                                        <h3>created</h3>
                                    </div>
                                    <div class="item-note" style="align-items: flex-start;">
                                        <div class="shipping-address">
                                            <?php                 
                                                $timestamp = strtotime($json_data['User']['created']);
                                                echo date("d M Y h:i a", $timestamp);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </section>
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