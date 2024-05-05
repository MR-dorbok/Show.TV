@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-categories"></span> الأقسام
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('categories-create')
					<a href="{{route('admin.categories.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
					</a>
					@endcan
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">
				
			<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">create new </a>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catigories Name </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- هنا يمكنك وضع نموذجك -->
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('categories.store')}}">
		@csrf
		<input type="hidden" name="temp_file_selector" id="temp_file_selector" value="{{uniqid()}}">
	
			
				 
		
		
				
			
			<!-- <div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الرابط
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="slug" required  maxlength="190" class="form-control" value="{{old('slug')}}" >
				</div>
			</div> -->
	
				<div class="col-12">
					Name
				</div>
		
					<input type="text" name="name" required   maxlength="190" class="form-control" value="{{old('title')}}" >
				</div>
		

			<!-- <div class="col-12 p-2">
				<div class="col-12">
					الشعار
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="image"    class="form-control" accept="image/*">
				</div>
				<div class="col-12 pt-3">

				</div>
			</div>

			<div class="col-12  p-2">
				<div class="col-12">
					الوصف
				</div>
				<div class="col-12 pt-3">
					<textarea name="description" class="editor with-file-explorer" >{{old('description')}}</textarea>
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					ميتا الوصف
				</div>
				<div class="col-12 pt-3">
					<textarea name="meta_description" class="form-control" style="min-height:150px">{{old('meta_description')}}</textarea>
				</div>
			</div>
			</div>
 
		</div> -->
		 
		<div class="col-12 p-3">
			
			<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button class="btn btn-success" id="submitEvaluation">Add</button>
      </div>
		</div> 
		</form>
      </div>
  
    </div>
  </div>
</div>

			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						
						<!-- <th>الشعار</th> -->
						<th>العنوان</th>
						<!-- <th>المقالات</th> -->
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>

						<td>{{$category->name}}</td>
						<td>
						<!-- زر النافذة المودال -->
<button class="btn btn-outline-success btn-sm font-1 mx-1" data-toggle="modal" data-target="#editModal{{$category->id}}">
    <span class="fas fa-wrench"></span> تحكم
</button>

<!-- النموذج المودال -->
<div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal{{$category->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{$category->id}}Label">تعديل الفئة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			<div class="modal-body">
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">اسم الفئة</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <!-- يمكنك إضافة المزيد من الحقول التحريرية هنا حسب احتياجاتك -->
        
</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
    </form>
            </div>
        </div>
    </div>
</div>

				
							<form method="POST" action="{{route('categories.destroy',$category)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form>
					
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$categories->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
