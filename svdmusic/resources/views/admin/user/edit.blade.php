@extends('layouts.admin')
@section('title','Edit User')
@section('main')

    <form action="{{route('user.update',$user->id)}}" role="form" enctype="multipart/form-data" method="POST">
      <div class="col-md-6">
        @csrf @method('PUT')
        <input type="hidden" name="id" value="{{$user->id}}"/>
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" value="{{$user->name}}" name="name"  class="form-control" placeholder="" >
          @error('name')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" value="{{$user->email}}" name="email"  class="form-control" placeholder="" >
          @error('name')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">New Password</label>
          <input type="password" name="password" id="" class="form-control" placeholder=""
              aria-describedby="helpId">
          @error('password')
              <small id="helpId" class="text-muted">{{ $message }}</small>
          @enderror
      </div>
      <div class="form-group">
        <label for="">Repeat Password</label>
        <input type="password" name="confirm_password" id="" class="form-control" placeholder=""
            aria-describedby="helpId">
        @error('confirm_password')
            <small id="helpId" class="text-muted">{{ $message }}</small>
        @enderror
    </div>
        <div class="form-group">
          <label for="">Image User</label>
          <div>
            <input type="file" name="upload_image" >
            <img onerror="this.src='{{url('public/uploads/user/avatar_default.jpg')}}'" src="{{url('public/uploads/user')}}/{{$user->image_user}}" width="50" />
          </div>
          
        </div>
        <div class="form-group">
          <label for="">Status</label>
          <div>
            <label>
                <input type="radio" name="status" value="1" <?php echo $user->status == 1 ? 'checked': ''; ?>>
                Public
              </label>
              <label>
                  <input type="radio" name="status" id="" value="0" <?php echo $user->status == 0 ? 'checked': ''; ?>>
                  Private
                </label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Data</button>
      </div>
    </form>

@endsection
