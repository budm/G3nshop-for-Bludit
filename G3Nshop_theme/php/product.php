<!-- Begin Article
================================================== -->
<div class="container">
	<div class="row">
		<div class="section-title col-12">
			<h2><span>
					<a href="<?php echo DOMAIN_CATEGORIES.$catecoriaG3Nshop; ?>">
						<?php echo $NcategoriaG3Nshop; ?>
					</a>
				</span>
			</h2>
		</div>
		<br>
		<br>
		<!-- Begin Post -->
		<div class="col-md-9 col-md-offset-2 col-xs-12">

			<!-- Load Bludit Plugins: Page Begin -->
			<?php Theme::plugins('pageBegin'); ?>

			<div class="mainheading">
				<h1 class="posttitle"><?php echo $page->title(); ?></h1>
			</div>

			<!-- Begin Cover Image -->
			<?php if ($page->coverImage()): ?>
			<img class="product-image img-fluid" src="<?php echo $page->coverImage(); ?>" alt="<?php echo $page->title(); ?>">
			<?php endif ?>
			<!-- End Cover Image -->
			<!-- Begin Tags -->
			<?php if (!empty($page->tags(true))): ?>
 			<div class="after-post-tags">
				<ul class="tags">
					<?php foreach ($page->tags(true) as $tagKey=>$tagName):
							
							if (strpos($tagName, "{") !== false ){
								
								if (strpos($tagName, "P{") !== false ){
									$precio= number_format(substr(trim($tagName), 2), 2, '.', '');
									$tagName= substr(trim($tagName), 2)." ".$moneda;
									$liclass= 'precio';
									
								}
								if (strpos($tagName, "T{") !== false ){
									
									$tagName= substr(trim($tagName), 2);
									$arrayTallas[]=$tagName;
									$liclass= 'talla';	
								}
								if (strpos($tagName, "C{") !== false ){
									
									$tagName= substr(trim($tagName), 2);
									$arrayColores[]=$tagName;
									$liclass= 'producto-color-'.$tagName;
									$conTalla++;
								}
											
							}else{
								$liclass=$tagKey;
							}
							
					?>
					<li class="<?php echo $liclass ?>" ><a href="<?php echo DOMAIN_TAGS.$tagKey.$getTienda ?>"><?php echo $tagName; ?></a></li>
					<?php endforeach;
					if(count($arrayTallas) === 1){
						$propiedadesProducto .= " ".$arrayTallas[0];
					}
					if(count($arrayColores) === 1 ){
						$propiedadesProducto .= " ".$arrayColores[0];
					} ?>
				</ul>
				
			</div>
			<?php endif; ?>
			<!-- End Tags -->
			<br>
			<br>
			<br>
			<!-- Begin Post Content -->
			<div class="article-post">
				<?php if($precio !== "" && $precio !== "0" && $precio !== "0.00"){ ?>
				<form class="formAgregarCarrito" action="<?php echo $urlPaypal; ?>" method="post">
				    
				    <?php echo $page->content(); ?>
				    
					<input type="hidden" name="cmd" value="_cart" />
					<input type="hidden" name="add" value="1" />
					<input type="hidden" name="business" value="<?php echo $cuentaPaypal; ?>" />
					<input type="hidden" name="item_name" value="<?php echo $page->title().$propiedadesProducto; ?>" />
					<input type="hidden" name="amount" value="<?php echo $precio; ?>" />
					<input type="hidden" name="currency_code" value="<?php echo $moneda; ?>" />
					<input type="hidden" name="shipping" value="1.00">
					<?php
						$conTC=-1;
						if(count($arrayTallas) > 1){
						$conTC++ ; ?>
						<label>
						<?php echo $language->p('tallas'); ?>
						<input type="hidden" name="on<?php echo $conTC; ?>" value="<?php echo $language->p('tallas'); ?>" />
						<select name="os<?php echo $conTC; ?>">
							<?php foreach($arrayTallas as $valor){; ?>
							<option value="<?php echo $valor; ?>" ><?php echo $valor; ?></option>
							<?php } ?>
						</select>
						</label>
					<?php } ?>
					<?php if(count($arrayColores) > 1){
						$conTC++ ; ?>
						<label>
						<?php echo $language->p('Color:'); ?>
						<input type="hidden" name="on<?php echo $conTC; ?>" value="<?php echo $language->p('Color:'); ?>" />
						<select name="os<?php echo $conTC; ?>">
							<?php foreach($arrayColores as $valor){; ?>
							<option value="<?php echo $valor; ?>" ><?php echo $valor; ?></option>
							<?php } ?>
						</select>
						</label>
						<br>
						Quantity: 
					<input type="visible" name="quantity" value="1" />
					<br>
	
		<!-- Begin Price -->
			<?php if (!empty($page->tags(true))): ?>
 			<div class="after-post-tags">
				<ul class="price">
					$<?php echo $precio; ?> USD ea
				</ul>
			</div>
			<?php endif; ?>
		<!-- End Price -->

                    <?php } ?>
					
					<input class="btn btn-success" type="submit" name="submit" value="<?php echo $language->p('agregar-carro'); ?>" />
					
				</form>
				<?php } ?>
				
			</div>
			<!-- End Post Content -->



	<!-- End List Posts
	================================================== -->
			<!-- Load Bludit Plugins: Page End -->
			<?php Theme::plugins('pageEnd'); ?>

		</div>
		<!-- End Post -->
	</div>
	<?php include(THEME_DIR_PHP.'related.php'); ?>


    
