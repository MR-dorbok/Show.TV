@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
		<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => 'لوحة التحكم' , 'isactive' => false],
			['url' => route('admin.users.index') , 'title' => 'المستخدمين' , 'isactive' => false],
			['url' => '#' , 'title' =>  'اضافة مستخدم', 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.users.store')}}">
		@csrf

		<div class="col-12 col-lg-8 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>	إضافة جديد
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الاسم
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" required minlength="3"  maxlength="190" class="form-control" value="{{old('name')}}" >
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					البريد
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email"  class="form-control"  value="{{old('email')}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					كلمة المرور
				</div>
				<div class="col-12 pt-3">
					<input type="password" name="password"  class="form-control" required minlength="8" >
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الصورة الشخصية
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="avatar"  class="form-control"  accept="image/*" >
				</div>
				<div class="col-12 p-0">
					
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الهاتف
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="phone"   maxlength="190" class="form-control"  value="{{old('phone')}}" >
				</div>
			</div>
			<!-- @if(auth()->user()->can('user-roles-update'))
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الصلاحية
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="roles[]" multiple required>
						@foreach($roles as $role)
							<option value="{{$role->id}}">{{$role->display_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			@endif -->


			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Role
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" name="role">
						<option value="0">Super Admin</option>
						<option  value="1">Editor</option>
						<option  value="2">User</option>
					</select>
				</div>
			</div>
			</div>
 
		</div>
		<div class="col-12">
    Permetion
</div>
<div class="col-12 pt-3">
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="toggleEdit" name="edit" value="1">
        <label class="custom-control-label" for="toggleEdit">Allow Edit</label>
    </div>
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="toggleDelete" name="delete" value="1">
        <label class="custom-control-label" for="toggleDelete">Allow Delete</label>
    </div>
</div>
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">حفظ</button>
		</div> 
		</form>
	</div>
</div>
@endsection

<script>
	// JavaScript with jQuery
$(document).ready(function() {
    // استماع إلى حدث تغيير حالة العنصر
    $('#toggleEdit').change(function() {
        // احصل على القيمة الجديدة للعنصر
        var value = $(this).is(':checked') ? 1 : 0;

        // يمكنك القيام بإجراءات إضافية هنا، مثلا إرسال القيمة إلى الخادم
        console.log('Edit value changed to: ' + value);
    });
});

</script>