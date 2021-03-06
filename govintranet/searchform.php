<?php

//display random search nudge
$randex = '';
$placeholder = get_option('options_search_placeholder'); //get search placeholder text and variations
if ($placeholder!=''){
	$placeholder = explode( ",", $placeholder );
	srand();
	$randdo = rand(1,5);//1 in 5 chance of showing a variation
	$randpl = rand(2,count($placeholder))-1;//choose a random variation
	if ($randdo==1 && $randpl > 1) {
		$randex=trim($placeholder[$randpl]);
	} else {
		$randex=trim($placeholder[0]);
	}
} else {
	$randex = "Search";
}	
?>
	<form class="form-horizontal" role="form" id="searchform" name="searchform" action="<?php echo site_url( '/' ); ?>">
	  <div class="row">
		  <div class="input-group">
	    	 <input type="text" class="form-control" placeholder="<?php echo $randex ;?>" name="s" id="s" value="<?php echo the_search_query();?>">
			 <span class="input-group-btn">
	    	 <?php
		    	 $icon_override = get_option('options_search_button_override', false); 
		    	 if ( isset($icon_override) && $icon_override ):
			    	 $override_text = get_option('options_search_button_text', 'Search');
					 ?>
			 		<button class="btn btn-primary" type="submit"><?php echo esc_attr($override_text); ?></button>
				 	<?php 
		    	 else:
			    	 ?>
			 		<button class="btn btn-primary" type="submit"><span class="dashicons dashicons-search"></span></button>
				 	<?php 
				 endif;
				 ?>
		 	</span>
		</div><!-- /input-group -->
	  </div>
	</form>
