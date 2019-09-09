<?php $__env->startSection('title', 'Category management'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center"><h1>Category Managemengt </h1></div>
        <div class="divider"></div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12 text-left"><h3>Category List</h3>
            <div class="divider"></div>
            <ul id="tree1">

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li>

                                    <?php echo e($category->title); ?>


                                    <?php if(count($category->childs)): ?>

                                            <?php echo $__env->make('manageChild',['childs' => $category->childs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php endif; ?>

                                </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>

        </div>
        <div class="col-md-6 col-12"> 
            <div class="displayFlex">              
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCategory">
                      add new category</button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#newSub-Category">
                      add Sub-category</button>
                </div>
                    <div class="modal" id="newCategory">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <h4 class="modal-title">Add New category</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <div class="modal-body">
                             <form action="" method="post" id="AddCategory" enctype="multipart/form-data" onsubmit="AddCategory(event)">
                                <?php echo csrf_field(); ?>

                              <div class="form-group">
                                <label for="Category">Enter Category Name</label>
                                <input type="text" class="form-control" id="Category" name="Category">
                              </div>

                              <div class="diverror" style="color: #dc3545;padding: 10px;" id="errorMsg"></div>
                              <button type="submit" class="btn btn-success">Submit</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>

                    <!-- ****** Ading sub category ********* -->
                    <div class="modal" id="newSub-Category">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <h4 class="modal-title">Add New Sub category</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <div class="modal-body">
                             <form action="" method="post" id="AddSubCategory" enctype="multipart/form-data" onsubmit="AddSubCategory(event)">
                                    <?php echo csrf_field(); ?>

                                <div class="form-group">
                                  <label for="select_category">Select Category</label>
                                 
                                  <select class="form-control" id="select_category" name="select_category">
                                        <option value="">Select Category</option>
                                     <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </div>

                                  <div class="form-group">
                                    <label for="SubCategory">Enter Sub Category Name</label>
                                    <input type="text" class="form-control" id="SubCategory" name="SubCategory">
                                  </div>
                                  <div class="diverror" style="color: #dc3545;padding: 10px;" id="suberrorMsg"></div>
                                  <button type="submit" class="btn btn-success" >Submit</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </form>
                              </div>

                        </div>
                      </div>
                    </div>

        </div>
    </div>
    <div class="divider"></div>
    <div class="row">
        <div class="col-12">
            <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
        </div>
    </div>

<!-- Error mesaage Modal-->
<!--     <a class="nav-link" data-toggle="modal" id="showError" data-target="#errorModal" style="display: none;"></a>
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="errorMsg"></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!--     DELETE Sub categoryL -->
<div class="modal fade" id="confirmModal"  aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="Heading">Delete this Sub Category</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>    
                <div class="modal-body">
                   <div class="alert alert-danger">Are you sure want to delete this SubCategory ?</div>
                   
                  </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" name="deleteSub" id="deleteSub">Yes</button>

                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                </div>
              
            </div>
        </div> 
  </div>

<script type="text/javascript">

$(document).ready(function() {
    var id = document.getElementById('child-id').value;
      $('#deleteSub').click(function(){
        event.preventDefault();
        $.ajax({
          type: "POST",
          url:"deletecategory/"+id,
          processData:false,
          contentType:false,
          beforeSend:function(){
            $('#deleteSub').text('Deleting...');
          },
          success:function(data){
            setTimeout(function(){
              $('#confirmModal').modal('hide');
              $('#tree1').load(document.URL + ' #tree1');
            },2000);
          }
        })
      });
 

});
</script>
<script src="<?php echo e(env('APP_JS_PATH')); ?>functions.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MylaravelTest\resources\views/home.blade.php ENDPATH**/ ?>