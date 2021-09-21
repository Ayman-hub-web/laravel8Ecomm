@extends('frontend.layouts.master')
@section('content')
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> ELECTRONICS [230]</a>
				<ul>
				<li><a class="active" href="products.html"><i class="icon-chevron-right"></i>Cameras (100) </a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Computers, Tablets & laptop (30)</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Mobile Phone (80)</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Sound & Vision (15)</a></li>
				</ul>
			</li>
			<li class="subMenu"><a> CLOTHES [840] </a>
			<ul style="display:none">
				<li><a href="products.html"><i class="icon-chevron-right"></i>Women's Clothing (45)</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Women's Shoes (8)</a></li>												
				<li><a href="products.html"><i class="icon-chevron-right"></i>Women's Hand Bags (5)</a></li>	
				<li><a href="products.html"><i class="icon-chevron-right"></i>Men's Clothings  (45)</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Men's Shoes (6)</a></li>												
				<li><a href="products.html"><i class="icon-chevron-right"></i>Kids Clothing (5)</a></li>												
				<li><a href="products.html"><i class="icon-chevron-right"></i>Kids Shoes (3)</a></li>												
			</ul>
			</li>
			<li class="subMenu"><a>FOOD AND BEVERAGES [1000]</a>
				<ul style="display:none">
				<li><a href="products.html"><i class="icon-chevron-right"></i>Angoves  (35)</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Bouchard Aine & Fils (8)</a></li>												
				<li><a href="products.html"><i class="icon-chevron-right"></i>French Rabbit (5)</a></li>	
				<li><a href="products.html"><i class="icon-chevron-right"></i>Louis Bernard  (45)</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>BIB Wine (Bag in Box) (8)</a></li>												
				<li><a href="products.html"><i class="icon-chevron-right"></i>Other Liquors & Wine (5)</a></li>												
				<li><a href="products.html"><i class="icon-chevron-right"></i>Garden (3)</a></li>												
				<li><a href="products.html"><i class="icon-chevron-right"></i>Khao Shong (11)</a></li>												
			</ul>
			</li>
			<li><a href="products.html">HEALTH & BEAUTY [18]</a></li>
			<li><a href="products.html">SPORTS & LEISURE [58]</a></li>
			<li><a href="products.html">BOOKS & ENTERTAINMENTS [14]</a></li>
		</ul>
		<br/>
		  <div class="thumbnail">
			<img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	@if($cart_items->count() > 0)
	<h3>  SHOPPING CART [ <small>{{$cart_items->count()}} Item(s) </small>]<a href="{{route('home')}}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>		

	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>name</th>
                  <th>Quantity/Update</th>
				  <th>Select</th>
				  <th>Price</th>
				</tr>
              </thead>
              <tbody>
				  <?php $total_price = 0; ?>
				  @foreach($cart_items as $cart_item)
				  <?php $total_price += $cart_item->product->price; ?>
                <tr>
                  <td> <img width="60" src="{{asset('images/products/'.$cart_item->product->image)}}" alt=""/></td>
                  <td>{{$cart_item->product->name}}<br/>Color : black, Material : metal</td>
				  <td>
					<div class="input-append"><input class="span1" value="{{$cart_item->qty}}" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-danger btn_close" type="button" data-id="{{$cart_item->id}}"><i class="icon-remove icon-white"></i></button>				</div>
				</td>
				  <td><input  type="checkbox" name="select_product[]" cart-id="{{$cart_item->id}}"></td>
                  <td>${{$cart_item->product->price}}</td>
                </tr>
				@endforeach
                <tr>
                  <td colspan="6" style="text-align:right">Total Price:	</td>
                  <td> ${{$total_price}}</td>
                </tr>
				 <tr>
                  <td colspan="6" style="text-align:right"><button type="button" class="btn btn-danger bay_product">Buy</button></td>
                </tr>
				</tbody>
            </table>

	@else 
	<p style="color:red;">No items in Cart</p>
	@endif 

		
            <!-- <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-horizontal">
				<div class="control-group">
				<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
				<div class="controls">
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="btn"> ADD </button>
				</div>
				</div>
				</form>
				</td>
                </tr>
				
			</tbody>
			</table> -->
			
			<!-- <table class="table table-bordered">
			 <tr><th>ESTIMATE YOUR SHIPPING </th></tr>
			 <tr> 
			 <td>
				<form class="form-horizontal">
				  <div class="control-group">
					<label class="control-label" for="inputCountry">Country </label>
					<div class="controls">
					  <input type="text" id="inputCountry" placeholder="Country">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="inputPost">Post Code/ Zipcode </label>
					<div class="controls">
					  <input type="text" id="inputPost" placeholder="Postcode">
					</div>
				  </div>
				  <div class="control-group">
					<div class="controls">
					  <button type="submit" class="btn">ESTIMATE </button>
					</div>
				  </div>
				</form>				  
			  </td>
			  </tr>
            </table>		 -->
	<a href="{{route('home')}}" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="login.html" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	<div id="data"></div> 
</div>
</div></div>
</div>
@endsection

@push('footer-script')
<script type="text/javascript">
		$('.btn_close').on('click', function(){
			var id = $(this).data('id');
			if(confirm('You want delete this item?')){
				$.ajax({
					url: "{{route('cart.delete')}}",
					data: {
						'id': id
					},
					success: function(data){

						 location.reload();
					}
				});
			}
		});

		//Buy
		$('.bay_product').on('click', function(){
			var cart_id = [];
			jQuery('input[name="select_product[]"]:checkbox:checked').each(function(i){
				cart_id[i] = $(this).attr('cart-id');
			});
			if(cart_id.length == 0){
				alert('Please select atleast one Product.');
			}else{
				$.ajax({
					type: 'post',
					url:'{{route("productBooking.store")}}',
					data:{
						'cart_id': cart_id,
						_token: '{{csrf_token()}}'
					},
					success:function(data){
						//$('#data').html(data);
						//location.reload();
						window.location = 'stripe';
					}
				});
			}

		});
		
	</script>
@endpush