@extends('layouts.admin')
@section('title','Edit Song')
@section('main')
    <form action="{{route('song.update',$song->id)}}" enctype="multipart/form-data" role="form" method="POST">
        @csrf @method('PUT')
        <input type="hidden" name="id" value="{{$song->id}}"/>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" value="{{$song->name_song}}" name="name_song"  class="form-control" placeholder="" >
          @error('name_song')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Image Song</label>
          <div>
            <input type="file" name="upload_image" />
            <img src="{{url('public/uploads/image_song')}}/{{$song->image_song}}" width="50" />
          </div>     
        </div>
        <div class="form-group">
          <label for="">Image Banner Song</label>
          <div>
            <input type="file" name="upload_imagebanner" >
            <img src="{{url('public/uploads/banner_song')}}/{{$song->image_bannersong}}" width="100" />
          </div>
          @error('upload_imagebanner')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">File Mp3</label>
          <div>
            <input type="file"  name="upload_mp3" >
            <span>{{$song->link_mp3}}</span>
          </div>
          @error('upload_mp3')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">File Lyrics</label>
          <div>
            <input type="file" name="upload_lrc" >
            @if ($song->link_lyrics !=null)
            <span>{{$song->link_lyrics}}</span>
            @else
            <span>Chưa có lời bài hát</span>
            @endif
            
          </div>
          @error('upload_lrc')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Category</label>
          <select class="form-control" name="category_id" >
            <option value="">-- Select One --</option>
            @foreach ($cats as $item)
            <?php $selected = $song->category_id == $item->id ? 'selected': ''; ?>
            <option {{$selected}} value="{{$item->id}}">{{$item->name_category}}</option>
            @endforeach
          </select>
         
          @error('category_id')
              <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Artist</label>
          <select class="form-control" name="artist_id">
            <option value="">-- Select One --</option>
            @foreach ($artists as $item)
            <?php $selected = $song->artist_id == $item->id ? 'selected': ''; ?>
            <option {{$selected}} value="{{$item->id}}">{{$item->name_artist}}</option>
            @endforeach
          </select>
          @error('artist_id')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Area</label>
          <select class="form-control" name="area_id" >
            <option value="">-- Select One --</option>
            @foreach ($areas as $item)
            <?php $selected = $song->area_id == $item->id ? 'selected': ''; ?>
            <option {{$selected}} value="{{$item->id}}">{{$item->name_area}}</option>
            @endforeach
          </select>
          @error('area_id')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Status</label>
          <div>
            <label>
                <input type="radio" name="status" value="1" <?php echo $song->status == 1 ? 'checked': ''; ?> >
                Public
              </label>
              <label>
                  <input type="radio" name="status"  value="0" <?php echo $song->status == 0 ? 'checked': ''; ?> >
                  Private
                </label>
          </div>
        </div>
          <div class="form-group">
          <label for="">Prioty</label>
          <input type="number" value="{{$song->prioty}}" class="form-control" name="prioty" id="" >
          @error('prioty')
          <small id="helpId" class="text-muted">{{$message}}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit Song</button>
      </div>
        </div>
    </form>

@endsection
