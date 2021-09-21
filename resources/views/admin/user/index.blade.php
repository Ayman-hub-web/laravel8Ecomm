@extends('admin.layouts.testdashboard')
@section('user_active', 'blue')
@section('content')
<div role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-md-12 col-md-12">
              <div>
                  @if (session()->has('message'))
                      <div class="alert alert-success">
                          {{ session('message') }}
                      </div>
                  @endif
              </div>
              <a href="{{route('user.create')}}" class="btn btn-success">Add New User</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Users</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <th scope="row">{{$user->id}}</th>
                          <td>{{$user->name}}</td>
                          <td>{{$user->role}}</td>
                          <td>{{$user->email}}</td>
                          <td style="display:flex"><a href="{{route('user.edit', $user->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('user.destroy', $user->id)}}" method="post">
                              @csrf 
                              @method('delete')
                              <input type="hidden" value="{{$user->id}}" name="cat_id">
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
</div>
@endsection