<?php $__env->startSection('content'); ?>

<div class="row">
        <div class="col-lg-9">

          

            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thepost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="pb-3 mb-0 border-bottom border-gray">
                            <a href="<?php echo e(route('show.single.post', ['id' => $thepost->id])); ?>" style="text-decoration: none;">
                                <strong>
                                            <?php echo e($thepost->name); ?>

											
                                </strong>
                                <br>
                                <h1>
                                    <?php echo e($thepost->title); ?>

                                </h1>
								
                            </a>
								<p> di post pada: <?php echo e($thepost->created_at); ?></p>
							 <br>
							  <br>
                            <div class="text-right">
                                <a class="btn btn-sm btn-outline-success my-2 my-sm-0" href="#">
                                    Menarik
                                    <span class="badge badge-pill align-text-bottom"><?php echo e($thepost->up_vote); ?></span>
                                </a>
                                <a class="btn btn-sm btn-outline-info my-2 my-sm-0" href="#">
                                    Tidak Menarik
                                    <span class="nampak badge badge-pill align-text-bottom">
                                        <?php echo e($thepost->down_vote); ?>

                                    </span>
                                </a>
                                <a class="btn btn-lg btn-outline-dark my-2 my-sm-0" href="<?php echo e(route('show.single.post', ['id' => $thepost->id])); ?>">Jawab!</a>
                            </div>
                        </div>
                    </div>

					
					<br>
					<br>
					<p>Jawaban:</p>
                    <div class="media text-muted pt-3">
						
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thecomment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($thecomment->post_id == $thepost->id): ?>
                        <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
                        <span class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					
                        <strong class="d-block text-gray-dark">
                                    <?php echo e($thecomment->name); ?>

									
                        </strong>
						
						
						
						  <div class ="left">
						
                                	<?php echo $thecomment->body; ?>

							</div>
						
						<div>
							<a class="btn btn-sm btn-outline-success my-2 my-sm-0" href="#">
								Menarik
								<span class="badge badge-pill align-text-bottom">
									<?php echo e($thecomment->up_vote); ?>

								</span>
							</a>
							<a class="btn btn-sm btn-outline-info my-2 my-sm-0" href="#">
								Tidak Menarik
								<span class="nampak badge badge-pill align-text-bottom">
										<?php echo e($thecomment->down_vote); ?>

									</span>
							</a>
						</div>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</span>
                    </div>

                    <small class="d-block text-right mt-3">
                        <a href="<?php echo e(route('show.single.post', ['id' => $thepost->id])); ?>">Lihat semua jawaban</a>
                    </small>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
			
<?php echo e($posts->links()); ?>

          
        </div>

        <div class="col-lg-3">
            
            <div>
                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">TOP ASK-ER</h6>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Luthfi Abdurrahim</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@luthviar</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Afiq Rasyid M.</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@afiqrasyidm</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">M Luqman Hakim</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@mluqmanhak</span>
                        </div>
                    </div>
                    <small class="d-block text-right mt-3">
                        <a href="#">All suggestions</a>
                    </small>
                </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">TOP ANSWER-ER</h6>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Luthfi Abdurrahim</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@luthviar</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Afiq Rasyid M.</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@afiqrasyidm</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">M Luqman Hakim</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@mluqmanhak</span>
                        </div>
                    </div>
                    <small class="d-block text-right mt-3">
                        <a href="#">All suggestions</a>
                    </small>
                </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <p class="small">
                        "Orang yang malu bertanya, akan SESAT di jalan" -anonim
                    </p>
                    <p class="small">
                        So, mari kita berbagi pertanyaan dan jawaban!
                    </p>
                    <p class="small">
                        This is just for sharing only. The First Indonesian Asking and Answering Community.
                    </p>
                </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <p class="small">
                        <a href="#">About</a> -
                        <a href="#"> Terms</a> -
                        <a href="#">Privacy</a> -
                        <a href="#">Disclaimer</a> -
                        <a href="#">Advertise</a>
                    </p>
                </div>

            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>