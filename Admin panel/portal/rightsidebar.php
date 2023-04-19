<?php 
    if(isset($_GET['p']))
    {
        if($_GET['p'] == 'users')
        {
            $user ="active-side-bar";
        }
        if($_GET['p'] == 'rider')
        {
            $rider ="active-side-bar";
        }

        if($_GET['p'] == 'restaurants')
        {
            $restaurants ="active-side-bar";
            
        }
        if($_GET['p'] == 'foodCategory')
        {
            $foodCategory ="active-side-bar";
            
        }
        
        if($_GET['p'] == 'sliderImage')
        {
            $manageSlider ="active-side-bar";
            
        }
        
        
        if($_GET['p'] == 'foodOrders')
        {
            $foodOrders ="active-side-bar";
            
        }
        if($_GET['p'] == 'setting')
        {
            $setting ="active-side-bar";
        }

        if($_GET['p'] == 'packageSize')
        {
            $packageSize ="active-side-bar";
        }
        if($_GET['p'] == 'goodType')
        {
            $goodType ="active-side-bar";
        }
        if($_GET['p'] == 'showParcelOrders')
        {
            $showParcelOrders ="active-side-bar";
            
        }

        if($_GET['p'] == 'manageTrip')
        {
            $manageTrip ="active-side-bar";
            $drop3 ="d-block";
        }
        
        if($_GET['p'] == 'tripRequest')
        {
            $tripRequest ="active-side-bar";
            $drop3 ="d-block";
        }
        
        
    }
?>

