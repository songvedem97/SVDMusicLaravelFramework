@extends('layouts.admin')
@section('title','Add Category')
@section('main')

    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" class="form-group" >
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Name Category</label>
                    <input type="text"  name="name_category" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('name_category')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Image Category</label>
                    <div>
                      <input type="file"  name="upload_image">
                    </div>
                    @error('upload_image')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Add Category</button>
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
