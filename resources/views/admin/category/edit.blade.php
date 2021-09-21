@extends('admin.layouts.testdashboard')
@section('category_active', 'blue')
@section('content')
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
              <a href="{{route('category.index')}}" class="btn btn-primary">All Categories</a>
              <a href="{{route('category.create')}}" class="btn btn-success">Add Category</a>
                <div class="x_panel">
                  <div class="title_left">
                    <h3>Edit Category</h3>
                    </div>
                  <div class="x_content">
                    <br />
                    <form action="{{route('category.update', $category->id)}}" class="form-horizontal form-label-left" method="post">
                    @csrf 
                    @method('put')
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" value="{{$category->name}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Parent Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="sub Category" name="category_id" class="form-control">
                            @foreach($categories as $cat)
                                @if($cat->id == $category->category_id)
                                <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                @else 
                                <option value="">Without Category</option>
                                @endif
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Update">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
@endsection