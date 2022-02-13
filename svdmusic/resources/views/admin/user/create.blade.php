@extends('layouts.admin')
@section('title', 'Add User')
@section('main')

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="form-group">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="name" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    @error('name')
                        <small id="helpId" class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email" id="" class="form-control" placeholder=""
                      aria-describedby="helpId">
                  @error('email')
                      <small id="helpId" class="text-muted">{{ $message }}</small>
                  @enderror
              </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="password" id="" class="form-control" placeholder=""
                      aria-describedby="helpId">
                  @error('password')
                      <small id="helpId" class="text-muted">{{ $message }}</small>
                  @enderror
              </div>
              <div class="form-group">
                <label for="">Repeat Password</label>
                <input type="password" name="confirm_password" id="" class="form-control" placeholder=""
                    aria-describedby="helpId">
                @error('confirm_password')
                    <small id="helpId" class="text-muted">{{ $message }}</small>
                @enderror
            </div>
                <div class="form-group">
                    <label for="">Image user</label>
                    <div>
                        <input type="file" name="upload_image">
                    </div>
                    @error('upload_image')
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
                            <input type="radio" name="status"  value="0" >
                            Private
                          </label>
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </div>

        </div>
    </form>

@endsection
