<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showUsers';
        $data = array(
            "role"=> "driver"
        );
        $json_data = @curl_request($data, $url);
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Riders</div>
                        <div class="page-header-btn">
                            <button class="add-product-btn addRider">Add Rider</button>
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
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Online</th>
                                                    <th scope="col">Status</th>
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
                                                                        <?php echo $singleRow['User']['id']; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php echo $singleRow['User']['first_name'].' '.$singleRow['User']['last_name']; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php echo $singleRow['User']['email']; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            echo $singleRow['User']['phone'];  
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php
                                                                            if($singleRow['User']['online'] =="1" )
                                                                            {
                                                                                echo "<span style='color:green; text-transform: capitalize;'>Online</span>";
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "<span style='color:orange; text-transform: capitalize;'>Ofline</span>";  
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php 
                                                                            if($singleRow['User']['active']=="0")
                                                                            {
                                                                                echo "Pending";
                                                                            }
                                                                            else
                                                                            if($singleRow['User']['active']=="1")
                                                                            {
                                                                                echo "Active";
                                                                            }
                                                                            else
                                                                            if($singleRow['User']['active']=="2")
                                                                            {
                                                                                echo "<span style='color:red; text-transform: capitalize;'>Blocked</span>"; 
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <td title="<?php echo $singleRow['User']['created'];?>">
                                                                    <div class="td-container">
                                                                        <?php
                                                                            $timestamp = strtotime($singleRow['User']['created']);
                                                                            echo date("d M Y", $timestamp);
                                                                        ?>
                                                                    </div>
                                                                    
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <div class="dropdown">
                                                                            <i title="Edit" class="fas fa-edit" style="color:#90908f;cursor: pointer;" onclick="editRider('<?php echo $singleRow['User']['id']; ?>')"></i>&nbsp;&nbsp;
                                                                            <a href="dashboard.php?p=riderDetail&id=<?php echo $singleRow['User']['id'];?>"><i title="Detail" class="fas fa-clone" style="color:#90908f;cursor: pointer;"></i></a>
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