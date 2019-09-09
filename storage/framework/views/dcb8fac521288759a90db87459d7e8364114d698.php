<ul>

<?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<li>
		<div class="row">
            <div class="col-6"><?php echo e($child->title); ?><input type="hidden" name="child-id" id="child-id" value="<?php echo e($child->id); ?>">
				<?php if(count($child->childs)): ?>

			            <?php echo $__env->make('manageChild',['childs' => $child->childs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			        <?php endif; ?>
			     </div>
				<div class="col-6 text-left">
					<p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-sm" data-title="Delete" data-toggle="modal" data-target="#confirmModal" id="updateButton1" name="updateButton1">x</button></p>
	            </div>
        </div>

	</li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>
<?php /**PATH C:\xampp\htdocs\MylaravelTest\resources\views/manageChild.blade.php ENDPATH**/ ?>