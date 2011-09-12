<?php 
// SOBI2 Image Slider Module - a fully developed image slider module for showing separate images for their SOBI2 entries. 
// Developed by Mihir Chhatre / Thoughtfulviewfinder Services - http://www.thoughtfulviewfinder.in
// Author Email: cmihirhere@gmail.com
// Original script: NivooSlider - Originally developed for Mootools by Johannes Fischer. Released under the MIT License.
?>
<?php
// Get Parameters for the slideshow module
$select_folder = $params->get( 'select_folder' ); 
$select_height = $params->get( 'select_height'); 
$select_width = $params->get('select_width');
$select_time = $params->get('select_time');
?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/modules/mod_sobi2slideshow/NivooSlider.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/mootools/1.3.2/mootools-yui-compressed.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/modules/mod_sobi2slideshow/NivooSlider.js"></script>


    <script type="text/javascript">
        window.addEvent('domready',function(){
    // The more advanced way
    new NivooSlider($('Slider'), {
        animSpeed: 750,
        effect: 'sliceLeftRightDown',
        interval: <?php echo $select_time; ?>,
        orientation: 'horizontal',
        slices: 20,
		directionNav:true
    })

});
    </script>
    <?php if ( $option == "com_sobi2" and JRequest::getVar('sobi2Task') == 'sobi2Details' ) { $sobi2Id = JRequest::getVar( 'sobi2Id' ); ?>
<div id="Wrapper" class="item" style="width:<?php echo $select_width; ?>px; height:<?php echo $select_height; ?>px;">
		<div id="Slider" class="nivoo-slider">
	    <?php $files = glob('$select_folder/entries/"'.$sobi2Id.'"/*.*'); for ($i=0; $i<count($files); $i++) { $num = $files[$i]; echo '<img src="'.$num.'" alt="random image" title="sobi2slideshow" height="'.$select_height.'" width="'.$select_width.'">'; } ?>
    	</div>
	</div>   
    <?php } elseif ( $option == 'com_sobi2' and ($catid = JRequest::getVar('catid')) != '' and JRequest::getVar('sobi2Task') == '' ) { ?>
<div id="Wrapper" class="category" style="width:<?php echo $select_width; ?>px; height:<?php echo $select_height; ?>px;">
		<div id="Slider" class="nivoo-slider">
	    <?php $files = glob("$select_folder/categories/".$catid."/*.*"); for ($i=0; $i<count($files); $i++) { $num = $files[$i]; echo '<img src="'.$num.'" alt="random image">'; } ?>
    	</div>
	</div>   
    <?php } ?>
