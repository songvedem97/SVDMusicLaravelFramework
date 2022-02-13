@extends('layouts.admin')
@section('title', 'Add Artist')
@section('main')

    <form action="{{ route('artist.store') }}" method="POST" enctype="multipart/form-data" role="form" class="form-group">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Name Artist</label>
                    <input id="input_slug" type="text" name="name_artist" onkeyup="ChangeToSlug();" class="form-control">
                    @error('name_artist')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Avatar Artist</label>
                    <div>
                        <input type="file" name="upload_image">
                    </div>
                    @error('upload_image')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Slug Artist</label>
                    <input id="output_slug" type="text" name="slug_artist" readonly class="form-control" >
                    @error('slug_artist')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Description Artist</label>
                    <textarea id="content" name="description_artist" rows="3"></textarea>
                    @error('description_artist')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Area</label>
                    <select class="form-control" name="area_id">
                        <option value="">-- Select One --</option>
                        @foreach ($areas as $item)
                            <option value="{{ $item->id }}">{{ $item->name_area }}</option>
                        @endforeach
                    </select>
                    @error('area_id')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Date of birth</label>
                    <input type="date" name="birth_day_artist" class="form-control">
                    @error('birth_day_artist')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Prioty</label>
                    <input type="number" value="" class="form-control" name="prioty">
                    @error('prioty')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
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
                            <input type="radio" name="status" value="0">
                            Private
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Artist</button>

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
