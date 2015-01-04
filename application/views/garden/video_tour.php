<?php
/**
 * Created by Kun Wei
 * Context: Video tour page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1: Kun Wei
 * Date: 2014/5/11
 */
?>

<section class="small-sidenav">
    <section class="left-panel-image">
        <figure> 
            <img src="<?php echo site_url('assets/images/video-tour-map.jpg'); ?>"
                 alt="a brief map of Japanese Garden"/>
			<figcaption>Click on the numbers to see related areas</figcaption>
        </figure>
    </section>
	
    <section class="right-panel">
    	<h1>Video Tour</h1>
		
		<section id="top-pagination">
			<p>Areas:</p>
			<ul>
	            <li><a href="#hill-pond" title="1. Hill Pond" class="tab-link">01</a></li> 
	            <li><a href="#three-tiered-pagoda" title="2. Three-Tiered Pagoda" class="tab-link">02</a></li> 
	            <li><a href="#moon-bridge" title="3. Moon Bridge" class="tab-link">03</a></li> 
	            <li><a href="#water-garden" title="4. Water Garden" class="tab-link">04</a></li> 
	            <li><a href="#tea-house" title="5. Tea House" class="tab-link">05</a></li> 
	            <li><a href="#dry-garden" title="6. Dry Garden" class="tab-link">06</a></li>
	            <li><a href="#turtle-island" title="7. Turtle Island" class="tab-link">07</a></li>
	            <li><a href="#willow-terrace" title="8. Willow Terrace" class="tab-link">08</a></li>
        	</ul>     
        </section>
        				 				
		<!-- 01 Hill Pond ========================================================================== -->
		<section id="hill-pond" class="main-sections">
			<h2>1. Hill Pond</h2>
				
			<video class="tour-videos" controls>
				<source src="<?php echo site_url('assets/videos/MP4/1-Hill_Pond.mp4'); ?>" type="video/mp4">
				<source src="<?php echo site_url('assets/videos/OGG/1-Hill_Pond.ogg'); ?>" type="video/ogg">
				Your browser does not support the <code>video</code> tag.
			</video>
					
		</section>
		
		<!-- 02 Three-Tiered Pagoda ================================================================= -->
		<section id="three-tiered-pagoda" class="main-sections">
			<h2>2. Three-Tiered Pagoda</h2>
			
			<video class="tour-videos" controls>
				<source src="<?php echo site_url('assets/videos/MP4/2-Three_Tiered_Pagoda.mp4'); ?>" type="video/mp4">
				<source src="<?php echo site_url('assets/videos/OGG/2-Three_Tiered_Pagoda.ogg'); ?>" type="video/ogg">
				Your browser does not support the <code>video</code> tag.
			</video>
						
		</section>
		
		<!-- 03 Moon Bridge ============================================================================ -->
		<section id="moon-bridge" class="main-sections">
			<h2>3. Moon Bridge</h2>
			
			<video class="tour-videos" controls>
				<source src="<?php echo site_url('assets/videos/MP4/3-Moon_Bridge.mp4'); ?>" type="video/mp4">
				<source src="<?php echo site_url('assets/videos/OGG/3-Moon_Bridge.ogg'); ?>" type="video/ogg">
				Your browser does not support the <code>video</code> tag.
			</video>
						
		</section>	
				
		<!-- 04 Water Garden ========================================================================== -->	
		<section id="water-garden" class="main-sections">	
			<h2>4. Water Garden</h2>
			
			<video class="tour-videos" controls>
				<source src="<?php echo site_url('assets/videos/MP4/4-Water_Garden.mp4'); ?>" type="video/mp4">
				<source src="<?php echo site_url('assets/videos/OGG/4-Water_Garden.ogg'); ?>" type="video/ogg">
				Your browser does not support the <code>video</code> tag.
			</video>
								
		</section>	
				
		<!-- 05 Tea House ============================================================================== -->	
		<section id="tea-house" class="main-sections">	
			<h2>5. Tea House</h2>
			
			<video class="tour-videos" controls>
				<source src="<?php echo site_url('assets/videos/MP4/5-Tea_House.mp4'); ?>" type="video/mp4">
				<source src="<?php echo site_url('assets/videos/OGG/5-Tea_House.ogg'); ?>" type="video/ogg">
				Your browser does not support the <code>video</code> tag.
			</video>
						
		</section>	
			
		<!-- 06 Dry Garden ============================================================================= -->	
		<section id="dry-garden" class="main-sections">	
			<h2>6. Dry Garden</h2>
			
			<video class="tour-videos" controls>
				<source src="<?php echo site_url('assets/videos/MP4/6-Dry_Garden.mp4'); ?>" type="video/mp4">
				<source src="<?php echo site_url('assets/videos/OGG/6-Dry_Garden.ogg'); ?>" type="video/ogg">
				Your browser does not support the <code>video</code> tag.
			</video>
						
		</section>	
						
		<!-- 07 Turtle Island ========================================================================== -->	
		<section id="turtle-island" class="main-sections">	
			<h2>7. Turtle Island</h2>
			
			<video class="tour-videos" controls>
				<source src="<?php echo site_url('assets/videos/MP4/7-Turtle_Island.mp4'); ?>" type="video/mp4">
				<source src="<?php echo site_url('assets/videos/OGG/7-Turtle_Island.ogg'); ?>" type="video/ogg">
				Your browser does not support the <code>video</code> tag.
			</video>
						
		</section>	
						
		<!-- 08 Willow Terrace ========================================================================= -->	
		<section id="willow-terrace" class="main-sections">	
			<h2>8. Willow Terrace</h2>
			
			<video class="tour-videos" controls>
				<source src="<?php echo site_url('assets/videos/MP4/8-Willow_Terrace.mp4'); ?>" type="video/mp4">
				<source src="<?php echo site_url('assets/videos/OGG/8-Willow_Terrace.ogg'); ?>" type="video/ogg">
				Your browser does not support the <code>video</code> tag.
			</video>
						
		</section>
    </section>
    
	<section class="left-panel-links">
        <ol id="side-pagination">
            <li><a href="#hill-pond" class="tab-link">Hill Pond</a></li>
            <li><a href="#three-tiered-pagoda" class="tab-link">Three-Tiered Pagoda</a></li>
            <li><a href="#moon-bridge" class="tab-link">Moon Bridge</a></li>
            <li><a href="#water-garden" class="tab-link">Water Garden</a></li>
            <li><a href="#tea-house" class="tab-link">Tea House</a></li>
            <li><a href="#dry-garden" class="tab-link">Dry Garden</a></li>
            <li><a href="#turtle-island" class="tab-link">Turtle Island</a></li>
            <li><a href="#willow-terrace" class="tab-link">Willow Terrace</a></li>
        </ol>
    </section>
<script src="<? echo site_url('assets/js/video-tour.js') ?>" type="text/javascript"></script>