
  
<?php
class pluginG3Nshop extends Plugin {
	
	// Instalar plugin
	public function init() {
		$this->dbFields = array(
		  'categoria'	=> '',
		  'moneda' => '',
		  'cuentaPaypal'	=> '',
		  'modoPruebas' => '1',
		  'type' => 'Stickybar', 
		  'setapi_key' => 'ENTER_YOUR_API_KEY_HERE',
		  'setlist_id' => 'ENTER_YOUR_LIST_ID_HERE',
		  'toptitle' => 'Thanks for using budms variant G3Nshop',  
		  'url' => 'https://github.com/budm/G3nshop-for-Bludit/',
		  'display' => 'right',
		  'display2' => 'top',    
		  'colorbg' => 'EB593C', 
		  'linkcolor' => 'FFFFFF'
		);
	}
	// Configuration Form
	public function form() {
		
		global $L, $pages;
		
		if ($this->getValue('modoPruebas') === "1") {
			$pruebasSeleccionado="selected";
			$ventasSeleccionado="";
		}else{
			$pruebasSeleccionado="";
			$ventasSeleccionado="selected";
		}
		
		// Create page options;
		$pageOptions = array();
		
		
		// Toma categorías
		foreach (getCategories() as $categoria) {
		$categoriaOptions[$categoria->key()] = $categoria->name();
		}
		// Las ordena por nombre
		ksort($categoriaOptions);

		$html = '';

		// Html Selector de página
		global $Language;

		$html  = '<div>';
		$html .= '<div>';
		$html .= '<label>'.$L->get('categoria-tienda').'</label>';
		$html .= '<select name="categoria">'.PHP_EOL;
		$html .= '<option value="">- '.$L->get('categorias').' -</option>'.PHP_EOL;
		foreach ($categoriaOptions as $key => $value) {
			$html .= '<option value="'.$key.'" '.($this->getValue('categoria')==$key?'selected':'').'>'.$value.'</option>'.PHP_EOL;
		}
		$html .= '</select>';
		$html .= '</div>'.PHP_EOL;
		
		// Currency Picker
		$html .='
<div>
	<label>'.$L->get('moneda').'</label>
	<select name="moneda">';
		$html .='<option value="'.$this->getValue('moneda').'" selected>'.$this->getValue('moneda').'</option>';
		$html .='
		<option value="EUR">EUR - Euro</option>
		<option value="USD">USD - US Dollar</option>
		<option value="AED">AED - Dirham de Emiratos Árabes Unidos</option>
		<option value="ARS">ARS - Peso argentino</option>
		<option value="AUD">AUD - Dólar australiano</option>
		<option value="AWG">AWG - Florín arubeño</option>
		<option value="BAM">BAM - Marco convertible</option>
		<option value="BBD">BBD - Dólar de Barbados</option>
		<option value="BDT">BDT - Taka bangladesí</option>
		<option value="BGN">BGN - Lev Bulgaria</option>
		<option value="BHD">BHD - Dinar bahreiní</option>
		<option value="BMD">BMD - Dólar bermudeño</option>
		<option value="BOB">BOB - Boliviano de Bolivia</option>
		<option value="BRL">BRL - Real Brasileño</option>
		<option value="BSD">BSD - Dólar bahameño</option>
		<option value="CAD">CAD - Dólar canadiense</option>
		<option value="CHF">CHF - Franco suizo</option>
		<option value="CLP">CLP - Peso chileno</option>
		<option value="CNY">CNY - Yuan Chino</option>
		<option value="COP">COP - Peso colombiano</option>
		<option value="CZK">CZK - Corona checa</option>
		<option value="DKK">DKK - Corona danesa</option>
		<option value="DOP">DOP - Peso dominicano</option>
		<option value="EGP">EGP - Libra Egipcia</option>
		<option value="FJD">FJD - Dólar fiyiano</option>
		<option value="GBP">GBP - Libra esterlina</option>
		<option value="GHS">GHS - Cedi de Ghana</option>
		<option value="GMD">GMD - Dalasi de Gambia</option>
		<option value="GTQ">GTQ - Quetzal de Guatemala</option>
		<option value="HKD">HKD - Dólar de Hong Kong</option>
		<option value="HRK">HRK - Kuna croata</option>
		<option value="HUF">HUF - Florín húngaro</option>
		<option value="IDR">IDR - Rupia Indonesia</option>
		<option value="ILS">ILS - Shéquel israelí</option>
		<option value="INR">INR - Rupia Hindú</option>
		<option value="IRR">IRR - Rial iraní</option>
		<option value="ISK">ISK - Corona islandesa</option>
		<option value="JMD">JMD - Dólar Jamaiquino</option>
		<option value="JOD">JOD - Dinar jordano</option>
		<option value="JPY">JPY - Yen japonés</option>
		<option value="KES">KES - Chelín Keniano</option>
		<option value="KHR">KHR - Riel camboyano</option>
		<option value="KRW">KRW - Won surcoreano</option>
		<option value="KWD">KWD - Dinar kuwaití</option>
		<option value="LAK">LAK - Kip laosiano</option>
		<option value="LBP">LBP - Libra Libanesa</option>
		<option value="LKR">LKR - Rupia Esrilanquesa</option>
		<option value="MAD">MAD - Dirham de Marreucos</option>
		<option value="MDL">MDL - Leu moldavo</option>
		<option value="MGA">MGA - Ariary malgache</option>
		<option value="MKD">MKD - Denar macedonio</option>
		<option value="MUR">MUR - Rupia de Mauricio</option>
		<option value="MVR">MVR - Rupia de Maldivas</option>
		<option value="MXN">MXN - Peso mexicano</option>
		<option value="MYR">MYR - Ringgit Malayo</option>
		<option value="NAD">NAD - Dólar namibio</option>
		<option value="NGN">NGN - Naira Nigeria</option>
		<option value="NOK">NOK - Corona noruega</option>
		<option value="NPR">NPR - Rupia nepalí</option>
		<option value="NZD">NZD - Dólar neozelandés</option>
		<option value="OMR">OMR - Rial omaní</option>
		<option value="PAB">PAB - Balboa Panameño</option>
		<option value="PEN">PEN - Sol Perú</option>
		<option value="PHP">PHP - Peso filipino</option>
		<option value="PKR">PKR - Rupia paquistaní</option>
		<option value="PLN">PLN - Zloty Polaco</option>
		<option value="PYG">PYG - Guaraní paraguayo</option>
		<option value="QAR">QAR - Riyal Qatarí</option>
		<option value="RON">RON - Leu Rumano</option>
		<option value="RSD">RSD - Dinar serbio</option>
		<option value="RUB">RUB - Rublo ruso</option>
		<option value="SAR">SAR - Riyal Saudí</option>
		<option value="SCR">SCR - Rupia de Seychelles</option>
		<option value="SEK">SEK - Corona sueca</option>
		<option value="SGD">SGD - Dólar de Singapur</option>
		<option value="SYP">SYP - Libra siria</option>
		<option value="THB">THB - Baht Thailandés</option>
		<option value="TND">TND - Dinar tunecino</option>
		<option value="TRY">TRY - Lira turca</option>
		<option value="TWD">TWD - dólar taiwanés</option>
		<option value="UAH">UAH - Grivna Ucrania</option>
		<option value="UGX">UGX - Chelín ugandés</option>
		<option value="UYU">UYU - Peso uruguayo</option>
		<option value="VES">VES - Bolívar venezolano</option>
		<option value="VND">VND - Dong vietnamita</option>
		<option value="XAF">XAF - Franco CFA de África Central</option>
		<option value="XCD">XCD - Dólar del Caribe Oriental</option>
		<option value="XOF">XOF - Franco de África Occidental</option>
		<option value="XPF">XPF - Franco CFP</option>
		<option value="ZAR">ZAR - Rand sudafricano</option>
	</select>
</div>
<div>
	<label>'.$L->get('cuenta-paypal').'</label>
	<input type="text" name="cuentaPaypal" value="'.$this->getValue('cuentaPaypal').'" />
</div>
<div>
	<label>'.$L->get('modo-paypal').'</label>
	<select name="modoPruebas" >
		<option value="1" '.$pruebasSeleccionado.'>'.$L->get('pruebas').'</option>
		<option value="2" '.$ventasSeleccionado.'>'.$L->get('ventas').'</option>
	</select>
</div>

<br>
<label>'.$L->get('Sticky Bar Settings:').'</label>
<br>

<div>
<label for="toptitle">'.$L->get('Title').'</label>
<input type="text" name="toptitle" value="'.$this->getValue('toptitle').'" required/>
</div>	

<div>
<label>'.$L->get('Link').'</label>
<input class="width-40" type="url" name="url" value="'.$this->getValue('url').'" required/>
</div>

<div>
<label>'.$L->get('Background Color').'</label>
<input class="colorbg" type="text" name="colorbg" value="'.$this->getValue('colorbg').'" required/>
</div>

<div>
<label>'.$L->get('Link Color').'</label>
<input class="color" type="text" name="linkcolor" value="'.$this->getValue('linkcolor').'" required/>
</div>

<br>
<br>
<br>
<hr>
<a title="Github Fork" class="" href="https://github.com/budm/G3nshop-for-Bludit/tree/master/G3Nshop_theme/css">Budms Variant Github</a><hr>
';      
		return $html;
	} // end form()
	

