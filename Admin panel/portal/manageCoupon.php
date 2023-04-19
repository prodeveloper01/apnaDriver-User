<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showCoupons';
        $data = array();
        $json_data = @curl_request($data, $url);
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Manage Coupon</div>
                        <div class="page-header-btn">
                            <button class="add-product-btn" onclick="addCoupon();">Add Coupon</button>
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
                                                    <th scope="col">Code</th>
                                                    <th scope="col">Discount</th>
                                                    <th scope="col">Expire Date</th>
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
                                                                        <div class="td-container"><?php echo $singleRow['Coupon']['id']; ?></div>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <?php echo $singleRow['Coupon']['coupon_code']; ?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <?php echo $singleRow['Coupon']['discount']; ?>
                                                                        </div>
                                                                    </td>
                                                                    <td title="<?php echo $singleRow['Coupon']['expiry_date'];?>">
                                                                        <div class="td-container">
                                                                            <?php
                                                                                $timestamp = strtotime($singleRow['Coupon']['expiry_date']);
                                                                                echo date("d M Y", $timestamp);
                                                                            ?>
                                                                        </div>
                                                                        
                                                                    </td>
                                                                    <td>
                                                                        <div class="td-container">
                                                                            <div class="dropdown">
                                                                                <i title="Edit Coupon" class="fas fa-edit" style="color:#90908f;cursor: pointer;" onclick="editCoupon('<?php echo $singleRow['Coupon']['id']; ?>')"></i>&nbsp;&nbsp;
                                                                                <a onclick="return confirmAction()" href="process.php?action=deleteCoupon&id=<?php echo $singleRow['Coupon']['id']; ?>"><i title="Delete Couopn" class="fas fa-trash-alt" style="color: #90908f;cursor: pointer;" ></i></a>
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