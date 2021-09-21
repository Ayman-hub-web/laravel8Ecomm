@extends('admin.layouts.testdashboard')
@section('product_active', 'blue')
@section('content')
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
              <div>
                  @if (session()->has('message'))
                      <div class="alert alert-success">
                          {{ session('message') }}
                      </div>
                  @endif
              </div>
              <a href="{{route('product.index')}}" class="btn btn-success">All Products</a>
                <div class="x_panel">
                  <div class="title_left">
                    <h3>Add Product</h3>
                    </div>
                  <div class="x_content">
                    <br />
                    <form action="{{route('product.store')}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="image" name="image" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="sub Category" name="category_id" class="form-control">
                            <option value="">Choose..</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
@endsection