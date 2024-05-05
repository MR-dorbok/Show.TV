@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => 'لوحة التحكم' , 'isactive' => false],
			['url' => route('admin.users.index') , 'title' => 'المستخدمين' , 'isactive' => false],
			['url' => route('admin.users.show', $user->id) , 'title' =>  $user->name, 'isactive' => false],
			['url' => '#' , 'title' => 'تعديل' , 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.users.update',$user)}}">
		@csrf
		@method("PUT")
		<div class="col-12 col-lg-8 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> Edit User
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Name
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" required minlength="3"  maxlength="190" class="form-control" value="{{$user->name}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Email
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email"  class="form-control"  value="{{$user->email}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
Password				</div>
				<div class="col-12 pt-3">
					<input type="password" name="password"  class="form-control"  minlength="8" >
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Profile Photo
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="avatar"  class="form-control"  accept="image/*" >
				</div>
				<div class="col-12 p-0">
					<img src="" style="width:100px;margin-top:20px">
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Phone
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="phone"   maxlength="190" class="form-control"  value="{{$user->phone}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Role
				</div>
				<div class="col-12 pt-3">
				<select class="form-control" name="role">
                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Super Admin</option>
                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Editor</option>
                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>User</option>
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
            <input type="checkbox" class="custom-control-input" id="toggleEdit" name="edit" value="1" {{ $user->edit ? 'checked' : '' }}>
            <label class="custom-control-label" for="toggleEdit">Allow Edit</label>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="toggleDelete" name="delete" value="1" {{ $user->delete ? 'checked' : '' }}>
            <label class="custom-control-label" for="toggleDelete">Allow Delete</label>
        </div>
    </div>
    <div class="col-12 p-3">
        <button type="submit" class="btn btn-success">Save</button>
    </div> 
		</form>
	</div>
</div>
@endsection