<!doctype html>
	<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>No Cambuí</title>
	    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon" />
	    <link rel="stylesheet" href="/css/gumby.css">
	    <link rel="stylesheet" href="/css/style.css">	
	    <link rel="stylesheet" href="/css/global.css"> 
		<link rel="stylesheet" href="/css/categorias.css"> 
		<link rel="stylesheet" href="/css/county.css">
		<script src="/js/jquery-2.0.2.js"></script>
		<!--script api facebook-->
	    <div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=424842944276281";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!--script botão share google+-->
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
		<!--script share twitter-->
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		
		<!--seguir google+-->
		<!-- Place this tag after the last widget tag. -->
		<script type="text/javascript">
		  (function() {
		    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		    po.src = 'https://apis.google.com/js/plusone.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
	<script src="/js/libs/modernizr-2.6.2.min.js"></script>
	<script src="/js/libs/gumby.min.js"></script>
	<script src="/js/slides.min.jquery.js"></script>
	<script src="/js/jquery-2.0.2.js"></script>
	
	<!-- <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
	<script src="/js/jcarousellite.js"></script>
	<script src="/js/jquery.form.min.js"></script>
	<!-- PAGINAÇÃO -->
	  <script type="text/javascript" src="/jPages/js/highlight.pack.js"></script>
	  <script type="text/javascript" src="/jPages/js/tabifier.js"></script>
	  <script src="/jPages/js/js.js"></script>
	  <script src="/jPages/js/jPages.js"></script>
	<!--script da galeria da home-->		
	
	<!--script table-->
	<link rel="stylesheet" href="/DataTables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" href="/DataTables/media/css/jquery.dataTables_themeroller.css">
	<script src="/DataTables/media/js/jquery.dataTables.min.js"></script>
	<!--script jquery ui-->
	<script src="/js/jquery-ui/js/jquery-ui-1.10.3.custom.js"></script>
	<!--
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<script src="/js/jquery-ui/js/jquery-ui-1.10.3.custom.js"></script>
	-->
	<script src="/js/clicks.js"></script>
	<script src="/js/nav.js"></script>
	</head>
	<body>	
		
		<script language="javascript">
			$(document).ready(function(){
			    var y_fixo = $("#banner-popup").offset().top;
			    $(window).scroll(function () {
			        $("#banner-popup").animate({
			            top: y_fixo+$(document).scrollTop()+"px"
			            },{duration:500,queue:false}
			        );
			    });
			});
		</script>
		<div class="container">
			<div class="sub-container">
				<div class="content">
					<div class="row">
						<br /><center><h1>Consulte se o ticket é válido</h1></center>
						<?php echo $this->fetch('content'); ?>
					</div>
				</div>
				
			</div>
		</div>	
	</body>
</html>
<script>
	$(function() {
		$( "#tabs10" ).tabs();		
		//$( "#tabs10" ).tabs();
	});

</script>
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>
<script>
	$(function() {
		$( "#tabs2" ).tabs();
	});
</script>
<script>
	$(function() {
		$( "#tabs3" ).tabs();
	});
</script>
<!--tab form classificados autos-->
<script>
	$(function() {
		$( "#tabs4" ).tabs();
	});
</script>
<!--tab informações gastronomia aberta-->
<script>
	$(function() {
		$( "#tabs5" ).tabs();
	});
</script>
<script>
	$(function(){
		$('#slides1').slides({
			preload: true,
			preloadImage: '/img/loading.gif',
			play: 7000,
			pause: 2500,
			container: 'slides_container1',
			generateNextPrev: false,
			next: 'next1',
	    	prev: 'prev1',
			hoverPause: true
		});
	});
</script>
<script>
	$(function(){
		$('#slides2').slides({
			preload: true,
			preloadImage: '/img/loading.gif',
			play: 5000,
			pause: 2500,
			container: 'slides_container2',
			generateNextPrev: false,
			next: 'next2',
	    	prev: 'prev2',
			hoverPause: true
		});
	});
</script>
<script>
	$(function(){
		$('#slides3').slides({
			preload: true,
			preloadImage: '/img/loading.gif',
			play: 5000,
			pause: 2500,
			container: 'slides_container3',
			next: 'next3',
	    	prev: 'prev3',
			hoverPause: true
		});
	});
</script>
<script>
	$(function(){
		$('#slides4').slides({
			preload: true,
			preloadImage: '/img/loading.gif',
			play: 5000,
			pause: 2500,
			container: 'slides_container3',
			generateNextPrev: false,
			next: 'next3',
	    	prev: 'prev3',
			hoverPause: true
		});
	});
</script>
<script>
	$(function(){
		$('#slides5').slides({
			preload: true,
			preloadImage: '/img/loading.gif',
			play: 5000,
			pause: 2500,
			container: 'slides_container3',
			generateNextPrev: false,
			next: 'next3',
	    	prev: 'prev3',
			hoverPause: true
		});
	});
</script>
<script>
	$(function(){
		$('#slides6').slides({
			preload: true,
			preloadImage: '/img/loading.gif',
			play: 5000,
			pause: 2500,
			container: 'slides_container3',
			generateNextPrev: false,
			next: 'next3',
	    	prev: 'prev3',
			hoverPause: true
		});
	});
</script>
<script>
	$(function(){
		$('#slides7').slides({
			preload: true,
			preloadImage: '/img/loading.gif',
			play: 5000,
			pause: 2500,
			container: 'slides_container3',
			generateNextPrev: false,
			next: 'next3',
	    	prev: 'prev3',
			hoverPause: true
		});
	});
</script>
<script>
	$(function(){
		$('#slides8').slides({
			preload: true,
			preloadImage: '/img/loading.gif',
			play: 5000,
			pause: 2500,
			container: 'slides_container3',
			generateNextPrev: false,
			next: 'next3',
	    	prev: 'prev3',
			hoverPause: true
		});
	});
</script>




<script>
	$(function(){
		$('#slides10').slides({
			preload: true,
			preloadImage: '/img/loading.gif',
			play: 5000,
			pause: 2500,
			generateNextPrev: false,
			next: 'next5',
	    	prev: 'prev5',
			hoverPause: true
		});
	});
</script>




<script type="text/javascript">
	$(function(){
		$('.box-painel-do-usuario-top').hide();
		$('.texto-login-top').click(function(){
			if($('.box-painel-do-usuario-top').is(":visible")){
				$('.box-painel-do-usuario-top').hide('slow')
			}else{
				$('.box-painel-do-usuario-top').show('slow');
				$('.box-painel-do-usuario-top').show('slow')
				
			}
		})
		$('.texto-login-top2').click(function(){
			$('.box-painel-do-usuario-top').hide('slow')
		});
	});
	
</script>
<script type="text/javascript" src="/js/county.js"></script>
<?php $data = isset($vantagens['Advantage']['date_end']) ? date('Y/m/d H:i:s', strtotime($vantagens['Advantage']['date_end'])) : ''  ?>
<script type="text/javascript">
    $(document).ready(function () {
    	var dataVantagens = '';
        //set width of wrapper;
        $('.no-reflection').county({ endDateTime: new Date('<?= $data ?>'), reflection: false, animation: 'scroll', theme: 'none' });
    });
</script>

<!--slider interno-->
<script>
	$(function(){
		$('#slides15').slides({
			preload: true,
			preloadImage: '/img/loading.gif',
			play: 5000,
			pause: 2500,
			container: 'slides_container15',
			generateNextPrev: false,
			next: 'next15',
	    	prev: 'prev15',
			hoverPause: true
		});
	});
</script>


<!--personalização dos selects-->
<link rel="stylesheet" href="/js/custom-select/jquery.customselect.css">
<script type="text/javascript" src="/js/custom-select/jquery.customselect.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.customselect').customselect();
	});
</script>



<!--jquery colorbox - usando nas galerias dos posts(modal)-->
<link rel="stylesheet" href="/js/jquery-colorbox/example1/colorbox.css">
<script type="text/javascript" src="/js/jquery-colorbox/jquery.colorbox.js"></script>

<script>
	$(document).ready(function(){
		//Examples of how to assign the Colorbox event to elements
		$(".janela-modal").colorbox({rel:'group1'});
	});
</script>

<!--slide agenda home-->
<script type="text/javascript">
	$(".carousel-menu").jCarouselLite({
	    btnNext: ".next",
	    btnPrev: ".prev",
	    start: 7,
	});
</script>
<!--slide agenda home-->
<script type="text/javascript">
	$(".carousel-lateral").jCarouselLite({
	    btnNext: ".next",
	    btnPrev: ".prev",
	    start: 7,
	});
</script>
<!--slides-->
<script type="text/javascript" src="/js/slides.min.jquery.js"></script>