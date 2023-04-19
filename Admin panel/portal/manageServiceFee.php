<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showServiceCharges';
        $data = array();
        $json_data = @curl_request($data, $url);
        
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Manage Service Fee</div>
                    </div>
                    <div class="content-page-container">
                        <div class="content-tabel-container">
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
                                                    <th scope="col">Module Name</th>
                                                    <th scope="col">Commission</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                if(is_array($json_data) || is_object($json_data)) 
                                                {
                                                    if($json_data['code'] == '200') 
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
                                                                        <div class="td-container"><?php echo $singleRow['ServiceCharge']['id']; ?></div>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <?php echo ucwords(str_replace("_"," ",$singleRow['ServiceCharge']['module'])); ?>
                                                                        </div>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <?php  
                                                                                
                                                                                if($singleRow['ServiceCharge']['type']=="2")
                                                                                {
                                                                                    echo $_SESSION[PRE_FIX.'currency_symbol'];
                                                                                }
                                                                                echo $singleRow['ServiceCharge']['value'];
                                                                                if($singleRow['ServiceCharge']['type']=="1")
                                                                                {
                                                                                    echo "%";    
                                                                                }
                                                                            
                                                                            ?>
                                                                            per order
                                                                        </div>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <div class="dropdown">
                                                                                <i title="Edit" class="fas fa-edit" style="color:#90908f;cursor: pointer;" onclick="editServiceFee('<?php echo $singleRow['ServiceCharge']['id']; ?>')"></i>&nbsp;&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                        }
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
        echo "<script>window.location='index.php'</script>";
        die;
    }
?>