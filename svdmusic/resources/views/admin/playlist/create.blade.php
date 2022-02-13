@extends('layouts.admin')
@section('title','Add Playlist')
@section('main')

    <form action="{{route('playlist.store')}}" method="POST" enctype="multipart/form-data" class="form-group" >
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Name Playlist</label>
                    <input type="text"  name="name_playlist" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('name_playlist')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Image Playlist</label>
                    <div>
                      <input type="file"  name="upload_image">
                    </div>
                    @error('upload_image')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Description Playlist</label>
                    <textarea id="content" name="description_playlist" rows="3"></textarea>
                    @error('description_playlist')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                  
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
              <button type="submit" class="btn btn-primary">Add playlist</button>
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
