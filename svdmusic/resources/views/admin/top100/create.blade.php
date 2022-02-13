@extends('layouts.admin')
@section('title','Add Top100')
@section('main')

    <form action="{{route('top100.store')}}" method="POST" enctype="multipart/form-data" class="form-group" >
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Name Top100</label>
                    <input type="text"  name="name_top100"  class="form-control" placeholder="" aria-describedby="helpId">
                    @error('name_top100')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Image Top100</label>
                    <div>
                      <input type="file"  name="upload_image">
                    </div>
                    @error('upload_image')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>      
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Prioty</label>
                <input type="number" value="" class="form-control" name="prioty"  >
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
                        <input type="radio" name="status"  value="0" >
                        Private
                      </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Add Top100</button>
            </div>
        </div>
    </form>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('public/siteadmin') }}/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('js')
    <script src="{{ url('public/siteadmin') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('#content').summernote({
                height: 250
            })
        })
    </script>
@endsection
