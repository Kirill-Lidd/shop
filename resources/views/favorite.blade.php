@extends('layout')


@section('content')
@inject('test', 'App\Http\Controllers\ProductController')

	@isset($favorites)
	<div class="content">
	
					
	@foreach($favorites as $favorite => $value)
		<div class="cards">
						<div class="card">
							<img src="{{asset('/storage/' . $value->image) }}" alt="" class="card-img">

							<div class="price-cont">
									<a href="{{ route('description',$value->id) }}" class="card-title">{{ $value->name }}</a><br>
									@if($test->test($value->id) == 5)
									<div class="rating-mini">
										<span class="active"></span>	
										<span class="active"></span>    
										<span class="active"></span>  
										<span class="active"></span>    
										<span class="active"></span>
									</div>
									@elseif($test->test($value->id) >= 4 and $test->test($value->id) < 5)
										<div class="rating-mini">
											<span class="active"></span>	
											<span class="active"></span>    
											<span class="active"></span>  
											<span class="active"></span>    
											<span></span>
										</div>
										@elseif($test->test($value->id) >= 3 and $test->test($value->id) < 4)
										<div class="rating-mini">
											<span class="active"></span>	
											<span class="active"></span>    
											<span class="active"></span>  
											<span ></span>    
											<span></span>
										</div>
										@elseif($test->test($value->id) >= 2 and $test->test($value->id) < 3)
										<div class="rating-mini">
											<span class="active"></span>	
											<span class="active"></span>    
											<span ></span>  
											<span ></span>    
											<span></span>
										</div>
										@elseif($test->test($value->id) >= 1 and $test->test($value->id) < 2)
										<div class="rating-mini">
											<span class="active"></span>	
											<span ></span>    
											<span ></span>  
											<span ></span>    
											<span></span>
										</div>
										@elseif($test->test($value->id) >= 0 )
										<div class="rating-mini">
											<span></span>	
											<span ></span>    
											<span ></span>  
											<span ></span>    
											<span></span>
										</div>
									@endif
									<p><a href="{{ route('description',$value->id) }}" class="card-description">{{$value->description}}</a></p>
							</div>
							<div class="cont">
								<div class="price-cont">
									<p class="card-price"></b>{{$value->price}} ₽</p>
								</div>
								<div class="buy-cont">
									<a href="{{ route('add_to_cart' , $value->id)}}"  class="card-buy-btn">Добавить в корзину</a>
								</div><br><br>
								<div class="favorite">
									<a href="{{ route('delete_favorite' , $value->id)}}"  class="card-buy-btn">Удалить</a>
								</div>
						
							</div>
						</div>
					
		</div>
	@endforeach	
	</div>
	@else			
	<div class="content">
		<div class="cards">
			<h3>Вы еще не добавили ни одного товара в избраное</h3>
		</div>
	</div>
	
	@endisset



@endsection