@extends('layouts.admin')
@section('title','Edit Banner')
@section('main')

    <form action="{{route('banner.update',$banner->id)}}" role="form" enctype="multipart/form-data" method="POST">
        @csrf @method('PUT')
        <input type="hidden" name="id" value="{{$banner->id}}"/>
        <div class="form-group">
          <label for="">Name banner</label>
          <input type="text" value="{{$banner->name_banner}}" name="name_banner"  class="form-control" placeholder="" >
          @error('name_banner')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Image banner</label>
          <div>
            <input type="file" name="upload_image" >
            <img src="{{url('public/uploads/banner')}}/{{$banner->image_banner}}" width="150" />
          </div>
          
        </div>
        <div class="form-group">
          <label for="">Status</label>
          <div>
            <label>
                <input type="radio" name="status" value="1" <?php echo $banner->status == 1 ? 'checked': ''; ?>>
                Public
              </label>
              <label>
                  <input type="radio" name="status" id="" value="0" <?php echo $banner->status == 0 ? 'checked': ''; ?>>
                  Private
                </label>
          </div>
        </div>
          <div class="form-group">
          <label for="">Prioty</label>
          <input type="number" value="{{$banner->prioty}}" class="form-control" name="prioty" id="" >
          @error('prioty')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Data</button>
    </form>

@endsection
