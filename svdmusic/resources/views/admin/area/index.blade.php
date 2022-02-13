@extends('layouts.admin')
@section('title','Index Area')
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
                <th>Name Area</th>
                <th>Image Area</th>
                <th>Tottal Song</th>
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
                    <td>{{ $item->name_area }}</td>
                    <td><img src="{{url('public/uploads/area')}}/{{$item->image_area}}" width="100" /></td>
                    <td>{{ $item->songs ? $item->songs->count() : 0 }}</td>
                    <td>
                        @if ($item->status == 0)
                            <span class="badge badge-danger">Private</span>
                        @else
                            <span class="badge badge-success">Public</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at->format('d-m-yy') }}</td>
                    <td>{{ $item->updated_at->format('d-m-yy') }}</td>
                    <td class="text-right">
                        
                            <a href="{{route('area.edit',$item->id)}}" class="btn btn-edit btn-success">
                                <i class="fas fa-edit "></i>
                            </a>
                            <a href="{{route('area.destroy',$item->id)}}" class="btn btn-danger btn-delete">
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