<div class="sidebar-container">
    <div class="sidebar-navigation-container">
        <div class="sidebar-navigation">
            <ul class="navigation-content-container">
                <li class="navigation-list-item">
                    <a href="dashboard.php?p=dashboard" class="list-item-content">
                        <i class="fa fa-tachometer sidebarIcon" aria-hidden="true"></i>
                        <span class="list-item-text">Dashboard</span>
                    </a>
                </li>
                <li class="navigation-list-item">
                    <a href="dashboard.php?p=users" class="list-item-content <?php echo $user;?>">
                        <i class="fa fa-user sidebarIcon" aria-hidden="true"></i>
                        <span class="list-item-text">Users</span>
                    </a>
                </li>
                <li class="navigation-list-item">
                    <a href="dashboard.php?p=rider" class="list-item-content <?php echo $rider;?>">
                        <i class="fas fa-biking sidebarIcon"></i>
                        <span class="list-item-text">Driver</span> 
                    </a>
                </li>
                <li class="navigation-list-item pushNotification">
                    <a href="#" class="list-item-content">
                        <i class="fas fa-bell sidebarIcon"></i>
                        <span class="list-item-text">Notification</span> 
                    </a>
                </li>
                
            </ul>
            <ul class="navigation-content-container">
                <li class="navigation-list-item">
                    <a href="#" class="list-item-content listitemColor">
                        <span class="list-item-text">SWITCH PROJECT</span>
                    </a>
                </li>
                <li class="navigation-list-item" style="display: block;width:92%;">
                    <a href="process.php?action=defaultProject&id=1" class="list-item-content">
                        <i class="fas fa-box sidebarIcon"></i>
                        <span class="list-item-text">Food Delivery</span>
                        <?php 
                            if(isset($_SESSION[PRE_FIX.'defaultId'])) 
                            {
                                if($_SESSION[PRE_FIX.'defaultId']=="1")
                                {
                                    echo '<div class="order-numbers">Active</div>';
                                    $drop ="d-block";
                                }
                            }
                        ?>
                    </a>
                    <ul class="custom-drop-down <?php echo $drop?>">
                        <li class="navigation-list-item">
                            <a href="dashboard.php?p=restaurants" class="list-item-content <?php echo $restaurants;?>">
                                Manage Restaurants
                            </a>
                        </li>
                        <li class="navigation-list-item">
                            <a href="dashboard.php?p=foodOrders" class="list-item-content <?php echo $foodOrders;?>">
                                Manage Orders
                            </a>
                        </li>
                        <li class="navigation-list-item">
                            <a href="dashboard.php?p=foodCategory" class="list-item-content <?php echo $foodCategory;?>">
                                Manage Categories
                            </a>
                        </li>
                        <li class="navigation-list-item">
                            <a href="dashboard.php?p=sliderImage" class="list-item-content <?php echo $manageSlider;?>">
                                Manage Slider
                            </a>
                        </li>
                        
                        
                    </ul>
                </li>
                <li class="navigation-list-item" style="display: block;width:92%;">
                    <a href="process.php?action=defaultProject&id=2" class="list-item-content">
                        <i class="fad fa-truck-loading sidebarIcon"></i>
                        <span class="list-item-text">Parcel Delivery</span>
                        <?php 
                            if(isset($_SESSION[PRE_FIX.'defaultId'])) 
                            {
                                if($_SESSION[PRE_FIX.'defaultId']=="2")
                                {
                                    echo '<div class="order-numbers">Active</div>';
                                    $drop2 ="d-block";
                                }
                            }
                        ?>
                    </a>
                    <ul class="custom-drop-down <?php echo $drop2?>">
                        <li class="navigation-list-item">
                            <a href="dashboard.php?p=goodType" class="list-item-content <?php echo $goodType;?>">
                                Good Type
                            </a>
                        </li>
                        <li class="navigation-list-item">
                            <a href="dashboard.php?p=showParcelOrders" class="list-item-content <?php echo $showParcelOrders;?>">
                                Manage Orders
                            </a>
                        </li>
                        <li class="navigation-list-item">
                            <a href="dashboard.php?p=packageSize" class="list-item-content <?php echo $packageSize;?>">
                                Package Size
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="navigation-list-item" style="display: block;width:92%;">
                    <a href="process.php?action=defaultProject&id=3" class="list-item-content">
                        <i class="fas fa-car-alt sidebarIcon"></i>
                        <span class="list-item-text">Ride Hailing</span>
                        <?php 
                            if(isset($_SESSION[PRE_FIX.'defaultId'])) 
                            {
                                if($_SESSION[PRE_FIX.'defaultId']=="3")
                                {
                                    echo '<div class="order-numbers">Active</div>';
                                }
                            }
                        ?>
                    </a>
                    <ul class="custom-drop-down <?php echo $drop3?>">
                        <li class="navigation-list-item">
                            <a href="dashboard.php?p=manageTrip" class="list-item-content <?php echo $manageTrip;?>">
                                Manage Trip
                            </a>
                        </li>
                        <li class="navigation-list-item">
                            <a href="dashboard.php?p=tripRequest" class="list-item-content <?php echo $tripRequest;?>">
                                Trip Request
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="footerSidebar">
            <ul class="navigation-content-container">
                <li class="navigation-list-item">
                    <a href="dashboard.php?p=setting" class="list-item-content <?php echo $setting;?>">
                        <i class="fa fa-cog sidebarIcon" aria-hidden="true"></i>
                        <span class="list-item-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Filter side bar  -->
