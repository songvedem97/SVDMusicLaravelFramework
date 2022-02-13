@extends('layouts.admin')
@section('title','Add MV')
@section('main')

    <form action="{{route('mv.store')}}" method="POST" enctype="multipart/form-data" class="form-group" >
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Name MV</label>
                    <input type="text"  name="name_mv" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('name_mv')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Name Artist</label>
                    <input type="text"  name="name_artist" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('name_artist')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Image MV</label>
                    <div>
                      <input type="file"  name="upload_image">
                    </div>
                    @error('upload_image')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Link Youtobe</label>
                    <input type="text"  name="link_mv" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('link_mv')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Add MV</button>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Select Song</label>
                <select class="form-control" name="song_id">
                    <option value="">-- Select One --</option>
                    @foreach ($songs as $item)
                        <option value="{{ $item->id }}">{{ $item->name_song }}</option>
                    @endforeach
                </select>
                @error('song_id')
                    <small id="helpId" class="text-muted">{{ $message }}</small>
                @enderror
            </div>
              <div class="form-group">
                <label for="">Artist</label>
                <select class="form-control" name="artist_id">
                    <option value="">-- Select One --</option>
                    @foreach ($artists as $item)
                        <option value="{{ $item->id }}">{{ $item->name_artist }}</option>
                    @endforeach
                </select>
                @error('artist_id')
                    <small id="helpId" class="text-muted">{{ $message }}</small>
                @enderror
            </div>
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
