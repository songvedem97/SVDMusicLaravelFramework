@extends('layouts.admin')
@section('title','Index Banner')
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
                <th>Name</th>
                <th>Image Banner</th>
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
                    <td>{{ $item->name_banner }}</td>
                    <td><img src="{{url('public/uploads/banner')}}/{{$item->image_banner}}" width="150" /></td>
                    <td>
                        @if ($item->status == 0)
                            <span class="badge badge-danger">Private</span>
                        @else
                            <span class="badge badge-success">Public</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                    <td class="text-right">
                        
                            <a href="{{route('banner.edit',$item->id)}}" class="btn btn-edit">
                                <i class="fas fa-edit "></i>
                            </a>
                            <a href="{{route('banner.destroy',$item->id)}}" class="btn  btn-delete">
                                <i class="fas fa-trash-alt"></i>
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
            if(confirm('B???n c?? ch???c ch???n mu???n x??a kh??ng?')){
                $('form#form-delete ').submit();
            }
        })
    </script>    
@endsection