	// Create the necessary elements in the admin
	public function adminBodyEnd() {
		
		global $L, $pages, $site;
		$urlEdicion=$_SERVER['REDIRECT_URL'];
		$sitioURL= $site->url();
		if (substr($sitioURL, -1) === "/"){ $sitioURL= substr($sitioURL,0,-1); }
		$paginaAdmin= explode( "/", $urlEdicion);
		$paginaAdmin= end($paginaAdmin);
		
		
		$L_Tienda=$L->get('tienda');
		$L_Producto=$L->get('producto');
		$L_Productos_Publicados=$L->get('productos-publicados');
		$L_Shipping=$L->get('Shipping');
		$L_Discount=$L->get('Discount');
		$L_Precio=$L->get('precio');
		$L_Tallas=$L->get('tallas');
		$L_Colores=$L->get('colores');
		$L_SecondaryColor=$L->get('secondarycolor');
		$L_Separar_por_comas=$L->get('separar-x-comas');
		$L_ColoresDeEjemplo=$L->get('colores-ejemplo');
		$L_Buscar=$L->get('buscar');
		$L_resultados=$L->get('resultados');
		
		
		
		// capture data that is necessary to us
		// Si es editar

		
		if(stripos($urlEdicion, 'edit-content') !== false ){
			$paginaEditar= explode( "/", $urlEdicion);
			$paginaEditar= end($paginaEditar);
			$pagina= new Page($paginaEditar);
		
			//Lo convertimos en array
			//y acceder a los datos reales de la base de datos
			$ListaPagina= (array) $pagina;
			foreach ($ListaPagina as  $valor){ 
				foreach ($valor as $llave => $valores ){
				$propiedadesPagina[$llave]=$valores;
				}
			}
				
			if ($propiedadesPagina['category'] == $this->getValue('categoria')){
				$esEdicionProducto= 'loEs';
			}
		}

		$html="";
		$html.=<<<EOT
<script>
	$(document).ready(function(){
		$("li > a[href*='/admin/plugins']").after(
			'<li class="nav-item">'
		+		'<a class="nav-link" href="$sitioURL/admin/configure-plugin/pluginG3Nshop?">- $L_Tienda</a>'
		+	'</li>'
		);
		$("li > a[href*='/admin/new-content']").after(
			'<li class="nav-item ml-3">'
		+		'<a class="nav-link" href="$sitioURL/admin/new-content?GS"><span class="oi oi-plus"></span>$L_Producto</a>'
		+	'</li>'
		);
EOT;
	
	//Capture the key of the Session URL
	//If you capture "edit-content" you must fill in the fields
	//$page= new Page('desarrollo-a-medida');//(key)
	//$page->cumstom() // dar formato y añadir al html que inyecta jquery
			
		if($esEdicionProducto == 'loEs'){
			//Extraemos las etiquetas y las filtramos
			$propiedadesPersonales = explode(',', $pagina->tags());
			foreach ($propiedadesPersonales as $valores){
				if (strpos($valores, "{") !== false ){
					if (strpos($valores, "P{") !== false ){
						$precio= substr(trim($valores), 2).", ";	
					}
					if (strpos($valores, "S{") !== false ){
						$shipping.= substr(trim($valores), 2).", ";	
					}
					if (strpos($valores, "D{") !== false ){
						$discount.= substr(trim($valores), 2).", ";	
					}
					if (strpos($valores, "T{") !== false ){
						$tallas.= substr(trim($valores), 2).", ";	
					}
					if (strpos($valores, "C{") !== false ){
						$colores.= substr(trim($valores), 2).", ";
					}
					if (strpos($valores, "W{") !== false ){
						$secondarycolor.= substr(trim($valores), 2).", ";
					}
				}else{
				  $etiquetasNormales .= $valores.", ";
				}
			}
		
			$tallas= substr($tallas, 0, -2);
			$colores= substr($colores, 0, -2);
			$secondarycolor= substr($secondarycolor, 0, -2);
			$etiquetasNormales= substr($etiquetasNormales, 0, -2);
		}
		
		if($esEdicionProducto == 'loEs' || isset($_GET['GS'])){	
			$categoriaTienda=$this->getValue('categoria');
		$html.=<<<EOT
		$("#jstitle").after(
			'<small class="form-text">$L_Precio</small><input  type="number" placeholder="0,00" min="0"  step="0.01" id="precio" class="form-control mt-1" value="$precio" />'
		+   '<small class="form-text">$L_Shipping</small><input  type="number" placeholder="0.00" min=".50"  step="0.01" id="shipping" class="form-control mt-1" value="$shipping" />'
		+   '<small class="form-text">$L_Discount</small><input  type="number" placeholder="0.00" min="0.00"  step="0.01" id="discount" class="form-control mt-1" value="$discount" />'
		+	'<small class="form-text">$L_Tallas ($L_Separar_por_comas)</small><input type="text" id="tallas" class="form-control mt-1" value="$tallas" placeholder="M, L, XL" />'
		+	'<small class="form-text">$L_Colores ($L_Separar_por_comas)</small><input type="text" id="colores" class="form-control mt-1" value="$colores" placeholder="$L_ColoresDeEjemplo"/>'
		+	'<small class="form-text">(((NOT WORKING YET WILL NOT WORK ON THE USER END)))     Secondary Color: (If the product has any then $L_Separar_por_comas)</small><input type="text" id="secondarycolor" class="form-control mt-1" value="$secondarycolor" placeholder=""/>'
		);
EOT;
			if(isset($_GET['GS'])){
		$html.=<<<EOT
		$("#jscategory").parent().remove();
		$("#jsdescription").after(
			'<input  type="hidden" id="jscategory" name="category" value="$categoriaTienda" />'
		);
EOT;
			}
		$html.=<<<EOT
		$("#jstags").val("$etiquetasNormales");
		$("#jsbuttonSave").mouseup(function() {
			var Precio = "";
			var Shipping = "";
			var Discount = "";
			var Tallas = "";
			var Colores = "";
			var SecondaryColor = "";
			var Etiquetas= "";
			
			if( $("#precio").val() !== "" ) { Precio = 'P{'+$("#precio").val().replace(/ /g, ""); }
			if( $("#shipping").val() !== "" ) { Shipping = ',S{'+$("#shipping").val().replace(/ /g, "").replace(/,/g, ",S{"); }
			if( $("#discount").val() !== "" ) { Discount = ',D{'+$("#discount").val().replace(/ /g, "").replace(/,/g, ",D{"); }
			if( $("#tallas").val() !== "" ) { Tallas = ',T{'+$("#tallas").val().replace(/ /g, "").replace(/,/g, ",T{"); }
			if( $("#colores").val() !== "" ){ Colores= ',C{'+$("#colores").val().replace(/ /g, "").replace(/,/g, ",C{"); }
			if( $("#secondarycolor").val() !== "" ){ SecondaryColor= ',W{'+$("#secondarycolor").val().replace(/ /g, "").replace(/,/g, ",W{"); }
			if( $("#jstags").val() !== "" ) { Etiquetas= ','+$("#jstags").val(); }
			
			var propiedadesProducto= Precio+Shipping+Discount+Tallas+Colores+SecondaryColor+Etiquetas;
			$("#jstags").val(propiedadesProducto)
		})
EOT;
	}
			//Si estamos en contenido
		if( $paginaAdmin === 'content' ){
			
			$html.=<<<EOT
		
		$("#pages-tab").parent().before(
			'<li class="nav-item">'
		+	'	<a class="nav-link active" id="Producto-tab" data-toggle="tab" href="#pages" role="tab" aria-selected="true" >$L_Productos_Publicados</a>'
		+	'</li>'
		);
		
		$("ul.nav.nav-tabs").after(
			'<div id="contenedor-form-busqueda" class="row mt-4">'
		+	'  <div class="col-lg-12">'
		+	'	<div id="form-busqueda" class="input-group">'
		+	'	  <span class="input-group-btn">'
		+	'		<button id="btn-filtrar" class="btn btn-primary" type="button">$L_Buscar</button>'
		+	'	  </span>'
		+	'	  <input id="busqueda" type="text" class="form-control">'
		+	'	</div>'
		+	'  </div>'
		+	'</div>'
		);
		
		$("#btn-filtrar").click(function() {
			
			var busqueda= $("#busqueda").val().toLowerCase().trim();
			if(busqueda !== ""){
				$("#filtro-busqueda").remove();
				
				$("tbody tr").css("background-color", "transparent");
				var resultadosVisibles=$("tbody tr:contains('"+ busqueda +"')" ).css("background-color", "#ddffcc").length;
				var resultado="secondary";
				if (resultadosVisibles === 0 ){resultado="danger";}
				$("#contenedor-form-busqueda").after(
				'<div id="filtro-busqueda" style="display: none" class="alert alert-'+resultado+' mt-1">'+$("#busqueda").val()+': '+resultadosVisibles+' $L_resultados</div>'
				);
				
				$("#busqueda").val("");
				$("#filtro-busqueda").show("slow");
			}
		});		
EOT;
			foreach ($pages->db as $key => $value){
				if($value['category'] === $this->getValue('categoria') ){
				$titulo=$value['title'];
				$etiquetas="· ".htmlentities(str_replace("{",": ",strtolower(implode(", ",$value['tags'])))).",";
				
				$html.=<<<EOT
		$("a[href*='/admin/edit-content/$key'].btn").parent().parent().addClass("producto");
		$("a[href*='/admin/edit-content/$key']").not(".btn").parent().append("<small>$etiquetas</small>");
EOT;
				}
			}
			$html.=<<<EOT
			$("#pages-tab").removeClass("active");
			$(".tab-content tbody tr").not(".producto").hide();
			
			$("#pages-tab").click(function() {
			  $("tbody tr.producto").hide();
			  $("tbody tr").not(".producto").show();
			});
			$("#Producto-tab").click(function() {	
				$("tbody tr").show();
				$("tbody tr").not(".producto").hide();				
			});
			$("#draft-tab, #sticky-tab, #scheduled-tab, #static-tab").click(function() {
				$("tbody tr").show();
			});
			$("a[role='tab']").click(function() {
				$("#form-busqueda").hide("slow");
				$("#form-busqueda").show("slow");
				$("#filtro-busqueda").remove();
				$("tbody tr").css("background-color", "transparent");
			});
			
			
			
			
EOT;
		}
		$html.=<<<EOT
		
	});
</script>
EOT;

		return $html;
		
		
	}
	

