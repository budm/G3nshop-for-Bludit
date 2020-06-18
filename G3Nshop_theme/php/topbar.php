
<!-- Begin Nav
================================================== -->

    
<nav class="mediumnavigation pt-1">
    
<div id="content" style="display: flex; justify-content: flex-end">
    <div id="div-mobile"><a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i></div>
    <div id="div-desktop"></div>
    
</div>    
      		
        </a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
                <script type='text/javascript'>
                    function myFunction() {
                    var x = document.getElementById('myTopnav');
                     if (x.className === 'topnav') {
                    x.className += ' responsive';
                    } else {
                     x.className = 'topnav';
                        }
                            }
                </script>
<div style="display: flex; justify-content: space-around">
    
  <div>
      <div class="topnav" id="myTopnav">
      <a href="<?php echo $site->url(); ?>"><img src="<?php echo Theme::src('img/logo.png');  ?>" style="max-width:200px;width:100%;>"</a>
      <?php
			foreach ($categories->db as $key=>$fields){ ?>
			<li class="nav-item <?php echo (($url->slug()==$key) ? 'active' :'') ?>" >
			    
			    <!-- Begin specific -->
			    <a href="https://budmarv2.com/dev5/instant-quot">Get a Quote</a>
			    <!-- End specific -->
			    
				<a title="<?php echo $fields['description']; ?>" class="nav-link <?php echo $fields['name']; ?>" href="<?php echo DOMAIN_CATEGORIES.$key; ?>"><?php echo $fields['name']; ?>
				</a>
			
			</li>
		<?php } ?>
		
      </div>
         
      
      
  </div>
  
  <div>
      
      <?php if (pluginActivated('pluginSearch')): ?>
			<li>
				<div class="form-inline my-2 my-lg-0">
				
					<input id="search-input" class="form-control mr-sm-2" type="text" placeholder="Search">
					<span onClick="searchNow()" class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>
					<script>
						function searchNow() {
							var searchURL = "<?php echo Theme::siteUrl(); ?>search/";
							window.open(searchURL + document.getElementById("search-input").value, "_self");
						}
						var elem = document.getElementById('search-input');
						elem.addEventListener('keypress', function(e){
							if (e.keyCode == 13) {
								searchNow();
							}
						});
					</script>
					
				</div>
				
			</li>
		<?php endif ?>
				<form class="cartbutton" action="<?php echo $urlPaypal; ?>" method="post">
				    
				    <input type="hidden" name="cmd" value="_cart" />
					<input type="hidden" name="add" value="0" />
					<input type="hidden" name="business" value="<?php echo $cuentaPaypal; ?>" />

                    <center><input class="btn btn-success" type="submit" name="submit" value="Cart" /></center>
					
					
				</form>
  </div>
  
 
</div>

</nav>

<!-- End Nav
================================================== -->
