@extends("layout/master")
@section("title","Category Create")
@section("content")
<div class="container my-3">
    <div class="row">
        <div class="col-md-3">
            @include("layout/admin_sidebar")
        </div>
        <div class="col-md-9">
            <h2 class="text-center mb-2">Category Create</h2>
            @include("layout.report_message")
            @if(\App\Classes\SessionManager::has("delete_success"))
                {{\App\Classes\SessionManager::flash("delete_success")}}
            @endif
            @if(\App\Classes\SessionManager::has("delete_fail"))
                {{\App\Classes\SessionManager::flash("delete_fail")}}
            @endif
        {{-- <form start Here> --}}
        <form action="/admin/category/create" method="POST">
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        {{-- <form End Here> --}}
        {{-- Category list Starting  --}}
        <ul class="list-group mt-5">
            @foreach($cats as $cat)
            <li class="list-group-item">
                {{$cat->name}}
                <span class="float-right">
                    <i class="fa fa-plus text-primary" id="edit_but" onclick="showSubCategoryModal('{{$cat->name}}','{{$cat->id}}')"></i>
                    <i class="fa fa-edit text-warning ml-2" onclick="dofun('{{$cat->name}}','{{$cat->id}}');" id="edit_but"></i>
                    <a href="/admin/category/{{$cat->id}}/delete"><i class="fa fa-trash text-danger ml-2"></i></a>
                </span>
            </li>
            @endforeach
        </ul>
        <div class="mt-2 offset-md-4">
            {!!$pages!!}
        </div>
        {{-- Category list Ending  --}}
        {{-- Sub Category list Starting --}}
        <ul class="list-group mt-4">
            @foreach($sub_cats as $subcat)
                <li class="list-group-item">{{$subcat->name}}
                    <span class="float-right">
                        <i class="fa fa-edit text-warning" onclick="subCatEdit('{{$subcat->name}}','{{$subcat->id}}')" id="edit_but"></i>
                        <a href="/admin/subcategory/{{$subcat->id}}/delete"><i class="fa fa-trash text-danger ml-2"></i></a>
                    </span>
                </li>
            @endforeach
        </ul>
        <div class="mt-2 offset-md-4">{!!$sub_pages!!}</div>
        {{-- Sub Category list Ending --}}
        </div>
    </div>
</div>
{{-- Category Modal Edit Start --}}
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
          {{-- <form start Here> --}}
        <form>
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="edit-name">
            </div>
            <input type="hidden" id="edit-token" value="{{\App\Classes\CSRFToken::_token()}}">
            <input type="hidden" id="edit-id" value="">
            <button class="btn btn-primary" onclick="startEdit(event)">Update</button>
        </form>
        {{-- <form start Here> --}}
        </div>
      </div>
    </div>
  </div>
{{-- Category Modal Edit End --}}

{{-- Create Sub Category Modal Start --}}
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
          {{-- <form start Here> --}}
        <form>
            <div class="form-group">
                <label for="name">Parent Name</label>
                <input type="text" class="form-control" id="parent-cat-name">
            </div>
            <div class="form-group">
                <label for="name">Sub Category Name</label>
                <input type="text" class="form-control" id="sub-cat-name">
            </div>
            <input type="hidden" id="sub-cat-token" value="{{\App\Classes\CSRFToken::_token()}}">
            <input type="hidden" id="parent-cat-id" value="">
            <button class="btn btn-primary" onclick="createSubCategory(event)">Create</button>
        </form>
        {{-- <form start Here> --}}
        </div>
      </div>
    </div>
  </div>
{{-- Create Sub Category Modal End --}}

{{--Sub Category Modal Edit Start --}}
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
          {{-- <form start Here> --}}
        <form>
            <div class="form-group">
                <label for="name">SubCategory Name</label>
                <input type="text" class="form-control" id="sub-cat-edit-name">
            </div>
            <input type="hidden" id="sub-cat-edit-token" value="{{\App\Classes\CSRFToken::_token()}}">
            <input type="hidden" id="sub-cat-edit-id" value="">
            <button class="btn btn-primary" onclick="subCatUpdate(event)">Update</button>
        </form>
        {{-- <form start Here> --}}
        </div>
      </div>
    </div>
  </div>
{{-- Sub Category Modal Edit End --}}
@endsection
@section("script")
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
@endsection


    