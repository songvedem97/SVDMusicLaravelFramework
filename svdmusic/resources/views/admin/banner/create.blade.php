@extends('layouts.admin')
@section('title','Add Banner')
@section('main')

    <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data" class="form-group" >
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Name banner</label>
                    <input type="text"  name="name_banner" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('name_banner')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Image banner</label>
                    <div>
                      <input type="file"  name="upload_image">
                    </div>
                    @error('upload_image')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Add Banner</button>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Prioty</label>
                <input type="number" value="" class="form-control" name="prioty" id="" >
                @error('prioty')
                <small id="helpId" class="text-muted">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Status</label>
                <div>
                  <label>
                      <input type="radio" name="status" value="1" checked>
                      Public
                    </label>
                    <label>
                        <input type="radio" name="status" id="" value="0" >
                        Private
                      </label>
                </div>
              </div>
            </div>
        </div>
    </form>

@endsection
