@extends('layouts.admin')
@section('title', 'Edit Artist')
@section('main')

    <form action="{{ route('artist.update', $artist->id) }}" role="form" enctype="multipart/form-data" method="POST">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="{{ $artist->id }}" />
                <div class="form-group">
                    <label for="">Name Artist</label>
                    <input type="text" id="input_slug" value="{{ $artist->name_artist }}" onkeyup="ChangeToSlug();" name="name_artist" class="form-control"
                        placeholder="">
                    @error('name_artist')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Image Artist: {{$artist->image_artist ? $artist->image_artist : 'Chưa có ảnh' }}</label>
                    <div>
                        <input type="file" name="upload_image">
                        <img onerror="this.src='{{url('public/uploads/artist/avatar_default.jpg')}}'" src="{{ url('public/uploads/artist') }}/{{ $artist->image_artist }}" width="50" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Slug Artist</label>
                    <input id="output_slug" value="{{$artist->slug_artist}}" type="text" name="slug_artist" readonly class="form-control" >
                    @error('slug_artist')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Date of birth: {{$artist->birth_day_artist ? $artist->birth_day_artist : 'Chưa có ngày sinh' }}</label>
                    <input type="date" name="birth_day_artist" class="form-control">
                    @error('birth_day_artist')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <div>
                        <label>
                            <input type="radio" name="status" value="1"  <?php echo $artist->status == 1 ? 'checked': ''; ?>>
                            Public
                        </label>
                        <label>
                            <input type="radio" name="status" id="" value="0" <?php echo $artist->status == 0 ? 'checked': ''; ?>>
                            Private
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Prioty</label>
                    <input type="number" value="{{ $artist->prioty }}" class="form-control" name="prioty" id="">
                    @error('prioty')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Area</label>
                    <select class="form-control" name="area_id" >
                      <option value="">-- Select One --</option>
                      @foreach ($areas as $item)
                      <?php $selected = $artist->area_id == $item->id ? 'selected': ''; ?>
                      <option {{$selected}} value="{{$item->id}}">{{$item->name_area}}</option>
                      @endforeach
                    </select>
                    @error('area_id')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                  </div>
                <div class="form-group">
                    <label for="">Description Artist</label>
                    <textarea id="content" name="description_artist" rows="3">{{$artist->description_artist}}</textarea>
                    @error('description_artist')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>

            </div>
        </div>
    </form>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('public/siteadmin') }}/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('js')
    <script src="{{ url('public/siteadmin') }}/dist/js/slug.js"></script>
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
