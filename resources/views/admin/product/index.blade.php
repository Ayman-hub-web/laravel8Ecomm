@extends('admin.layouts.testdashboard')
@section('product_active', 'blue')
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
              <a href="{{route('product.create')}}" class="btn btn-success">Add New Product</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Products</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product Name</th>
                          <th>Category</th>
                          <th>Price</th>
                          <th>Add Details</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                        <tr>
                          <th scope="row">{{$product->id}}</th>
                          <td>{{$product->name}}</td>
                          <td>{{$product->category->name}}</td>
                          <td>{{$product->price}}</td>
                          <td>´<button><a href="{{route('product.extraDetails', $product->id)}}">Add Details</a></button></td>
                          <td><img src="{{asset('images/products/'.$product->image)}}" alt="{{$product->image}}" width="30"></td>
                          <td style="display:flex"><a href="{{route('product.edit', $product->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('product.destroy', $product->id)}}" method="post">
                              @csrf 
                              @method('delete')
                              <input type="hidden" value="{{$product->id}}" name="cat_id">
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