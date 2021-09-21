@extends('admin.layouts.testdashboard')
@section('category_active', 'blue')
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
              <a href="{{route('category.create')}}" class="btn btn-success">Add New Category</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Categories</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Category Name</th>
                          <th>Parent Category</th>
                          <th>Create Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                        <tr>
                          <th scope="row">{{$category->id}}</th>
                          <td>{{$category->name}}</td>
                          <td>@if($category->category_id)
                              {{$category->parent->name}}
                              @else 
                              No parent Category
                              @endif
                          </td>
                          <td>{{$category->created_at}}</td>
                          <td style="display:flex"><a href="{{route('category.edit', $category->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('category.destroy', $category->id)}}" method="post">
                              @csrf 
                              @method('delete')
                              <input type="hidden" value="{{$category->id}}" name="cat_id">
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