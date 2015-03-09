<!-- light-box -->
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
   <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

		});
	</script>
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row ex_box">
				<h3 class="m_2">Gallery</h3>
                                <dl id="sample" class="dropdown">
                                    <dt><a href="#"><span><h4>All Pictures</h4></span></a></dt>
				        <dd>
				            <ul>
				                <li><a href="#">All Pictures</a></li>
				                <li><a href="#">May 30, 2014</a></li>
				                <li><a href="#">Oct 10, 2013</a></li>
				                <li><a href="#">Sep 23, 2013</a></li>
				               </ul>
				         </dd>
                                </dl>
				{img_row1}
		    </div>
		    <div class="row ex_box">
				{img_row2}
		    </div>
		    <div class="row ex_box">
			  {img_row3}
			   </div>
		    </div>
                    <div style="display: table;margin: 0 auto;">
           <img src="images/arrowleft.png" >
                        1/5
                        <img src="images/arrowright.png" >
                    
                    </div>
	   </div>
         
	  </div>
                    
     </div>
        
                   
	 