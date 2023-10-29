<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @auth - {{ auth()->user()->name }} @endauth</title>
    <meta name="description" content="Hosting, Auditoría, Consultoría y Desarrollo Web, Marketing Digital"/>
    <meta name="keywords" content="Hosting, Auditoría, Consultoría y Desarrollo Web, Marketing Digital" />
    <meta property="og:title" content="revision alpha" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:description" content="Soluciones en Tecnología y Conectividad">	
    <meta property="og:image" content="/assets/img/logo-wa.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/img/logo-wa.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/logo-wa.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/logo-wa.png"> 
    
    <meta name="robots" content="index,follow">'

    <link href="/assets/img/favicon.ico" rel="shortcut icon">
    
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="/assets/fonts/fonts.css" rel="stylesheet">
    <link href="/assets/css/helpers.css" rel="stylesheet">
    <link href="/assets/css/styles.css" rel="stylesheet">
    <link href="/assets/menu/bootstrap-dropdownhover.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-6047944-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'UA-6047944-1');
    </script>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WHZXZH9');</script>
    <!-- End Google Tag Manager -->

    <script src="/assets/js/jquery-3.1.1.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/menu/bootstrap-dropdownhover.min.js"></script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WHZXZH9"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
        
        <div id="mainContainer" class="has-sticky-footer">
            <?php if (isset($usuario['id'])) { ?>
                <?php //include('session-bar.php'); ?>
            <?php } ?>
            
			<div id="header">
				<header class="container @auth header_login_usuario @endauth">
					<div class="visible-xs menu-top @auth invisible @endauth">
						<div id="login-top" class="pull-right">
							<a href="login/"><i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp;Área clientes</a>
						</div>
					</div>
		
					<div class="pull-left hidden-xs">
						@if (Route::currentRouteName() === 'home')
							<h1 class="content-logo">
								<a href="/" title="revision alpha">
									<img src="/assets/img/revision-alpha-logo.png" title="revision alpha">
								</a>
								<p class="tagline">Soluciones en Tecnología y Conectividad</p>
							</h1>
						@else
							<span class="content-logo">
								<a href="/" title="revision alpha">
									<img src="/assets/img/revision-alpha-logo.png" title="revision alpha">
								</a>
								<p class="tagline">Soluciones en Tecnología y Conectividad</p>
							</span>
						@endif
					</div>
					
					<div class="content-social pull-right hidden-xs">
						<div class="pull-left">
							<p class="tc-red-5">Síguenos en nuestras<br><span class="tw-semibold">redes sociales</span></p>
						</div>
						<div class="iconos pull-left margin-l-20">
							<span class="triangle brc-grey-5"></span>
		
							<ul class="bc-grey-5">
								<li>
									<a href="https://www.facebook.com/RevisionAlpha/" title="Facebook" target="_blank">
										<img src="/assets/img/facebook-logo.png">
									</a>
								</li>
								<li class="margin-l-10">
									<a href="https://www.instagram.com/revision_alpha/?hl=es" title="Instagram" target="_blank">
										<img src="/assets/img/instagram-logo.png">
									</a>
								</li>
							</ul>
						</div>
					</div>
				</header>
				
				@include('site/menu')
				
                @if (Route::currentRouteName() === 'home')
                    <div id="slider" class="hidden-xs">
						<div id="sliderHeader" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<div class="item active" style="background-image:url('/assets/img/slider/cloud-server.jpg');">
									<div class="container">
										<h3>Cloud Servers</h3>
										<p>Servidores virtuales <span class="tw-semibold">CLOUD</span> a la medida de tu proyecto.
										<br>Servidores Linux, Windows, Escritorio Remoto y acceso VPN.</p>
										<a href="cloud/" class="button bc-red-4 margin-t-50">¡Conoce más!</a>
									</div>
								</div>
								<div class="item" style="background-image:url('/assets/img/slider/web-hosting.jpg');">
									<div class="container">
										<h3>Web Hosting</h3>
										<p>El espacio que tu Sitio Web necesita.<br>
										Te brindamos el <span class="tw-semibold">mejor servicio del mercado.</span></p>
										<a href="hosting/" class="button bc-red-4 margin-t-50">¡Conoce más!</a>
									</div>
								</div>
								<div class="item" style="background-image:url('/assets/img/slider/marketing-digital.jpg');">
									<div class="container">
										<h3>Marketing Digital</h3>
										<p>Comunicarte con tus clientes <span class="tw-semibold">nunca fue tan fácil.</span><br>
										Herramientas de email Marketing, Landing Page Builder y <span class="tw-semibold">WhatsApp.</span></p>
										<a href="emailer/" class="button bc-red-4 margin-t-50">¡Conoce más!</a>
									</div>
								</div>
								<div class="item" style="background-image:url('/assets/img/slider/managed-server.jpg');">
									<div class="container">
										<h3>Managed Server</h3>
										<p>Administramos y monitoreamos tu servidor por ti.<br>
										Rendimiento y flexibilidad con un <span class="tw-semibold">servidor administrado.</span></p>
										<a href="servidores-dedicados/" class="button bc-red-4 margin-t-50">¡Conoce más!</a>
									</div>
								</div>
							</div>
					
							<!-- Controls -->
							<a class="left carousel-control" href="#sliderHeader" role="button" data-slide="prev">
								<span class="arrow-left" aria-hidden="true"></span>
								<span class="sr-only">Anterior</span>
							</a>
							<a class="right carousel-control" href="#sliderHeader" role="button" data-slide="next">
								<span class="arrow-right" aria-hidden="true"></span>
								<span class="sr-only">Próxima</span>
							</a>
						</div>
					</div>
                @else
                    <div id="subheader">
						<header>
							<?php if (isset($subtitle) && isset($background)) : ?>
								<div class="subheader-banner" style="background-image:url('<?php echo $background; ?>');">
									<h1><?php echo $subtitle; ?></h1>
									<p><?php echo $text; ?></p>
								</div>
							<?php endif; ?>
						</header>
					</div>
                @endif
			</div>

            @yield('content')

            <div id="footer" class="sticky-footer bc-grey-7">
			<div class="boton_whatsapp">
				<a href="https://wa.me/34722372858?text=Hola quisiera consultar por" target="_blank" title="Contácta por Whatsapp"><img src="/assets/img/whatsapp-logo.png" title="Contácta por WhatsApp" alt="Contácta por WhatsApp" width="80"></i></a>
			</div>
			<div class="container">
				<div class="col-lg-4 col-sm-4 col-xs-12 footer-info pull-left">
					<h4 class="footer-info-logo">
						<a href="/" title="revision alpha"></a>
					</h4>
					<ul>
						<li><span class="tw-semibold">ESP</span> +34 722.372.858</li>
						<li><span class="tw-semibold">USA</span> +001 305.534.5678</li>
						<li><span class="tw-semibold">ARG</span> +54 11.5274.8490</li>
						<li><span class="tw-semibold"></span> <a href="mailto:info@revisionalpha.es?subject=Contacto desde revision alpha">info@revisionalpha.es</a></li>
						<li class="separator"></li>
						<li>
							<a href="https://www.facebook.com/RevisionAlpha/" title="Facebook" target="_blank">
								<img src="/assets/img/facebook-logo-white.png">
							</a>
							<a href="https://www.instagram.com/revision_alpha/?hl=es" title="Instagram" target="_blank">
								<img src="/assets/img/instagram-logo-white.png">
							</a>
						</li>
						<li>&nbsp;</li>
					</ul>
				</div>
				<div class="col-lg-8 col-sm-8 col-xs-12 footer-menu pull-right">
					<div class="container-fluid">
						<div class="row pull-right">
							<div class="col col-md-4 col-sm-6 col-xs-6">
								<h4>Información</h4>
								<ul>
									<li><a href="/terminos-y-condiciones/">Términos y condiciones</a></li>
									<li><a href="/el-datacenter/">El Datacenter</a></li>
									<li><a href="/sla/">SLA</a></li>
