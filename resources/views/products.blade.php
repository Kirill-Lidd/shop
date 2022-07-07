@extends('layout')


@section('content')
@if(count($products))
@inject('test', 'App\Http\Controllers\ProductController')
	<div class="content">
						@foreach($products as $product)
		<div class="cards">
						<div class="card">
							<img src="{{asset('/storage/' . $product->image) }}" alt="" class="card-img">
							<div class="price-cont">
									<a href="{{ route('description',$product->id) }}" class="card-title">{{ $product->name }}</a><br>
										
										@if($test->test($product->id) == 5)
										<div class="rating-mini">
											<span class="active"></span>	
											<span class="active"></span>    
											<span class="active"></span>  
											<span class="active"></span>    
											<span class="active"></span>
										</div>
										@elseif($test->test($product->id) >= 4 and $test->test($product->id) < 5)
											<div class="rating-mini">
												<span class="active"></span>	
												<span class="active"></span>    
												<span class="active"></span>  
												<span class="active"></span>    
												<span></span>
											</div>
											@elseif($test->test($product->id) >= 3 and $test->test($product->id) < 4)
											<div class="rating-mini">
												<span class="active"></span>	
												<span class="active"></span>    
												<span class="active"></span>  
												<span ></span>    
												<span></span>
											</div>
											@elseif($test->test($product->id) >= 2 and $test->test($product->id) < 3)
											<div class="rating-mini">
												<span class="active"></span>	
												<span class="active"></span>    
												<span ></span>  
												<span ></span>    
												<span></span>
											</div>
											@elseif($test->test($product->id) >= 1 and $test->test($product->id) < 2)
											<div class="rating-mini">
												<span class="active"></span>	
												<span ></span>    
												<span ></span>  
												<span ></span>    
												<span></span>
											</div>
											@elseif($test->test($product->id) >= 0 )
											<div class="rating-mini">
												<span></span>	
												<span ></span>    
												<span ></span>  
												<span ></span>    
												<span></span>
											</div>
										@endif
									<div class="card-description">
										<p><a href="{{ route('description',$product->id) }}" class=" ">{{$product->description}}</a></p>
									</div>
							</div>
							<div class="cont">
								<div class="price-cont">
									<p class="card-price">{{ $product->price }} ₽</b></p><br>
								</div>
								<div class="favorite">
									
									<a href="{{ route('add_to_favorite' , $product->id)}}"  class="card-buy-btn">Добавить в избраное</a>
					
								</div><br>
								<div class="buy-cont">
									<a href="{{ route('add_to_cart' , $product->id)}}"  class="card-buy-btn">Купить</a>
								</div>

							</div>
						</div>
		</div>
						@endforeach
						{{$products->links('vendor/pagination/default')}}
	</div>
@else
							
	<div class="content">
		<div class="cards">
			<h2>По вашему запросу ничего не найдено</h2>
		</div>
	</div>
	

@endif

@endsection