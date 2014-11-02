<div id="tabs1-csss" >
   

   
    <code>
<p>
            
            
        <p class="detailll">PACK Received   Date : <input type="text" class="datepicker" name="pack_date" style="margin-left: 160px;"/></p>
	<!--	<p class="detailll">Developer Testing Assinged To :  <select name="dev_ass" class="detailindate9">
             <option value="Name1">Name1</option>
             <option value="Name2">Name2</option>
              <option value="Name3">name 3</option>
               <option value="Name4">name4</option>
                <option value="Name5">name5</option>
           </select></p  -->
                 <p style="
    font-size: 16px;">
                
                
                Developer Testing Assinged To :<select name="dev_ass" class="detailindate9">
               <option value="0">-select-</option>
                <?php
                if (!empty($categories)) {
                    foreach ($categories as $cat) {
                        ?>
                        <option value="<?php echo $cat->dev_id ?>"><?php echo $cat->dev_name ?></option>
                        <?php
                    }
                }
                ?>
                <!--                <option value="Men">Men</option>
                                <option value="Kids">Kids</option>-->
            </select></p> 
                
                
		   
		   <p class="detailll">Testing Enviroriment  :  <select name="dev_en" class="detailindate99">
              <option value="0">-select-</option>
			 <option value="st">Staging</option>
             <option value="sp1">sp1</option>
              <option value="sp2">sp2</option>
               <option value="sp3">sp3</option>
               
           </select></p>
		   
		   <p class="detailll">Testing Cycle No:  <select name="dev_cy" class="detailindate999">
              <option value="0">-select-</option>
			 <option value="1">1</option>
             <option value="2">2</option>
              <option value="3">3</option>
               <option value="4">4</option>
			   <option value="5">5</option>
             <option value="6">6</option>
              <option value="7">7</option>
               <option value="8">8</option>
			   <option value="9">9</option>
             <option value="10">10</option>
           </select></p>
		
				<p class="detailll">Date Return To Developer :  <input type="text" class="datepicker" name="date_ret_date" style="margin-left: 100px;"/></p>
				<p class="detailll">Assign User : <input type="text" name="ass_user" class="detailindate10"/></p>
				
				
				<p class="detailll">User Assign Date :  <input type="text" class="datepicker" name="user_ass_date" style="margin-left: 180px;"/></p>
				<p class="detailll">Tested Completed Date :  <input type="text" class="datepicker" name="test_com_date" style="margin-left: 130px;"/></p>
				
				
				<p class="detailll">Testing Status :  <select name="test_status" class="detailindate9999">
              <option value="0">-select-</option>
			 <option value="pending">Pending</option>
             <option value="inprogress">Inprogress</option>
              <option value="rejected">Rejected</option>
               <option value="close">Close</option>
                <option value="hold">Hold</option>
           </select></p>
				
      
            
            
            
          </p>
    </code>
  

  </div>
  
  
  
  
  
  
  
  
  
  
  
  
   <div id="tabs1-jss">
   

   
    <code>
<p>
            <p style="
    font-family: serif;
    font-size: 30px;
">Document submit for Review/Approval </p>
            
        <p class="detailll">Development Review Date : <input type="text" class="datepicker" name="smrc_date" style="margin-left: 120px;"/></p>
		<p class="detailll">AVP-IT Approval Date : <input type="text" class="datepicker" name="avp_it" style="margin-left: 150px;"/></p>
		<p class="detailll">VP-IT Approval Date : <input type="text" class="datepicker" name="biss_date" style="margin-left: 160px;"/></p>
		<p class="detailll">Bussiness Line Cost Approval Date : <input type="text" class="datepicker" name="vp_it" style="margin-left: 20px;"/></p>
        <p class="detailll">CFO Approval Date : <input type="text" class="datepicker" name="cfo_date" style="margin-left: 180px;"/></p>
		<p class="detailll">BRP Approval Date : <input type="text" class="datepicker" name="brd_date" style="margin-left: 180px;"/></p>
		<p class="detailll">Date Hand Over To Development : <input type="text" class="datepicker" name="date_develop" style="margin-left: 60px;"/></p>
		<!--<p class="detailll">Document held with previosly : <?php //echo?></p>
		--><p class="detailll">Document Hand over to : <input type="text" name="assing_to" class="detailindate100"/></p>
		
		
		
		
		
            
          </p>
    </code>
  

  </div>
  
  
  
  
  
  
  
   <div id="tabs1-js">


  <code>
    
<p>
            
             <p class="detailll">QA Assign Date : <input type="text" class="datepicker" name="date_hand_qa" style="margin-left: 80px;"/></p>
			  <p class="detailll">QA Reference Number : <input type="text" name="qaref" class="detailindate1000"/></p>
			  <p class="detailll">QA Tester Name : <input type="text" name="qatestname" class="detailindate1001"/></p>
			  <p class="detailll">QA Status :  <select name="qastatus" class="detailindate98">
			  <option value="0">-Select-</option>
             <option value="pending">Pending</option>
             <option value="inprogress">Inprogress</option>
              <option value="rejected">Rejected</option>
               <option value="close">Close</option>
                <option value="hold">Hold</option>
           </select></p>
			 
        <p class="detailll">Live Transfer Date : <input type="text" class="datepicker" name="qa_complete" style="margin-left: 40px;"/></p>
        
        
            
            
          </p>  
  </code>

  </div>
  
  
  
  <div id="tabs1-css">


  <code>
    
<p>
            
             <p class="detailll">Original Document Recived Date : <input type="text" class="datepicker" name="or_r_date" style="margin-left: 45px;"/></p>
 <p class="detailll">Documentation Fix By : <select name="doc_fix" class="detailindate97">
 <option value="0">-select-</option>
             <?php foreach ($fixCategories as $value){
							//$selected = ($selectedCrr == $key) ? "selected" : "";
							?>
							<option value="<?php echo $value->qa_id ?>" <?php //echo $selected ?>><?php echo $value->qa_name; ?></option>
							<?php
						} ?>
           </select></p>	

<p class="detailll">Sender User Notification : <select name="user_noty" class="detailindate96">
 <option value="0">-select-</option>
             <option value="yes">YES</option>
             <option value="no">NO</option>
              
           </select></p>	



			 
        
        
            
            
          </p>  
  </code>

  </div>
  
  
  
  
  
  
  
  
  
  
  