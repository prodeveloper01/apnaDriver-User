<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showCountries';
        $data = array();
        $json_data = @curl_request($data, $url);
        
        
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Manage Country</div>
                        <!-- <div class="page-header-btn">
                            <button class="add-product-btn" onclick="addForce();">Add Force</button>
                        </div> -->
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
                                                    <th scope="col">Country Code</th>
                                                    <th scope="col">Default</th>
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
                                                                        <div class="td-container"><?php echo $singleRow['Country']['id']; ?></div>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <?php 
                                                                                $name = strtolower($singleRow['Country']['name']); 
                                                                                echo ucwords($name);
                                                                            ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <?php echo $singleRow['Country']['country_code']; ?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <div class="dropdown">
                                                                                <?php 
                                                                                    if($singleRow['Country']['default'] == "1")
                                                                                    {
                                                                                        echo '<button class="statusbtn" type="button" style="background:rgb(174 233 209) !important;"> Default</button>';
                                                                                    }
                                                                                    elseif($singleRow['Country']['default'] == "0")
                                                                                    {
                                                                                        ?>
                                                                                            <a href="process.php?action=updateDefaultCountry&id=<?php echo $singleRow['Country']['id']; ?>">
                                                                                                <button class="statusbtn" type="button" style="background:rgb(228, 229, 231) !important;" > Set as default</button>
                                                                                            </a>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                                
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