@extends('layouts.admin')
@section('title', 'Edit Area')
@section('main')

    <form action="{{ route('area.update', $area->id) }}" role="form" enctype="multipart/form-data" method="POST">
        @csrf @method('PUT')
        <input type="hidden" name="id" value="{{ $area->id }}" />
        <div class="form-group">
            <label for="">Name Area</label>
            <input type="text" id="input_slug" value="{{ $area->name_area }}" onkeyup="ChangeToSlug();" name="name_area"
                class="form-control" placeholder="">
            @error('name_area')
                <small id="helpId" class="text-muted">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Image Area</label>
            <div>
                <input type="file" name="upload_image">
                <img src="{{ url('public/uploads/area') }}/{{ $area->image_area }}" width="100" />
            </div>
        </div>
        <div class="form-group">
            <label for="">Slug Area</label>
            <input id="output_slug" value="{{ $area->slug_area }}" type="text" name="slug_area" readonly
                class="form-control">
            @error('slug_area')
                <small id="helpId" class="text-muted">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <div>
                <label>
                    <input type="radio" name="status" value="1" <?php echo $area->status == 1 ? 'checked': ''; ?>>
                    Public
                </label>
                <label>
                    <input type="radio" name="status" id="" value="0" <?php echo $area->status == 0 ? 'checked': ''; ?>>
                    Private
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="">Prioty</label>
            <input type="number" value="{{ $area->prioty }}" class="form-control" name="prioty" id="">
            @error('prioty')
                <small id="helpId" class="text-muted">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Data</button>
    </form>
@endsection
@section('js')
    <script src="{{ url('public/siteadmin') }}/dist/js/slug.js"></script>
@endsection
