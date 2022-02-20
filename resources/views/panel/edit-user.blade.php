@extends('layouts.sidebar')

@section('content')

      <h2 class="mb-4"><i class="bi bi-person"> Edit User</i></h2>
      @foreach($user as $user)
      <form action="{{ route('editUser', $user->id) }}" enctype="multipart/form-data" method="post">
        @csrf
            <div class="form-group col-lg-8">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
          </div>
          <div class="form-group col-lg-8">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
          </div>
          <div class="form-group col-lg-8">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="if empty, password will blank">
          </div>
          
          <div class="form-group col-lg-8">
            <label>Logo</label>
            <input type="file" class="form-control-file" name="image">
          </div>
          
          <div class="form-group col-lg-8">
          @if(file_exists(base_path("img/$user->littlelink_name" . ".png" )))
          <img src="{{ asset("img/$user->littlelink_name" . ".png") }}" srcset="{{ asset("img/$user->littlelink_name" . "@2x.png 2x") }}" width="100px" height="100px">
          @elseif(file_exists(base_path("littlelink/images/avatar.png" )))
          <img class="rounded-avatar" src="{{ asset('littlelink/images/avatar.png') }}" srcset="{{ asset('littlelink/images/avatar@2x.png 2x') }}" width="100px" height="100px">
          @else
          <img src="{{ asset('littlelink/images/logo.svg') }}" srcset="{{ asset('littlelink/images/avatar@2x.png 2x') }}">
          @endif
          </div>
          
          <!--<div class="form-group col-lg-8">
            <label>Littlelink name </label>
            <input type="text" class="form-control" name="littlelink_name" value="{{ $user->littlelink_name }}">
          </div>-->
          
          <div class="form-group col-lg-8">
            <label>Page URL</label>
	          <div class="input-group">
				  <div class="input-group-prepend">
					<div class="input-group-text">{{ config('app.url') }}/@</div>
				  </div>
				  <input type="text" class="form-control" name="littlelink_name" value="{{ $user->littlelink_name }}">
			  </div>
		  </div>
          
          <div class="form-group col-lg-8">
            <label> Page description</label>
            <textarea class="form-control" name="littlelink_description" rows="3">{{ $user->littlelink_description }}</textarea>
          </div>
          <div class="form-group col-lg-8">
            <label for="exampleFormControlSelect1">Role</label>
            <select class="form-control" name="role">
              <option <?= ($user->role === strtolower('User')) ? 'selected' : '' ?>>User</option>
              <option <?= ($user->role === strtolower('VIP')) ? 'selected' : '' ?>>VIP</option>
              <option <?= ($user->role === strtolower('Admin')) ? 'selected' : '' ?>>Admin</option>
            </select>
          </div>
          @endforeach
          <button type="submit" class="mt-3 ml-3 btn btn-info">Submit</button>
        </form>

@endsection
