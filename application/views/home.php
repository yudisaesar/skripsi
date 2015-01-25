<!DOCTYPE html>
<html lang="en">
    <head>
        
        <?php $this->load->view('inc/head');?>
        
    </head>
    <body>
        
            <?php $this->load->view('inc/header');?>
        
        <!-- BEGIN CONTAINER -->
        <div class="page-container row">
            
            <!-- BEGIN SIDEBAR -->
                    <?php $this->load->view('inc/menu');?>

          
          
          <div class="page-content"></div>
        </div>
        
        <?php $this->load->view('inc/footer');?>
    </body>
</html>