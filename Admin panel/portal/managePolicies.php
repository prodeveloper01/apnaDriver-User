<?php
    if (isset($_SESSION[PRE_FIX . 'id'])) 
    {
        $url = $baseurl . 'showHtmlPage'; 
        ?>
            <div class="main-content-container">
                <div class="security-content-container-wrap">
                    <div class="security-page-header-container">
                        <div class="security-page-header">
                            <div class="page-header-text">Policies</div>
                        </div>
                    </div>
                    <section class="security-content-sec-container" style="border-bottom: 1px solid rgb(201 204 207); padding:0px 0px 15px 0px;">
                        <?php 
                        $data = array(
                            'id' => "1"
                        );
                        $json_data = @curl_request($data, $url);
                        ?>
                        <form action="process.php?action=privacyPolicy" method="post">
                            <div class="security-content-sec-wrap">
                                <div class="security-content-text">
                                    <h2><?php echo $json_data['msg']['HtmlPage']['name']?></h2>
                                </div>
                                <div class="security-content-card-container">
                                    <div class="card-sec-text">
                                        <textarea id="editor1" name="text"><?php echo $json_data['msg']['HtmlPage']['text']?></textarea>
                                    </div>
                                    
                                    <div class="card-sec-footer">
                                        <button type="button" class="btn footer-card-btn">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <section class="security-content-sec-container">
                        <?php 
                        $data = array(
                            'id' => "2"
                        );
                        $json_data = @curl_request($data, $url);
                        ?>
                        <form action="process.php?action=privacyPolicy" method="post">
                            <div class="security-content-sec-wrap">
                                <div class="security-content-text">
                                    <h2><?php echo $json_data['msg']['HtmlPage']['name']?></h2>
                                </div>
                                <div class="security-content-card-container">
                                    <div class="card-sec-text">
                                        <textarea id="editor2" name="text"><?php echo $json_data['msg']['HtmlPage']['text']?></textarea>
                                    </div>
                                    
                                    <div class="card-sec-footer">
                                        <button type="button" class="btn footer-card-btn">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <script type="text/javascript">
                CKEDITOR.replace('editor1');
                CKEDITOR.replace('editor2');
            </script>
        <?php
    } 
    else 
    {
        echo "<script>window.location='index.php'</script>";
        die;
    }
?>