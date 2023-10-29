<!-- Menú -->
<div id="menu" <?php if (isset($usuario['id']))
{
	echo " class=menu-user-logueado";
} ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<nav class="navbar navbar-inverse" role="navigation">
					<!-- Logo -->
					<h1 class="visible-xs">
						<a class="navbar-brand" href="/" title="revision alpha"><img
								src="/assets/img/revision-alpha-logo.png" title="revision alpha"></a>
					</h1>

					<!-- Button responsive -->
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						<span class="navbar-toggler-icon"></span>
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent" data-hover="dropdown"
						data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
						<ul class="navbar-nav">
							<li
								class="hidden-xs hidden-sm hidden-md @if (Route::currentRouteName() === 'home') active @endif">
								<a href="/">Inicio</a></li>
							<li
								class="dropdown @if (Route::currentRouteName() === 'hosting' || Route::currentRouteName() === 'cloud' || Route::currentRouteName() === 'servidores-dedicados') active @endif">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown-menu"> Hosting</a>
								<ul class="dropdown-menu dropdownhover-bottom navbar-right" role="menu">
									<li>
										<a href="/hosting/">
											<span class="margin-r-5">></span> Web hosting<br>
											<span class="sub">Alojamiento para tu web</span>
										</a>
									</li>
									<li>
										<a href="/cloud/">
											<span class="margin-r-5">></span> Cloud servers<br>
											<span class="sub">Máxima velocidad</span>
										</a>
									</li>
									<li>
										<a href="/servidores-dedicados/">
											<span class="margin-r-5">></span> Servidores dedicados<br>
											<span class="sub">El espacio que necesitas</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="@if (Route::currentRouteName() === 'emailer') active @endif"><a
									href="/emailer/">Emailer</a></li>
							<li
								class="dropdown @if (Route::currentRouteName() === 'auditoria-consultoria-desarrollo' || Route::currentRouteName() === 'simple-click-to-call') active @endif">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown-menu"> Servicios</a>
								<ul class="dropdown-menu navbar-right" role="menu">
									<li>
										<a href="/auditoria-consultoria-desarrollo/">
											<span class="margin-r-5">></span> Auditoría, consultoría y desarrollo<br>
											<span class="sub">Análisis, estrategia e implementación</span>
										</a>
									</li>
									<li>
										<a href="/hosting/">
											<span class="margin-r-5">></span> Hosting e infraestructura<br>
											<span class="sub">El espacio que tu sitio web necesita</span>
										</a>
									</li>
									<li>
										<a href="/emailer/">
											<span class="margin-r-5">></span> Marketing digital<br>
											<span class="sub">Sistema de Emailer</span>
										</a>
									</li>
									<li>
										<a href="/simple-click-to-call/">
											<span class="margin-r-5">></span> Telefonía digital<br>
											<span class="sub">Potencia el contacto con tus clientes</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="@if (Route::currentRouteName() === 'clientes') active @endif"><a
									href="/clientes/">Clientes</a></li>
							<li class="@if (Route::currentRouteName() === 'contactenos') active @endif"><a
									href="/contactenos/">Contacto</a></li>
							<?php if (!isset($usuario['id']))
							{ ?>
								<li class="hidden-xs pull-right <?php echo ($page ?? '' ?? '' == 'micuenta') ? 'active' : null; ?>">
									<a href="{{ route('login') }}" style="float:left;"><i class="fa fa-sign-in margin-r-5"
											aria-hidden="true"></i> Área de clientes</a>
								</li>
							<?php }
							else
							{ ?>
								<li>&nbsp;</li>
							<?php } ?>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>