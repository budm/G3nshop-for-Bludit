	<!-- Begin Footer
	================================================== -->
	<div class="footer row ">
		<ul class="nav pb-3 col-md-8 col-sm-12">
		<?php foreach ($staticContent as $staticPage): ?>
			<li class="nav-item <?php echo (($url->slug()==$staticPage->slug())?'active':'') ?>">
				<a title="<?php echo $staticPage->description(); ?>" class="nav-link <?php echo $staticPage->slug(); ?>" href="<?php echo $staticPage->permalink(); ?>"><?php echo $staticPage->title(); ?></a>
			</li>
		<?php endforeach ?>
	
		</ul>
		<!-- Social Networks -->
		<ul class="nav pb-3 col-md-4 col-sm-12">
		<?php foreach (Theme::socialNetworks() as $key=>$label): ?>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo $site->{$key}(); ?>" target="_blank">
					<img class="d-sm-block nav-svg-icon" src="<?php echo DOMAIN_THEME.'img/'.$key.'.svg' ?>" alt="<?php echo $label ?>" />
				</a>
			</li>
		<?php endforeach; ?>
		</ul>
		
		
		
		<p class="col-12 text-center p-3 border-top">
			Copyright Indybudmarv2 © 2020<br>
			Powered by:
			<a title="Bludit CMS" class="nav-link" href="https://www.bludit.com/" target="_blank">
				<img height="30" src="<?php echo DOMAIN_THEME.'img/logo-bludit.svg' ?>" alt="Bludit CMS" />
			</a>
			&
			<br>
	       a heavily modified version of <a href="http://g3n.es/g3nshop-tienda-on-line">G3Nshop Ecommerce Solution</a>

		</p>
	
	</div>
	
	<!-- End Footer
	================================================== -->

</div>
