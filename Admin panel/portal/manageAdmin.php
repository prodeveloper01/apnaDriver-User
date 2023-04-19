<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showAdminUsers';
        $data = array();
        $json_data = @curl_request($data, $url);
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Manage Admin</div>
                        <div class="page-header-btn">
                            <button class="add-product-btn" onclick="addAdminUser();">Add Admin</button>
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
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Unfulfilled" role="tab" aria-controls="profile" aria-selected="false">Active</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Unpaid" role="tab" aria-controls="contact" aria-selected="false">Draft</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Open" role="tab" aria-controls="contact" aria-selected="false">Archived</a>
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
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Created</th>
                                                    <th scope="col">Status</th>
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
                                                                        <div class="td-container"><?php echo $singleRow['Admin']['id']; ?></div>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <?php 
                                                                                $name = strtolower($singleRow['Admin']['first_name'].' '.$singleRow['Admin']['last_name']); 
                                                                                echo ucwords($name);
                                                                            ?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <?php echo $singleRow['Admin']['email']; ?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="td-container"><?php  echo $singleRow['Admin']['role'];?></div>
                                                                    </td>
                                                                    <td title="<?php echo $singleRow['Admin']['created'];?>">
                                                                        <div class="td-container">
                                                                            <?php
                                                                                $timestamp = strtotime($singleRow['Admin']['created']);
                                                                                echo date("d M Y", $timestamp);
                                                                            ?>
                                                                        </div>
                                                                        
                                                                    </td>
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <div class="dropdown">
                                                                                <?php 
                                                                                    if($singleRow['Admin']['active'] == "1")
                                                                                    {
                                                                                        echo '<button class="statusbtn" type="button" > Active</button>';
                                                                                    }
                                                                                    elseif($singleRow['Admin']['active'] == "0")
                                                                                    {
                                                                                        echo '<button class="statusbtn" type="button" style="background:rgb(228, 229, 231) !important;" > UnActive</button>';
                                                                                    }
                                                                                ?>
                                                                                
                                                                            </div> 
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <div class="dropdown">
                                                                                <i title="Edit Admin" class="fas fa-edit" style="color:#90908f;cursor: pointer;" onclick="editAdminUser('<?php echo $singleRow['Admin']['id']; ?>')"></i>&nbsp;&nbsp;
                                                                                <i title="Change Password" class="fas fa-key" style="color: #90908f;cursor: pointer;" onclick="changeAdminPassword(<?php echo $singleRow['Admin']['id'] ?>)"></i>&nbsp;&nbsp;
                                                                                
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