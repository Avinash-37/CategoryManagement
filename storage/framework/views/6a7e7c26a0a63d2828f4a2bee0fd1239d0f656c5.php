<?php $__env->startSection('title', 'Category management'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
      <div class="divider"></div>
        <div class="col-12 text-center"><h1>Category Managemengt </h1></div>
        <div class="divider"></div>
        <hr/>
    </div>

    <div class="row">
        <div class="col-md-6 col-12 text-left"><h3>Category List</h3>
            <div class="divider"></div>
            <div class="mytree" id="mytree">
            <ul id="tree1">

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li>
                                     <div class="row categoryList">
                                      <div class="col-6 categoryTitle"><?php echo e($category->category_name); ?><input type="hidden" name="child-id" id="child-id" value="<?php echo e($category->id); ?>"></div>
                                          <div class="col-6">
                                            <div class="row">
                                              <div class="col-6"><img src="<?php echo e(URL::to('/')); ?>/uploadImages/<?php echo e($category-> cat_img); ?>" width='100' height="60" /></div>
                                              <div class="col-6 padding-10"><p data-placement="top" data-toggle="tooltip" title="Delete">
                                                
                                                <button class="btn btn-danger btn-sm" data-title="Delete" data-toggle="modal" data-target="#confirmModal" id="updateButton1" name="updateButton1">x</button></p></div>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="row mysubcategoryList">
                                      <div class="col-12 tree">
                                          <ul>
                                            <?php $__currentLoopData = $subCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorylist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li data-toggle="modal" data-target="#historyModal" id="showhistory" ><?php echo e($categorylist->sub_cat_name); ?></li>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </ul>
                                        </div>
                                    </div>
                                </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
              </div>
        </div>
        <div class="col-md-6 col-12"> 
            <div class="displayFlex text-right" >              
                    <button type="button" class="btn btn-success margin-right-10" data-toggle="modal" data-target="#newCategory">
                      add new category</button><div class="margin-right-10"></div>
                    <button type="button" class="btn btn-warning margin-right-10" data-toggle="modal" data-target="#newSub-Category">
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
                              <div class="form-group">
                                    <label for="uploadimage">Upload Image</label>
                                    <input type="file" id="uploadimage" name="uploadimage" class="form-control" placeholder="Upload Image "  >    
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
                                          <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </div>

                                  <div class="form-group">
                                    <label for="SubCategory">Enter Sub Category Name</label>
                                    <input type="text" class="form-control" id="SubCategory" name="SubCategory">
                                  </div>
                                  <div class="form-group">
                                    <label for="SubCategoryInfo">Enter Sub Category Info</label>
                                    <textarea class="form-control" id="SubCategoryInfo" name="SubCategoryInfo"></textarea>
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


<!--     DELETE Sub categoryL -->
<div class="modal fade" id="historyModal"  aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="Heading">Sub Category Info</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>    
                  <div class="modal-body">
                     <p>Java is a programming language and a platform.Java is a high level, robust, object-oriented and secure programming language.</p>
                     
                    </div>
                  <div class="modal-footer ">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
              
            </div>
        </div> 
  </div>

  <!--     DELETE Sub categoryL -->
<div class="modal fade" id="confirmModal"  aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="Heading">Delete this Category</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>    
                <div class="modal-body">
                   <div class="alert alert-danger">Are you sure want to delete this Category ?</div>
                   
                  </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" name="deleteSub" id="deleteSub">Yes</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                </div>
              
            </div>
        </div> 
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MylaravelTest\resources\views/categoryHome.blade.php ENDPATH**/ ?>