<div class="filter-bar-container">
    <div class="filter-bar-container-header">
        <h3>More filters</h3>
        <div class="filter-close-icon">
            <i class="fal fa-times"></i>
        </div>
    </div>
    <div class="filter-bar-container-body">
        <button class="accordion">
            Delivery method
            <i class="far fa-chevron-down"></i>
        </button>
        <div class="panel">
            <div class="filter-content-container">
                <ul>
                    <li>
                        <input type="checkbox">
                        <label>Local delivery</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Local pickup</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Ship to customer</label>
                    </li>
                </ul>
                <button class="clear">Clear</button>
            </div>
        </div>
        <button class="accordion">
            Status
            <i class="far fa-chevron-down"></i>
        </button>
        <div class="panel">
            <div class="filter-content-container">
                <ul>
                    <li>
                        <input type="radio" id="open" name="oac">
                        <label for="open">Open</label>
                    </li>
                    <li>
                        <input type="radio" id="archive" name="oac">
                        <label for="archive">Archive</label>
                    </li>
                    <li>
                        <input type="radio" id="cancel" name="oac">
                        <label for="cancel">Canceled</label>
                    </li>
                </ul>
                <button class="clear">Clear</button>
            </div>
        </div>
        <button class="accordion">
            Payment status
            <i class="far fa-chevron-down"></i>
        </button>
        <div class="panel">
            <div class="filter-content-container">
                <ul>
                    <li>
                        <input type="checkbox">
                        <label>Authorized</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Expired</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Overdue</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Paid</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Partially paid</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Partially refunded</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Pending</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Refunded</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Unpaid</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Voided</label>
                    </li>
                </ul>
                <button class="clear">Clear</button>
            </div>
        </div>
        <button class="accordion">
            Fulfillment status
            <i class="far fa-chevron-down"></i>
        </button>
        <div class="panel">
            <div class="filter-content-container">
                <ul>
                    <li>
                        <input type="checkbox">
                        <label>Fulfilled</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Unfulfilled</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Partially fulfilled</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Scheduled</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>On hold</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Request declined</label>
                    </li>
                </ul>
                <button class="clear">Clear</button>
            </div>
        </div>
        <button class="accordion">
            Tagged with
            <i class="far fa-chevron-down"></i>
        </button>
        <div class="panel">
            <div class="filter-content-container">
                <input type="text" class="input-feild">
                <button class="clear">Clear</button>
            </div>
        </div>
        <button class="accordion">
            Chargeback and inquiry status
            <i class="far fa-chevron-down"></i>
        </button>
        <div class="panel">
            <div class="filter-content-container">
                <ul>
                    <li>
                        <input type="radio" id="open" name="oac2">
                        <label for="open">Open</label>
                    </li>
                    <li>
                        <input type="radio" id="submit" name="oac2">
                        <label for="submit">Submited</label>
                    </li>
                    <li>
                        <input type="radio" id="won" name="oac2">
                        <label for="won">Won</label>
                    </li>
                    <li>
                        <input type="radio" id="lost" name="oac2">
                        <label for="lost">Lost</label>
                    </li>
                    <li>
                        <input type="radio" id="any" name="oac2">
                        <label for="any">Any</label>
                    </li>
                </ul>
                <button class="clear">Clear</button>
            </div>
        </div>
        <button class="accordion">
            Risk level
            <i class="far fa-chevron-down"></i>
        </button>
        <div class="panel">
            <div class="filter-content-container">
                <ul>
                    <li>
                        <input type="checkbox">
                        <label>High</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Medium</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Low</label>
                    </li>
                </ul>
                <button class="clear">Clear</button>
            </div>
        </div>
        <button class="accordion">
            Date
            <i class="far fa-chevron-down"></i>
        </button>
        <div class="panel">
            <div class="filter-content-container">
                <ul>
                    <li>
                        <input type="radio" id="today" name="oac3">
                        <label for="today">Today</label>
                    </li>
                    <li>
                        <input type="radio" id="7days" name="oac3">
                        <label for="7days">Last 7 days</label>
                    </li>
                    <li>
                        <input type="radio" id="30days" name="oac3">
                        <label for="30days">Last 30 days</label>
                    </li>
                    <li>
                        <input type="radio" id="90days" name="oac3">
                        <label for="90days">Last 90 days</label>
                    </li>
                    <li>
                        <input type="radio" id="custom" name="oac3">
                        <label for="custom">Custom</label>
                    </li>
                </ul>
                <button class="clear">Clear</button>
            </div>
        </div>
        <button class="accordion">
            Credit card (Last four digits)
            <i class="far fa-chevron-down"></i>
        </button>
        <div class="panel">
            <div class="filter-content-container">
                <input type="text" placeholder="xxxx" class="input-feild">
                <button class="clear">Clear</button>
            </div>
        </div>
    </div>
    <div class="filter-bar-container-footer">
        <button class="clear-filter">Clear all filters</button>
        <button class="add-product-btn">Done</button>
    </div>
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
        this.classList.toggle("active-tab");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
        });
    }
    $(document).ready(function(){
        $( ".lead-more-filter" ).on( "click", function() {
            $( ".filter-bar-container" ).toggleClass( "show");
        });
        $('.filter-close-icon').on('click',function(){
            $('.filter-bar-container').removeClass('show');
        });
    });
</script>