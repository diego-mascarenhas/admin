<html>
<head>
	<title>revision alpha</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style>
	* { padding:0; margin:0; line-height:1.5; }
	body { font-family:helvetica, arial, verdana, sans-serif; }
	h1, h2, h3, h4, h5, h6, strong { font-weight:600; }
	p, span, a, td { font-size:14px; font-weight:300; color:#777777; }
	a { text-decoration:none; }
	a:hover { text-decoration:underline; }
	</style>
</head>
<body bgcolor="#f7f7f7" marginheight="0" marginwidth="0">
	<table width="100%" bgcolor="#f7f7f7" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td height="20"></td>
		</tr>
		<tr>
			<td align="center">
				<table width="700" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td align="center">
							<table width="660" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td height="25" colspan="2"></td>
								</tr>
								<tr>
									<td><h1><img src="{{ asset('assets/img/logo-header-email.png') }}" alt="revision alpha" width="252" height="35" style="display:block; position:relative;"></h1></td>
									<td align="right">
										<?php
										( date('w') == 1 ) ? $dia = 'Lunes' : null;
										( date('w') == 2 ) ? $dia = 'Martes' : null;
										( date('w') == 3 ) ? $dia = 'Mi&eacute;rcoles' : null;
										( date('w') == 4 ) ? $dia = 'Jueves' : null;
										( date('w') == 5 ) ? $dia = 'Viernes' : null;
										( date('w') == 6 ) ? $dia = 'S&aacute;bado' : null;
										( date('w') == 0 ) ? $dia = 'Domingo' : null;
										
										( date('n') == 1 ) ? $mes = 'Enero' : null;
										( date('n') == 2 ) ? $mes = 'Febrero' : null;
										( date('n') == 3 ) ? $mes = 'Marzo' : null;
										( date('n') == 4 ) ? $mes = 'Abril' : null;
										( date('n') == 5 ) ? $mes = 'Mayo' : null;
										( date('n') == 6 ) ? $mes = 'Junio' : null;
										( date('n') == 7 ) ? $mes = 'Julio' : null;
										( date('n') == 8 ) ? $mes = 'Agosto' : null;
										( date('n') == 9 ) ? $mes = 'Septiembre' : null;
										( date('n') == 10 ) ? $mes = 'Octubre' : null;
										( date('n') == 11 ) ? $mes = 'Noviembre' : null;
										( date('n') == 12 ) ? $mes = 'Diciembre' : null;
										?>
										<span><strong><?php echo $dia . ' ' . date('d') . ' de ' . $mes . ' de ' . date('Y'); ?></strong></span><br>
										<span><em>Administración</em></span>
									</td>
								</tr>
								<tr>
									<td height="25" colspan="2"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td height="2px" bgcolor="#FF6666"></td>
					</tr>
					<tr>
						<td align="center">
							<table width="660" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td height="50"></td>
								</tr>

                                @yield('content')

								<tr>
									<td>		
										<br><br><br>
										Atte.<br>
										<span>--<br>
										<strong>ADMINISTRACIÓN</strong> | REVISION ALPHA<br>
										González Besada 39 Oviedo, Asturias | +34 722.372.858</span><br>
										Miami Beach, Fl 33119 | +001 305.534.5678<br>
                                        Donado 840, CABA | +54 11.5274.8490
									</td>
								</tr>
								<tr>
									<td height="50"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td height="10" bgcolor="#FF6666"></td>
					</tr>
					<tr>
						<td align="center">
							<table width="100%" bgcolor="#666666" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td align="center">
										<table width="660" bgcolor="#666666" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td height="25" colspan="2"></td>
											</tr>
											<tr>
												<td>
													<a href="https://www.revisionalpha.es/" style="font-size:17px; color:#FFFFFF; text-decoration:none;"><img src="{{ asset('assets/img/logo-footer-email.png') }}" alt="revision alpha" style="display:block; position:relative;">
													www.revisionalpha.com</a>
												</td>
												<td align="right">
													<span style="color:#FFFFFF"><strong>Contáctenos:</strong> <span style="color:#FFFFFF !important">+54.11 6632.2134</span><br>
													<strong>Email:</strong> <a href="mailto:info@revisionalpha.es?subject=Consulta" style="color:inherit;">info@revisionalpha.es</a></span>
												</td>
											</tr>
											<tr>
												<td height="25" colspan="2"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
	</table>
</body>
</html>