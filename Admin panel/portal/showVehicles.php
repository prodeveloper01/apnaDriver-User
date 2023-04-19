<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showVehicles';
        $data = array();
        $json_data = @curl_request($data, $url);
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Vehicle Type</div>
                        <div class="page-header-btn">
                            <button class="add-product-btn" >Add Vehicle</button>
                            <!-- onclick="addVehicle()" -->
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
                            <div class="filter-order-conatiner">
                                <div class="filter-order-search-conatiner">
                                    <input type="search" placeholder="Search" autocapitalize="off" autocomplete="off" autocorrect="off" value="">
                                    <svg viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M8 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm9.707 4.293-4.82-4.82A5.968 5.968 0 0 0 14 8 6 6 0 0 0 2 8a6 6 0 0 0 6 6 5.968 5.968 0 0 0 3.473-1.113l4.82 4.82a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414z"></path></svg>
                                </div>
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Product vendor
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <ul>
                                            <li>
                                                <input type="radio">
                                                <label>Open</label>
                                            </li>
                                            <li>
                                                <input type="radio">
                                                <label>Archived</label>
                                            </li>
                                            <li>
                                                <input type="radio">
                                                <label>Canceled</label>
                                            </li>
                                        </ul>
                                        <button>Clear</button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tagged with
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <ul>
                                            <li>
                                                <input type="checkbox">
                                                <label>Open</label>
                                            </li>
                                            <li>
                                                <input type="checkbox">
                                                <label>Archived</label>
                                            </li>
                                            <li>
                                                <input type="checkbox">
                                                <label>Canceled</label>
                                            </li>
                                        </ul>
                                        <button>Clear</button>
                                    </div>
                                </div>
                                <button class="more-filter">More filters</button>
                                <button class="edit-view-btn">
                                    <svg viewBox="0 0 20 20"focusable="false" aria-hidden="true"><path d="M5.2 18a.8.8 0 0 1-.792-.914l.743-5.203-2.917-2.917a.8.8 0 0 1 .434-1.355l4.398-.733 2.218-4.435a.8.8 0 0 1 1.435.008l2.123 4.361 4.498.801a.8.8 0 0 1 .425 1.353l-2.917 2.917.744 5.203a.8.8 0 0 1-1.154.828l-4.382-2.22-4.502 2.223A.792.792 0 0 1 5.2 18z"></path></svg>
                                    Saved
                                </button>
                                <button class="edit-view-btn">
                                    <svg viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M5.293 2.293a.997.997 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414L7 5.414V13a1 1 0 1 1-2 0V5.414L3.707 6.707a1 1 0 0 1-1.414-1.414l3-3zM13 7a1 1 0 0 1 2 0v7.585l1.293-1.292a.999.999 0 1 1 1.414 1.414l-3 3a.997.997 0 0 1-1.414 0l-3-3a.997.997 0 0 1 0-1.414.999.999 0 0 1 1.414 0L13 14.585V7z"></path></svg>
                                    Sort
                                </button>
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
                                                    <th scope="col">Model</th>
                                                    <th scope="col">License</th>
                                                    <!-- <th scope="col">Image</th> -->
                                                    <th scope="col">updated</th>
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
                                                                        <?php echo $singleRow['Vehicle']['id']; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php echo ucwords($singleRow['Vehicle']['make']); ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php echo ucwords($singleRow['Vehicle']['model']); ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php echo ucwords($singleRow['Vehicle']['license_plate']); ?>
                                                                    </div>
                                                                </td>
                                                                <!-- <td>
                                                                    <div class="td-container">
                                                                        <img src="<?php $imagebaseurl.$singleRow['Vehicle']['image']; ?>" alt="" srcset="" width="40px" height="30px">
                                                                    </div>
                                                                </td> -->
                                                                <td title="<?php echo $singleRow['Vehicle']['updated'];?>">
                                                                    <div class="td-container">
                                                                        <?php
                                                                            $timestamp = strtotime($singleRow['Vehicle']['updated']);
                                                                            echo date("d M Y", $timestamp);
                                                                        ?>
                                                                    </div>
                                                                    
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <div class="dropdown">
                                                                            <i title="Edit Package Size" class="fas fa-edit" style="color:#90908f;cursor: pointer;" onclick="editVehicle(<?php echo $singleRow['Vehicle']['id']?>)"></i>&nbsp;&nbsp;
                                                                            <a onclick="return confirmAction()" href="process.php?action=deleteVehicle&id=<?php echo $singleRow['Vehicle']['id']?>"><i class="fas fa-trash-alt" style="color:#90908f;cursor: pointer;" ></i></a>
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