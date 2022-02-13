@extends('layouts.admin')
@section('title','Index Song')
@section('main')
    <form class="form-inline">
        <div class="form-group">
            <label for=""></label>
            <input type="text" name="key" id="" class="form-control" placeholder="Search here" aria-describedby="helpId">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <table class="table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name Song</th>
                <th>Category</th>
                <th>Artist</th>
                <th>Area</th>
                <th>Image Song</th>
                <th>Banner Song</th>
                <th>Status</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th class="text-right">Action</th>
                
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name_song }}</td>
                    <td>{{ $item->cate->name_category}} </td>
                    <td>{{ $item->artist->name_artist}} </td>
                    <td>{{ $item->area->name_area }}</td>
                    <td><img onerror="this.src='{{url('public/uploads/image_song/song_default.jpg')}}'" src="{{url('public/uploads/image_song')}}/{{$item->image_song}}" width="50"/></td>
                    <td><img onerror="this.src='{{url('public/uploads/banner_song/video_default.jpg')}}'"  src="{{url('public/uploads/banner_song')}}/{{$item->image_bannersong}}" width="100"/></td>
                    <td>
                        @if ($item->status == 0)
                            <span class="badge badge-danger">Private</span>
                        @else
                            <span class="badge badge-success">Public</span>
                        @endif
                    </td>
                    <td>@if ($item->created_at != null)
                        {{ $item->created_at->format('d-m-Y')}}
                    @endif</td>
                    <td>@if ($item->updated_at != null)
                        {{ $item->updated_at->format('d-m-Y')}}
                    @endif</td>

                    <td class="text-right">
                            <a href="{{route('song.edit',$item->id)}}" class="btn btn-success btn-edit">
                                <i class="fas fa-edit "></i>
                            </a>
                            <a href="{{route('song.destroy',$item->id)}}" class="btn btn-danger btn-delete">
                                <i class="fas fa-trash "></i>
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form method="POST" id="form-delete" action="">
        @csrf @method('DELETE')
    </form>
    <div class="">
        {{ $data->appends(request()->all())->links() }}
    </div>
@endsection

@section('js')
    <script>
        $('.btn-delete').click(function(ev){
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete ').attr('action',_href);
            if(confirm('Bạn có chắc chắn muốn xóa không?')){
                $('form#form-delete ').submit();
            }
        })
    </script>    
@endsection
