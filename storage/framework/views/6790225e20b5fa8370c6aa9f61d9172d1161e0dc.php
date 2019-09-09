<!DOCTYPE html>

<html>

<head>

	<title>Laravel Category Treeview Example</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />

    <link href="<?php echo e(env('APP_CSS_BOOTSTRAP_PATH')); ?>bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo e(env('APP_CSS_PATH')); ?>treeview.css" rel="stylesheet">

</head>

<body>

	<div class="container">     

		<div class="panel panel-primary">

			<div class="panel-heading">Manage Category TreeView</div>

	  		<div class="panel-body">

	  			<div class="row">

	  				<div class="col-md-6">

	  					<h3>Category List</h3>

				        <ul id="tree1">

				            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				                <li>

				                    <?php echo e($category->title); ?>


				                    <?php if(count($category->childs)): ?>
				                    	<div class="row">
				                    		<div class="col-10"><?php echo $__env->make('manageChild',['childs' => $category->childs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
				                    		<div class="col-2"><button class="btn btn-danger">Remove</button></div>
				                    	</div>
				                    

				                    <?php endif; ?>

				                </li>

				            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				        </ul>

	  				</div>

	  				<div class="col-md-6">

	  					<h3>Add New Category</h3>

				  				<?php if($message = Session::get('success')): ?>

									<div class="alert alert-success alert-block">

										<button type="button" class="close" data-dismiss="alert">×</button>	

									        <strong><?php echo e($message); ?></strong>

									</div>

								<?php endif; ?>



				  				<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">

						

									<span class="text-danger"><?php echo e($errors->first('title')); ?></span>

								</div>



								<div class="form-group <?php echo e($errors->has('parent_id') ? 'has-error' : ''); ?>">

									<span class="text-danger"><?php echo e($errors->first('parent_id')); ?></span>

								</div>



								<div class="form-group">

									<button class="btn btn-success">Add New</button>

								</div>

			  				</div>

			  			</div>


	  		</div>

        </div>

    </div>

    <script src="/js/treeview.js"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\MylaravelTest\resources\views/categoryTreeview.blade.php ENDPATH**/ ?>