<?php
    if (isset($_SESSION[PRE_FIX . 'id']))  
    {
        $url = $baseurl . 'showRestaurants'; 
        $data = array();
        $json_data = @curl_request($data, $url);
        
        
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Restaurants</div>
                        <div class="page-header-btn">
                            <button class="add-product-btn" onclick="addRestaurant()">Add Restaurants</button>
                        </div>
                    </div>
                    <div class="content-page-container">
                        <div class="content-tabel-container">
                            <div class="content-tabel-nav">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#All" role="tab" aria-controls="home" aria-selected="true">All</a>
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
                                                    <th scope="col">Owner Name</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Min Order Price</th>
                                                    <th scope="col">Created</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
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
                                                                    <div class="td-container">
                                                                        <?php echo $singleRow['Restaurant']['id']; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php echo $singleRow['User']['first_name']." ".$singleRow['User']['last_name'] ; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            $name = strtolower($singleRow['Restaurant']['name']); 
                                                                            echo ucwords($name);
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            echo $singleRow['Restaurant']['min_order_price'];
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <td title="<?php echo date("d M Y h:i A",strtotime($singleRow['Restaurant']['created']));?>">
                                                                    <div class="td-container">
                                                                        <?php
                                                                            $timestamp = strtotime($singleRow['Restaurant']['created']);
                                                                            echo date("d M Y", $timestamp);
                                                                        ?>
                                                                    </div>
                                                                    
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <div class="dropdown">
                                                                            <i title="Edit Restaurant" class="fas fa-edit" style="color:#90908f;cursor: pointer;" onclick="editRestaurant(<?php echo $singleRow['Restaurant']['id']; ?>)"></i>&nbsp;
                                                                            <i title="Add Restaurant Timing" class="fas fa-clock" style="color:#90908f;cursor: pointer;" onclick="addRestaurantTiming(<?php echo $singleRow['Restaurant']['id']; ?>)"></i>&nbsp;
                                                                            <a href="dashboard.php?p=restaurantManageMenu&id=<?php echo $singleRow['Restaurant']['id']?>"><i title="Manage Menu" class="fas fa-utensils fa-fw" style="color:#90908f;cursor: pointer;"></i></a>&nbsp;
                                                                            <i title="Setup Category" class="fas fa-edit" style="color:#90908f;cursor: pointer;" onclick="addRestaurantCategory(<?php echo $singleRow['Restaurant']['id']; ?>)"></i>
                                                                        </div>
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
        echo "<script>window.location='index.php'</script>";
        die;
    }
?>