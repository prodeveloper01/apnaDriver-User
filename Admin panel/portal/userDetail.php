<?php
    if (isset($_SESSION[PRE_FIX . 'id']))  
    {
        $id=$_GET['id'];
        $url = $baseurl . 'showUsers';
        $data = array(
            "user_id" => $id
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
                                            <?php 
                                                //$leadtitle = strtolower($json_data['Lead']['subject']);
                                                //echo ucwords($leadtitle);
                                            ?>
                                        </h1>
                                    </div>
                                    
                                </div> 
                            </div>
                            <div class="header-sub-content">
                                <?php
                                    //$timestamp = strtotime($json_data['Lead']['created']);
                                    //echo date("d M Y h:i a", $timestamp);
                                ?>
                            </div>
                        </div>
                    </div>
                    <section class="page-content-card-container">
                        <div class="left-sec-card-container">
                            <div class="items-card-container">
                                <div class="items-card-header p-0">
                                    <div class="item-card-body-content pb-0">
                                        <h2 class="descriptionTitle">
                                            <?php  
                                                $name = strtolower($json_data['User']['first_name'].' '.$json_data['User']['last_name']);
                                                echo ucwords($name);
                                            ?>
                                        </h2>
                                        
                                    </div>
                                    <div style="padding:0px 20px;">
                                            <?php 
                                                echo $json_data['Country']['name'];
                                            ?>
                                        </div>
                                    <div class="item-card-body-container">
                                    </div>
                                </div>
                            </div>
                            <div class="items-card-container">
                                <div class="item-card-body-container">
                                    <?php 
                                        foreach($json_data['User']['FoodOrder'] as $singleRow)
                                        {
                                            foreach($singleRow['FoodOrderMenuItem'] as $row)
                                            {
                                                ?>
                                                    <div class="sub-total-container usersub-total">
                                                        <div class="sub-total-content">
                                                            <div class="Subtotal"><?php echo $row['name'];?></div>
                                                            <div class="subtotal-wrap">
                                                                <span><?php echo $row['quantity'];?> Quantity</span>
                                                                <span>PKR <?php echo $row['price'];?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        }             
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <div class="leave-comment-container">
                            <div class="leave-comment-header">
                                <h2></h2>
                                <div class="leave-coment-header-check-box">
                                    <!-- <input type="checkbox" id="comment">
                                    <label for="comment">Show comments</label> -->
                                </div>
                            </div>
                            <div class="leave-comment-body-container">
                                
                                <div class="leave-comment-body-content">
                                    
                                    <ul>  
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="right-sec-card-container">
                            <div class="items-card-container">
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
                                        <h3>Role</h3>
                                    </div>
                                    <div class="item-note" style="align-items: flex-start;">
                                        <div class="shipping-address">
                                            <?php 
                                                echo $json_data['User']['role'];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-card-body-container b--top">
                                    <div class="item-card-body-content">
                                        <h3>Gender</h3>
                                    </div>
                                    <div class="item-note" style="align-items: flex-start;">
                                        <div class="shipping-address">
                                            <?php 
                                                echo $json_data['User']['gender'];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-card-body-container b--top">
                                    <div class="item-card-body-content">
                                        <h3>Country</h3>
                                    </div>
                                    <div class="item-note" style="align-items: flex-start;">
                                        <div class="shipping-address">
                                            <?php 
                                                echo $json_data['Country']['name'];
                                            ?>
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
                            <div class="items-card-container">
                                <div class="item-card-body-container">
                                    <div class="item-card-body-content">
                                        <h3>Status</h3>
                                    </div>
                                    <div class="item-note">
                                        <?php 
                                            if($json_data['User']['active']=="0")
                                            {
                                                echo "Pending";
                                            }
                                            else
                                            if($json_data['User']['active']=="1")
                                            {
                                                echo "Active";
                                            }
                                            else
                                            if($json_data['User']['active']=="2")
                                            {
                                                echo "<span style='color:red; text-transform: capitalize;'>Blocked</span>"; 
                                            }
                                            
                                        ?>
                                    </div>
                                </div>
                                <div class="item-card-body-container b--top">
                                    <div class="item-card-body-content">
                                        <h3>Online Status</h3>
                                    </div>
                                    <div class="item-note">
                                        <?php 
                                            if($json_data['User']['online']=="0")
                                            {
                                                echo "<span style='color:red; text-transform: capitalize;'>Offline</span>";
                                            }
                                            else
                                            if($json_data['User']['active']=="1")
                                            {
                                                echo "<span style='color:green; text-transform: capitalize;'>Online</span>";
                                            }
                                        ?>
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