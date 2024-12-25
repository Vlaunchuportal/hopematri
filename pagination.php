
			<div class="col-lg-12 col-sm-12">
			<div class="row">
			<ul class="pagination pag-bot">
				<?php if ($page > 1): ?>
				<li class="prev"><a class="page-numbers" data-page="<?php echo $page-1; ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a class="page-numbers" data-page="1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a class="page-numbers" data-page="<?php echo $page-2; ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a class="page-numbers" data-page="<?php echo $page-1;?>"><?php echo $page-1 ?></a></li><?php endif; ?>
				
				<li class="currentpage"><a class="page-numbers" data-page="<?php echo $page;?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($count / $per_page)+1): ?><li class="page"><a class="page-numbers" data-page="<?php echo $page+1;?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($count / $per_page)+1): ?><li class="page"><a class="page-numbers" data-page="<?php echo $page+2; ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($count / $per_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a class="page-numbers" data-page="<?php echo ceil($count / $per_page); ?>"><?php echo ceil($count / $per_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($count / $per_page)): ?>
				<li class="next"><a class="page-numbers" data-page="<?php echo $page+1; ?>">Next</a></li>
				<?php endif; ?>
			</ul>
			</div>
			</div>
			