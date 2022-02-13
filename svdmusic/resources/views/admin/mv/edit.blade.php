@extends('layouts.admin')
@section('title', 'Edit MV')
@section('main')

    <form action="{{ route('mv.update', $mv->id) }}" role="form" enctype="multipart/form-data" method="POST">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="{{ $mv->id }}" />
                <div class="form-group">
                    <label for="">Name MV</label>
                    <input type="text" value="{{ $mv->name_mv }}" name="name_mv" class="form-control" placeholder="">
                    @error('name_mv')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Image MV</label>
                    <div>
                        <input type="file" name="upload_image">
                        <img src="{{ url('public/uploads/mv') }}/{{ $mv->image_mv }}" width="100" />
                    </div>
                </div>
                <div class="form-group">
                  <label for="">Name Artist</label>
                  <input type="text" value="{{$mv->name_artist}}"  name="name_artist" class="form-control" placeholder="" aria-describedby="helpId">
                  @error('name_artist')
                  <small id="helpId" class="text-muted">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Link Youtobe</label>
                  <input type="text" value="{{$mv->link_mv}}"  name="link_mv" class="form-control" placeholder="" aria-describedby="helpId">
                  @error('link_mv')
                  <small id="helpId" class="text-muted">{{$message}}</small>
                  @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Select Song</label>
                      <select class="form-control" name="song_id" >
                        <option value="">-- Select One --</option>
                        @foreach ($songs as $item)
                        <?php $selected = $mv->song_id == $item->id ? 'selected': ''; ?>
                        <option {{$selected}} value="{{$item->id}}">{{$item->name_song}}</option>
                        @endforeach
                      </select>
                     
                      @error('song_id')
                          <small id="helpId" class="text-muted">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Artist</label>
                      <select class="form-control" name="artist_id">
                        <option value="">-- Select One --</option>
                        @foreach ($artists as $item)
                        <?php $selected = $mv->artist_id == $item->id ? 'selected': ''; ?>
                        <option {{$selected}} value="{{$item->id}}">{{$item->name_artist}}</option>
                        @endforeach
                      </select>
                      @error('artist_id')
                      <small id="helpId" class="text-muted">{{$message}}</small>
                      @enderror
                    </div>
                    <label for="">Status</label>
                    <div>
                        <label>
                            <input type="radio" name="status" value="1" <?php echo $mv->status == 1 ? 'checked' : ''; ?>>
                            Public
                        </label>
                        <label>
                            <input type="radio" name="status" id="" value="0" <?php echo $mv->status == 0 ? 'checked' : ''; ?>>
                            Private
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Prioty</label>
                    <input type="number" value="{{ $mv->prioty }}" class="form-control" name="prioty" id="">
                    @error('prioty')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Data</button>
        </div>
    </form>

@endsection
