<div class="container">
	<?php
	if(!is_single()){
		
	    $objectCat = get_the_category();
	    $catName = '';
	    if(isset($objectCat) && $objectCat[0]->name){
	    	$catName = $objectCat[0]->name;
	    	$query = new WP_Query( array( 'cat' => $objectCat[0]->term_id ) );
	    } ?>
		<h1 class="title-cat text-center"><?php echo $catName; ?></h1>		 

		<div class="row">
			<?php 
			if ($query->have_posts() ) {
				while ($query->have_posts() ) {
					$query->the_post();  ?>
					<div class="col-12 col-md-6 col-lg-6">
						<a href="<?php echo get_the_permalink() ?>">
							<div class="blog-cat">
								<div class="content-post">
									<div class="img">
										<?php echo get_the_post_thumbnail(); ?>
									</div>
									<div class="item">
										<h3 class="title-post">
											<?php echo get_the_title(); ?>
										</h3>
										<div class="des">
											<?php the_excerpt() ?>
										</div>
										<div class="link-detail">
											Chi Tiết
										</div>	
									</div>
								</div>
							</div>
						</a>
					</div>
			<?php }
			}
		
		} else {
			if(have_posts()){
				while(have_posts()){
					the_post() ?>
					<div>
						<h3 class="title-post">
							<?php echo get_the_title(); ?>
						</h3>
						<div class="text-justify">
							<?php echo get_the_content(); ?>
						</div>
					</div>
			<?php }
			}

		} ?>
	</div>
</div>