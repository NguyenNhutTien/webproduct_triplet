
<html>
	<head>
		<?php require 'head.php';?>
    </head>
    <body id="triplet">
    	
    	<a href="#" id="back_to_top">
    		<img src="<?php echo public_url()?>/site/images/top.png">
    	</a>
		<div class="wrapper">	
			<div class="header">
				<?php require 'header.php';?>
			</div>    		
    			<div id="container">
    				<div class="left">
    					<?php require 'left.php';?>
    				</div>
        		    <div class="content">
        		   		<?php         		   		
        		   		$this->view($temp,$this->data);   	    		
        		   		?>        		            		   
        		    </div>        		    
            		<div class="right">
            			<?php require 'right.php';?>
            		</div>         
            		<div class="clear"></div>   		
    			</div>    		
    			<center>
					<img src="<?php echo public_url()?>/site/images/bank.png">
				</center>
			<div class="footer">
				<?php require 'footer.php';?>
			</div>	    		
    		
		</div>
	</body>
</html>
