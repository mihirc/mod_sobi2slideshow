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
<script type="text/javascript" src="<?php echo $this->baseurl ?>/media/system/js/mootools.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/modules/mod_sobi2slideshow/NivooSlider.js"></script>


    <script type="text/javascript">
        window.addEvent('domready', function () {
			$$('a')[1].addEvent('click', function(e){
				e.stop();
				alert('[you triggered a click event]');
			});
            new NivooSlider($('Slider'), {
				effect: 'random',
				interval: 5000,
				orientation: 'random'
			});
        }); 
    </script>
    <?php if ( $option == "com_sobi2" and JRequest::getVar('sobi2Task') == 'sobi2Details' ) { $sobi2Id = JRequest::getVar( 'sobi2Id' ); ?>
<div id="Wrapper" style="width:<?php echo $select_width; ?>px; height:<?php echo $select_height; ?>px;">
		<div id="Slider" class="nivoo-slider">
	    <?php $files = glob('$select_folder/entries/"'.$sobi2Id.'"/*.*'); for ($i=0; $i<count($files); $i++) { $num = $files[$i]; echo '<img src="'.$num.'" alt="random image">'; } ?>
    	</div>
	</div>   
    <?php } elseif ( $option == 'com_sobi2' and ($catid = JRequest::getVar('catid')) != '' and JRequest::getVar('sobi2Task') == '' ) { ?>
<div id="Wrapper" style="width:<?php echo $select_width; ?>px; height:<?php echo $select_height; ?>px;">
		<div id="Slider" class="nivoo-slider">
	    <?php $files = glob("$select_folder/categories/".$catid."/*.*"); for ($i=0; $i<count($files); $i++) { $num = $files[$i]; echo '<img src="'.$num.'" alt="random image">'; } ?>
    	</div>
	</div>   
    <?php } ?>