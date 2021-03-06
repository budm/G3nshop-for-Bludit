<!-- Begin Article
================================================== -->


<div class="container">
<br>
	<div class="row">
		<div class="section-title section-title col-12">

		</div>
				
		<!-- Begin Post -->
		<div class="col-md-9 col-xs-12">

			<!-- Load Bludit Plugins: Page Begin -->
			<?php Theme::plugins('pageBegin'); ?>

			<div class="mainheading">
				
			</div>

			<!-- Begin Cover Image -->
			<?php if ($page->coverImage()): ?>
			<img class="featured-image img-fluid" src="<?php echo $page->coverImage(); ?>" alt="<?php echo $page->title(); ?>">
			<?php endif ?>
			<!-- End Cover Image -->

			<!-- Begin Post Content -->
			<div class="article-post">
				<?php echo $page->content(); ?>
			</div>
			<!-- End Post Content -->

			<!-- Begin Tags -->
			<?php if (!empty($page->tags(true))): ?>
			<div class="after-post-tags">
				<ul class="tags">
					<?php foreach ($page->tags(true) as $tagKey=>$tagName): ?>
					<li><a href="<?php echo DOMAIN_TAGS.$tagKey ?>"><?php echo $tagName; ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
			<?php endif; ?>
			<!-- End Tags -->

			<!-- Load Bludit Plugins: Page End -->
			<?php Theme::plugins('pageEnd'); ?>
		
		</div>
		<!-- End Post -->

	<!-- End List Posts
	================================================== -->
		
	</div>

