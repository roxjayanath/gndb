 <div id="menu_wrap">
      
      	<div id="control_set">
        	<p class="toc_control">Document Controls</p>
        </div>
	
	<?php if(!empty($user->rights)){ ?>
	<?php if($user->rights[RIGHT_INSERT_DOC]){ ?>
	
	<div id="my_profile" class="my_style">
        	<a href="admin_page.php" class="profile_link"><p class="toc">Insert Document</p></a>
        
        </div>
        <?php } ?>
	
	<?php if($user->rights[RIGHT_EDIT_DOC]){ ?>
        <div id="my_profile" class="my_style">
        	<a href="viwe_document.php" class="profile_link"><p class="toc">View Document</p></a>
        
        </div>
        <?php } ?>
	 <?php if($user->rights[RIGHT_VIEW_DOC]){ ?>
        <div id="edit_profile" class="my_style">
        	<a href="edit_document.php" class="profile_link"><p class="toc">Edit Document</p></a>
        
        </div>
        <?php } ?>
        <?php if($user->rights[RIGHT_DELETE_DOC]){ ?>
       
        
        <div id="new_admin" class="my_style">
        	<a href="delete_document.php" class="profile_link"><p class="toc">Delete Document</p></a>
        
        </div>
        <?php } ?>
	<?php } ?>
       <!-- <div id="invoice" class="my_style">
        	<a href="wive_invoice.php" class="profile_link"><p class="toc">Viwe Invoice</p></a>
        
        </div>
        
        <hr class="menu_line" />
        
        <div id="control_set">
        	<p class="toc_control">Website Controls</p>
        </div>
                
        --><div id="add_product" class="my_style">
        	<a href="admin_home.php" class="profile_link"><p class="toc">Main Menu</p></a>
        
        </div><!--
        
        <div id="edit_product" class="my_style">
        	<a href="cms_edit_product.php" class="profile_link"><p class="toc">Edit Product</p></a>
        
        </div>
        
        <div id="remove_product" class="my_style">
        	<a href="remove_product.php" class="profile_link"><p class="toc">Remove Product</p></a>
        
        </div>
        
      <!--  <div id="product_image" class="my_style">
        	<a href="edit_product_image.php" class="profile_link"><p class="toc">Edit Product Image</p></a>
        
        </div> -->
        
       <!-- <div id="customer" class="my_style">
        	<a href="viwe_customer.php" class="profile_link"><p class="toc">Viwe Customer</p></a>
        
        </div>
        
                
        <hr class="menu_line" />
        
        <div id="control_set">
        	<p class="toc_control">Other Controls</p>
        </div>
        
        <div id="contacts" class="my_style">
        	<a href="viwe_contacts.php" class="profile_link"><p class="toc">Contact Log</p></a>
        
        </div>
        
        <div id="log_history" class="my_style">
        	<a href="log_histry.php" class="profile_link"><p class="toc">Log History</p></a>
        
        </div>
        
        <div id="edit_aboutus" class="my_style">
        	<a href="edit_aboutus.php" class="profile_link"><p class="toc">Edit About us</p></a>
        
        </div>-->
      
      </div>