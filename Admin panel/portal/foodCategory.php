<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showFoodCategory';
        $data = array();
        $json_data = @curl_request($data, $url);
        ?>
            <div class="main-content-container">
                <div class="main-content-container-wrap">
                    <div class="content-page-header">
                        <div class="page-header-text">Food Category</div>
                        <div class="page-header-btn">
                            <button class="add-product-btn" onclick="addFoodCategory()">Add Food Category</button>
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
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Icon</th>
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
                                                                        <?php echo $singleRow['FoodCategory']['id']; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <?php echo ucwords(strtolower($singleRow['FoodCategory']['title'])) ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <img src="<?php echo $imagebaseurl.$singleRow['FoodCategory']['image']; ?>" alt="" srcset="" width="40px" height="30px">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <img src="<?php echo $imagebaseurl.$singleRow['FoodCategory']['icon']; ?>" alt="" srcset="" width="30px" height="30px">
                                                                    </div>
                                                                </td>
                                                                <td title="<?php echo $singleRow['FoodCategory']['created'];?>">
                                                                    <div class="td-container">
                                                                        <?php
                                                                            $timestamp = strtotime($singleRow['FoodCategory']['created']);
                                                                            echo date("d M Y", $timestamp);
                                                                        ?>
                                                                    </div>
                                                                    
                                                                </td>
                                                                <td>
                                                                    <div class="td-container">
                                                                        <div class="dropdown">
                                                                            <i title="Edit Food Category" class="fas fa-edit" style="color:#90908f;cursor: pointer;" onclick="editFoodCategory('<?php echo $singleRow['FoodCategory']['id']; ?>')"></i>&nbsp;&nbsp;
                                                                            <a onclick="return confirmAction()" href="process.php?action=deleteFoodCategory&id=<?php echo $singleRow['FoodCategory']['id']; ?>"><i title="Delete Category" class="fas fa-trash-alt" style="color: #90908f;cursor: pointer;" ></i></a>
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