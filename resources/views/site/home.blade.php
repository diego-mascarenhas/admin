@extends('site.app')

@section('content')

<div id="home">
	<div class="imagen-home hidden-md hidden-lg hidden-sm">
		<h2>Soluciones de tecnología y conectividad para tu negocio en la Nube</h2>
		<p class="margin-b-80">Más de <span class="tw-semibold">20 años</span> de experiencia nos avalan</p>
	</div>
	
	<section class="container text-center">
		<div class="home-principal">
			<div class="hidden-xs">
				<h2>Soluciones de tecnología y conectividad para tu negocio en la Nube</h2>
				<p class="tc-red-4 margin-b-80">Más de <span class="tw-semibold">20 años</span> de experiencia nos avalan</p>
			</div>
			
			<div class="container-fluid">
				<div class="row">
					<div class="col col-md-4 margin-b-90" style="background-image:url('assets/img/iconos/consultoria.png');">
						<h4>Consultoría y Desarrollo</h4>
						<ul>
							<li>Consultoría Web</li>
							<li>Desarrollo y Programación</li>
							<li>Web y Aplicaciones Móviles</li>
						</ul>
						<a href="auditoria-consultoria-desarrollo/" class="button button-small bc-red-4 margin-t-30">Ver más</a>
					</div>
					<div class="col col-md-4 margin-b-90" style="background-image:url('assets/img/iconos/hosting-infraestructura.png');">
						<h4>Hosting e Infraestructura</h4>
						<ul>
							<li>Cloud Hosting y VPS</li>
							<li>Servidores Dedicados</li>
							<li>Telefonía IP</li>
						</ul>
						<a href="hosting/" class="button button-small bc-red-4 margin-t-30">Ver más</a>
					</div>
					<div class="col col-md-4 margin-b-90" style="background-image:url('assets/img/iconos/marketing-digital.png');">
						<h4>Marketing Digital</h4>
						<ul>
							<li>eMail Marketing</li>
							<li>Landing Page Builder</li>
							<li>Publicidad y Redes Sociales</li>
						</ul>
						<a href="emailer" class="button button-small bc-red-4 margin-t-30">Ver más</a>
					</div>
				</div>
			</div>
		</div>

		<div class="home-alianzas">
			<h3 class="section-title section-title-small"><span>Nuestras alianzas</span></h3>

			<ul>
				<li><img src="assets/img/alianzas/linux.png"></li>
				<li><img src="assets/img/alianzas/windows.png"></li>
				<li><img src="assets/img/alianzas/vmware.png"></li>
				<li><img src="assets/img/alianzas/intel.png"></li>
				<li><img src="assets/img/alianzas/ibm.png"></li>
				<li><img src="assets/img/alianzas/mikrotik.png"></li>
				<li><img src="assets/img/alianzas/cpanel.png"></li>
				<li><img src="assets/img/alianzas/docker.png"></li>
				<!-- <li><img src="assets/img/alianzas/openstack.png"></li> -->
			</ul>
		</div>
	</section>
</div>

@endsection
