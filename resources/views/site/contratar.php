<div id="contratar" class="firstTemplate">
	<section class="container">
		<div class="row">
			<div class="col col-md-8">
				<h3 class="section-title section-title-full margin-b-20">Contratar</h3>

				<div class="content-contacto margin-b-50">
					<?php if (!isset($user['id'])) { ?>
						<p class="margin-b-40">
							Si ya se encuentra registrado en nuestro sitio, inicie sesión antes de continuar con el alta de plan. De lo contrario complete los datos de contacto que figuran a continuación.
							<a href="<?php echo base_url('login?redirect=contratar/plan/' . $item['id']); ?>" class="button button-medium margin-auto bc-red-4 margin-t-40">Acceder</a>
						</p>
					<?php } else { ?>
						<p class="margin-b-40">Ya se encuentra conectado a nuestro sistema y el plan quedará asociado a su empresa.</p>
					<?php } ?>
					
					<?php if (isset($validation)) : ?>
						<div class="col-md-12">
							<div class="alert alert-danger" role="alert">
								<?= $validation->listErrors() ?>
							</div>
						</div>
					<?php endif; ?>
					
					<?php if (isset($form)) { ?>
						<?php if ($form['envio'] == 'ok') { ?>
						<div class="col-md-12">
							<div class="alert alert-success" role="alert">
								El mensaje ha sido enviado, muchas gracias por contactarse.
							</div>
						</div>
					
						<?php } elseif ($form['envio'] == 'error') { ?>
						<div class="col-md-12">
							<div class="alert alert-danger" role="alert">
								Se produjo un error al querer enviar el formulario, por favor prueba más tarde.
							</div>
						</div>
						<?php } ?>
						
					<?php } else { ?>
					<form action="/contratar/plan/<?php echo $item['id']; ?>" id="contratar" method="post" accept-charset="utf-8">
						<input type="hidden" name="id" value="<?php echo $item['id']; ?>">
						<input type="hidden" name="id_tipo" value="<?php echo $item['id_tipo']; ?>">
						
						<?php if (isset($user['id'])) { ?>
							<input type="hidden" name="id_contacto" value="<?php echo $user['id']; ?>">
							<input type="hidden" name="nombre" value="<?php echo $user['contacto']; ?>">
							<input type="hidden" name="email" value="<?php echo $user['email']; ?>">
						<?php } ?>
						
						<?php if (!isset($user['id'])) { ?>
							<div class="row">
								<div class="col-sm-6 form-group">
									<input type="text" name="nombre" placeholder="Nombre y apellido (*)" value="<?php echo (isset($detalle['nombre'])) ? $detalle['nombre'] : null; ?>" class="form-control">
								</div>
						
								<div class="col-sm-6 form-group">
									<input type="text" name="empresa" placeholder="Empresa" value="<?php echo (isset($detalle['empresa'])) ? $detalle['empresa'] : null; ?>" class="form-control">
								</div>
							</div>
						
							<div class="row">
								<div class="col-sm-6 form-group">
									<input type="email" name="email" placeholder="Email (*)" value="<?php echo (isset($detalle['email'])) ? $detalle['email'] : null; ?>" class="form-control">
								</div>
						
								<div class="col-sm-6 form-group">
									<input type="text" name="telefono" placeholder="Teléfono" value="<?php echo (isset($detalle['telefono'])) ? $detalle['telefono'] : null; ?>" class="form-control">
								</div>
							</div>
						<?php } ?>
						
						<h4 class="form-subtitle">Detalles del plan</h4>
						<p class="margin-b-20">Ha seleccionado <strong><?php echo $item['descripcion']; ?></strong>. A continuación se detallan las características</p>
					
						<div class="row">
							<div class="col-sm-6 form-group">
								<?php $caracteristicas = json_decode($item['caracteristicas'], true); ?>
								<div class="planCommon">
									<?php include ('plan_template.php'); ?>
								</div>
							</div>
							
							<?php if ($item['id_tipo'] == 1 || $item['id_tipo'] == 2) { ?>
							<div class="col-sm-6 form-group">
								<input type="text" name="dominio" id="dominio" placeholder="Dominio (*)" value="<?php echo (isset($detalle['dominio'])) ? $detalle['dominio'] : null; ?>" class="form-control">
							</div>
							<?php } ?>
						</div>

						<div class="form-group terminos">
							<p><input type="checkbox" name="terminos" value="1" class="margin-r-5" <?php echo (isset($detalle['terminos'])) ? 'checked' : null; ?>> Acepto todos los <a class="link" href="<?php echo base_url('terminos-y-condiciones'); ?>" target="_blank">términos y condiciones</a>.</p>
						</div>
					
						<div class="form-group text-right">
							<input type="text" name="cupon" placeholder="Cupón de descuento" value="<?php echo (isset($detalle['cupon'])) ? $detalle['cupon'] : null; ?>" class="form-control inline margin-b-10" style="width:200px; vertical-align:top;">
							<button type="submit" class="button bc-red-4 inline margin-l-5 margin-b-10">Confirmar</button>
					
							<div class="clear"></div>
						</div>
					</form>
					<?php } ?>
				</div>
			</div>

			<div class="col col-md-4 hidden-xs hidden-sm">
				<h3 class="section-title section-title-full margin-b-20">Vías de contacto</h3>

				<div class="content-informacion margin-b-50">
					<?php include ('sidebar_vias_de_contacto.php'); ?>
				</div>
			</div>
		</div>
	</section>
</div>