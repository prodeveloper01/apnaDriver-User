<div class="main-content-container">
    <div class="setting-content-container-wrap" style="height: 90vh;">
        <div class="content-page-header">
            <div class="page-header-text">Settings</div>
        </div>
        <div class="setting-page-content-container">
            <div class="setting-page-content-container-wrap">
                <ul class="setting-page-content">
                    
                    <?php
                        if($_SESSION[PRE_FIX.'role']=="admin")
                        {
                            ?>
                                <li>
                                    <a href="dashboard.php?p=manageCoupon">
                                        <div class="setting-page-content-icon">
                                            <i class="fas fa-tasks cuctomIcon"></i>
                                        </div>
                                        <div class="setting-page-content-text">
                                            <h2>Manage Coupon</h2>
                                            <p>View and update your Manage Coupon</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard.php?p=manageAdmin">
                                        <div class="setting-page-content-icon">
                                            <i class="fas fa-users-cog cuctomIcon"></i> 
                                        </div>
                                        <div class="setting-page-content-text">
                                            <h2>Manage Admin</h2>
                                            <p>Manage what users can see or do in your store</p>
                                        </div>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="dashboard.php?p=rideTypes">
                                        <div class="setting-page-content-icon">
                                            <i class="fas fa-biking-mountain cuctomIcon"></i>
                                        </div>
                                        <div class="setting-page-content-text">
                                            <h2>Ride Type</h2>
                                            <p>View and manage your Ride Type</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard.php?p=manageServiceFee">
                                        <div class="setting-page-content-icon">
                                            <i class="fas fa-envelope cuctomIcon"></i>
                                        </div>
                                        <div class="setting-page-content-text">
                                            <h2>Manage Service Fee</h2>
                                            <p>Manage system commission from each order</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard.php?p=managePolicies">
                                        <div class="setting-page-content-icon">
                                            <i class="fas fa-file cuctomIcon"></i>
                                        </div>
                                        <div class="setting-page-content-text">
                                            <h2>Manage Policies</h2>
                                            <p>View and manage your policies</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard.php?p=manageReportReasons">
                                        <div class="setting-page-content-icon">
                                            <i class="fas fa-ban cuctomIcon"></i>
                                        </div>
                                        <div class="setting-page-content-text">
                                            <h2>Manage Report Reason</h2>
                                            <p>View and manage Report Reason</p>
                                        </div>
                                    </a>
                                </li>
                            <?php
                        }
                        
                    ?>
                    
                    
                    
                    <li>
                        <a href="dashboard.php?p=changePassword">
                            <div class="setting-page-content-icon">
                                <i class="fas fa-key cuctomIcon"></i>
                            </div>
                            <div class="setting-page-content-text">
                                <h2>Change Password</h2>
                                <p>View and update your Security details</p>
                            </div>
                        </a>
                    </li>
                    
                    <?php
                        if($_SESSION[PRE_FIX.'role']=="admin")
                        {
                            ?>
                                <li>
                                    <a href="dashboard.php?p=manageCountry">
                                        <div class="setting-page-content-icon">
                                            <i class="fas fa-globe-asia cuctomIcon"></i>
                                        </div>
                                        <div class="setting-page-content-text">
                                            <h2>Manage Country</h2>
                                            <p>Manage the places you stock inventory, fulfill orders, and sell products</p>
                                        </div>
                                    </a>
                                </li>
                            <?php
                        }
                    ?>
                    
                    
                </ul>
            </div>
        </div>
    </div>
</div>