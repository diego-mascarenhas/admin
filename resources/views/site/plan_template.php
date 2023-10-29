							<ul>
								<li class="bc-<?php echo (isset($caracteristicas['color'])) ? $caracteristicas['color'] : 'red'; ?>-5"><h3><?php echo $item['categoria']; ?></h3><?php if (isset($caracteristicas['imagen'])) { ?><img src="<?php echo $caracteristicas['imagen']; ?>" class="imagen-wp"> <?php }  ?></li>
								<li>
									<?php if (isset($caracteristicas['descripcion'])) { ?>
										<?php echo $caracteristicas['descripcion']; ?>
										
										<?php if (isset($caracteristicas['valor_mensual_pago_anual'])) { ?>
											<p class="price">
												<span class="tc-<?php echo (isset($caracteristicas['color'])) ? $caracteristicas['color'] : 'red'; ?>-5">
													<strong><?php echo $caracteristicas['valor_mensual_pago_anual']; ?></strong>
												</span>
												<span class="iva"><small><em>+ I.V.A. por mes con pago anual</em></small></span>
											</p>
										<?php } else { ?>
											<p class="price">
												<span class="tc-<?php echo (isset($caracteristicas['color'])) ? $caracteristicas['color'] : 'red'; ?>-5">
													<strong><?php echo $caracteristicas['valor_mensual']; ?></strong>
												</span>
												<span class="iva"><small><em>+ I.V.A. por mes</em></small></span>
											</p>
										<?php } ?>
										
										<?php if ($page != 'contratar') { ?>
											<a href="<?php echo base_url('contratar/plan/' . $item['id']); ?>" class="button button-medium margin-auto bc-red-4 margin-t-40">contratar</a>
										<?php } ?>
									<?php } ?>
								</li>
							</ul>