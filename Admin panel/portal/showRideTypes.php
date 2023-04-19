<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showRideTypes';
        $data = array();
        $json_data = @curl_request($data, $url);
        
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Ride Type</div>
                        <div class="page-header-btn">
                            <button class="add-product-btn" onclick="addRideType()">Add Ride Type</button>
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
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Passenger Capacity</th>
                                                    <th scope="col">Base Fare</th>
                                                    <th scope="col">Cost Per Minute</th>
                                                    <th scope="col">Cost Per Distance</th>
                                                    <th scope="col">Distance Unit</th>
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
                                                                        <?php echo $singleRow['RideType']['id']; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php echo ucwords($singleRow['RideType']['name']); ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            echo $singleRow['RideType']['passenger_capacity'];  
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['RideType']['base_fare'];  
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['RideType']['cost_per_minute'];  
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            echo $_SESSION[PRE_FIX.'currency_symbol'].$singleRow['RideType']['cost_per_distance'];  
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['RideType']['distance_unit']=="K")
                                                                            {
                                                                                echo "KM";
                                                                            }
                                                                            else
                                                                            if($singleRow['RideType']['distance_unit']=="M")
                                                                            {
                                                                                echo "M";
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
                                                                        <div class="dropdown">
                                                                            <i title="Edit Package Size" class="fas fa-edit" style="color:#90908f;cursor: pointer;" onclick="editRideType(<?php echo $singleRow['RideType']['id']?>)"></i>&nbsp;&nbsp;
                                                                            <a onclick="return confirmAction()" href="process.php?action=deleteRideType&id=<?php echo $singleRow['RideType']['id']?>"><i class="fas fa-trash-alt" style="color:#90908f;cursor: pointer;" ></i></a>
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