<!-- 									<li><a href="https://www.revisionalpha.com/instructivos/aplicaciones-web/">Revision Tips</a></li> -->
<!-- 									<li><a href="https://www.revisionalpha.com/novedades/">Novedades</a></li> -->
									<li>&nbsp;</li>
								</ul>
							</div>
							<div class="col col-md-4 col-sm-6 col-xs-6 m_t_10">
								<h4>Servicios</h4>
								<ul>
									<li><a href="/hosting/">Web Hosting</a></li>
									<li><a href="/cloud/">Cloud Server</a></li>
									<li><a href="/emailer/">Email-Marketing</a></li>
									<li><a href="/contactenos/">Multimedia Server</a></li>
									<li><a href="/simple-click-to-call/">Telefonía Digital</a></li>
									<li>&nbsp;</li>
								</ul>
							</div>
							<div class="col col-md-4 col-sm-6 col-xs-6 m_t_10">
								<h4>Contacto</h4>
								<ul>
									<li><a href="/hosting/">Contratar un plan</a></li>
									<li><a href="/soporte/">Soporte técnico</a></li>
									<li><a href="/contactenos/">Enviar consulta</a></li>
									<li>&nbsp;</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{ request()->path() }}
		</div><!-- close #mainContainer -->
	</body>
</html>