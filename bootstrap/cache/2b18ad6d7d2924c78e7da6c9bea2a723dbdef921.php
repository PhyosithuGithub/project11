<?php $__env->startSection("title","Category Create"); ?>
<?php $__env->startSection("content"); ?>
<div class="container my-3">
    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make("layout/admin_sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
            <h2 class="text-center mb-2">Category Create</h2>
            <?php echo $__env->make("layout.report_message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(\App\Classes\SessionManager::has("delete_success")): ?>
                <?php echo e(\App\Classes\SessionManager::flash("delete_success")); ?>

            <?php endif; ?>
            <?php if(\App\Classes\SessionManager::has("delete_fail")): ?>
                <?php echo e(\App\Classes\SessionManager::flash("delete_fail")); ?>

            <?php endif; ?>
        
        <form action="/admin/category/create" method="POST">
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        
        
        <ul class="list-group mt-5">
            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
                <?php echo e($cat->name); ?>

                <span class="float-right">
                    <i class="fa fa-plus text-primary" id="edit_but" onclick="showSubCategoryModal('<?php echo e($cat->name); ?>','<?php echo e($cat->id); ?>')"></i>
                    <i class="fa fa-edit text-warning ml-2" onclick="dofun('<?php echo e($cat->name); ?>','<?php echo e($cat->id); ?>');" id="edit_but"></i>
                    <a href="/admin/category/<?php echo e($cat->id); ?>/delete"><i class="fa fa-trash text-danger ml-2"></i></a>
                </span>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="mt-2 offset-md-4">
            <?php echo $pages; ?>

        </div>
        
        
        <ul class="list-group mt-4">
            <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"><?php echo e($subcat->name); ?>

                    <span class="float-right">
                        <i class="fa fa-edit text-warning" onclick="subCatEdit('<?php echo e($subcat->name); ?>','<?php echo e($subcat->id); ?>')" id="edit_but"></i>
                        <a href="/admin/subcategory/<?php echo e($subcat->id); ?>/delete"><i class="fa fa-trash text-danger ml-2"></i></a>
                    </span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="mt-2 offset-md-4"><?php echo $sub_pages; ?></div>
        
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="EditCatModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Name</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          
        <form>
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="edit-name">
            </div>
            <input type="hidden" id="edit-token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
            <input type="hidden" id="edit-id" value="">
            <button class="btn btn-primary" onclick="startEdit(event)">Update</button>
        </form>
        
        </div>
      </div>
    </div>
  </div>



<div class="modal" tabindex="-1" role="dialog" id="SubCategoryModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create Sub-Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          
        <form>
            <div class="form-group">
                <label for="name">Parent Name</label>
                <input type="text" class="form-control" id="parent-cat-name">
            </div>
            <div class="form-group">
                <label for="name">Sub Category Name</label>
                <input type="text" class="form-control" id="sub-cat-name">
            </div>
            <input type="hidden" id="sub-cat-token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
            <input type="hidden" id="parent-cat-id" value="">
            <button class="btn btn-primary" onclick="createSubCategory(event)">Create</button>
        </form>
        
        </div>
      </div>
    </div>
  </div>



<div class="modal" tabindex="-1" role="dialog" id="SubCatModalDia">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sub Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          
        <form>
            <div class="form-group">
                <label for="name">SubCategory Name</label>
                <input type="text" class="form-control" id="sub-cat-edit-name">
            </div>
            <input type="hidden" id="sub-cat-edit-token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
            <input type="hidden" id="sub-cat-edit-id" value="">
            <button class="btn btn-primary" onclick="subCatUpdate(event)">Update</button>
        </form>
        
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>
 <script>
    function dofun(name,id){
        $("#edit-name").val(name);
        $("#edit-id").val(id);
        $("#EditCatModal").modal("show");
    }
    function startEdit(e){
        e.preventDefault();
        name =$("#edit-name").val();
        token =$("#edit-token").val();
        id = $("#edit-id").val();
        $.ajax({
            type:'POST',
            url:'/admin/category/'+ id + '/update',
            data:{
                name:name,
                token:token,
                id:id
            },
            success:function(result){
                $("#EditCatModal").modal("hide");
                window.location.href ="/admin/category/create";
            },
            error:function(response){
                var str ="";
                var resp = JSON.parse(response.responseText);
                alert(resp.name);
            }
        })
    }
    function showSubCategoryModal(name,id){
        $("#parent-cat-name").val(name);
        $("#parent-cat-id").val(id);
        $("#SubCategoryModal").modal("show");
    }
    function createSubCategory(e){
        e.preventDefault();
        var sub_cat_name=$("#sub-cat-name").val();
        var sub_cat_token=$("#sub-cat-token").val();
        var parent_cat_id =$("#parent-cat-id").val();
        $("#SubCategoryModal").modal("hide");
        
        $.ajax({
            type:'POST',
            url:'/admin/subcategory/create',
            data:{
                name:sub_cat_name,
                token:sub_cat_token,
                id:parent_cat_id
            },
            success:function(result){
                window.location.href ="/admin/category/create";
            },
            error:function(response){
                var str="";
                var resp = JSON.parse(response.responseText);
                alert(resp.name);
            }
        })

    }
    function subCatEdit(name,id){
        $("#sub-cat-edit-name").val(name);
        $("#sub-cat-edit-id").val(id);
        $("#SubCatModalDia").modal("show");
    }
    function subCatUpdate(e){
        e.preventDefault();
        let name =$("#sub-cat-edit-name").val();
        let id =$("#sub-cat-edit-id").val();
        let token =$("#sub-cat-edit-token").val();
        $("#SubCatModalDia").modal("hide");

        $.ajax({
            type:"POST",
            url:"/admin/subcategory/update",
            data:{
                name:name,
                id:id,
                token:token
            },
            success:function(result){
                window.location.href="/admin/category/create";
            },
            error:function(response){
                let resp = JSON.parse(response.responseText);
                alert(resp.name);
            }
        })
    }
    
 </script>
<?php $__env->stopSection(); ?>


    
<?php echo $__env->make("layout/master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project1\resources\views/backend/category/create.blade.php ENDPATH**/ ?>