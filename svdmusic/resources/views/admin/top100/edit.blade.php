@extends('layouts.admin')
@section('title', 'Edit Top100')
@section('main')

    <form action="{{ route('top100.update', $top100->id) }}" role="form" enctype="multipart/form-data" method="POST">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="{{ $top100->id }}" />
                <div class="form-group">
                    <label for="">Name Top100</label>
                    <input type="text" value="{{ $top100->name_top100 }}" name="name_top100" class="form-control"
                        placeholder="">
                    @error('name_top100')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Image Top100</label>
                    <div>
                        <input type="file" name="upload_image">
                        <img onerror="this.src='{{url('public/uploads/top100/top100_default.jpg')}}'" src="{{ url('public/uploads/top100') }}/{{ $top100->image_top100 }}" width="50" />
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Status</label>
                    <div>
                        <label>
                            <input type="radio" name="status" value="1" <?php echo $top100->status == 1 ? 'checked' : ''; ?>>
                            Public
                        </label>
                        <label>
                            <input type="radio" name="status" id="" value="0" <?php echo $top100->status == 0 ? 'checked' : ''; ?>>
                            Private
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Prioty</label>
                    <input type="number" value="{{ $top100->prioty }}" class="form-control" name="prioty" id="">
                    @error('prioty')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save Data</button>
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
