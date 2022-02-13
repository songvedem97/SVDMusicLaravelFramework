@extends('layouts.admin')
@section('title', 'Add Song')
@section('main')
    <form action="{{ route('song.store') }}" method="POST" enctype="multipart/form-data" class="form-group">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Name Song</label>
                    <input type="text" name="name_song" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('name_song')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Image Song</label>
                    <div>
                        <input type="file" name="upload_image">
                    </div>
                    @error('upload_image')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Image Banner Song</label>
                    <div>
                        <input type="file" name="upload_imagebanner">
                    </div>
                    @error('upload_imagebanner')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">File Mp3</label>
                    <div>
                        <input type="file" name="upload_mp3">
                    </div>
                    @error('upload_mp3')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">File Lyrics</label>
                    <div>
                        <input type="file" name="upload_lrc">
                    </div>
                    @error('upload_lrc')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Song</button>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category_id">
                        <option value="">-- Select One --</option>
                        @foreach ($cats as $item)
                            <option value="{{ $item->id }}">{{ $item->name_category }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
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
            </div>
        </div>
    </form>
@endsection
