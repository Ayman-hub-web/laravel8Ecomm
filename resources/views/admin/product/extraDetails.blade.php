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
                    <h3>Add  Product Extra Details</h3>
                    </div>
                  <div class="x_content">
                    <br />
                    <form action="{{route('product.storeExtraDetails')}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="title" name="title" value="{{@$product->productDetail->title}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total items <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="total_items" name="total_items" value="{{@$product->productDetail->total_items}}" required="required" class="form-control col-md-7 col-xs-12">
                          <input type="hidden" name="product_id" value="{{$id}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea type="text" id="description" name="description" required="required" class="form-control col-md-7 col-xs-12">{{@$product->productDetail->description}}</textarea>
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