	public function adminHead()
	{
		global $layout;
		$pluginPath = $this->htmlPath();

		$html  = '';

		if(in_array($layout['controller'], $this->loadWhenController))
		{
			$html .= '<script src="' .$pluginPath. 'libs/jscolor/jscolor.js"></script>'.PHP_EOL;
		}

		return $html;
	}
	
	
	// Load js plugin in public theme
	public function siteBodyEnd()
	{ 		
			$html  = '<div class="stickybar">'.PHP_EOL;
            $html .= '<a href="' .$this->getValue('url'). '">' .$this->getValue('toptitle'). '</a>'.PHP_EOL;
            $html .= '</div>'.PHP_EOL; 
			
			return $html;   
			
	}

public function siteHead()
	{
		$html = ''.PHP_EOL;
        $html .= '<style type="text/css" media="screen">
	        .stickybar{position:fixed;left:0;right:0;top:0;font-size:14px; font-weight:400; height:35px; line-height:35px; overflow:visible; text-align:center; width:100%; z-index:1000; border-bottom-width:3px; border-bottom-style:solid; font-family:Georgia,Times New Roman,Times,serif; color:#fff; border-bottom-color:#fff; margin:0; padding:0; background-color: #' .$this->getValue('colorbg'). ';-webkit-border-bottom-right-radius:5px;-webkit-border-bottom-left-radius:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-bottomleft:5px;border-bottom-right-radius:5px;border-bottom-left-radius:5px;}
	         body {margin-top:35px !important}
	        .stickybar a, .stickybar a:link, .stickybar a:visited, .stickybar a:hover{color:#' .$this->getValue('linkcolor'). ';font-size:14px; text-decoration:none; border:none;  padding:0}
	        .stickybar a:hover{text-decoration:underline}
	        .stickybar a{color:#fff; display:block;padding-bottom: 8px; text-align:center; text-decoration:none;text-shadow:0 0 0.1em #000}
	        .stickybar a:hover{ opacity: 0.8}
	        </style>'.PHP_EOL;
	     
	     return $html;  
	     
	     
	     
	}
	
}
