@extends('layout')


@section('content')
@inject('test', 'App\Http\Controllers\ProductController')
<style>
	
</style>
	<div class="content">

		<div class="cards desc-items">
			<img src="{{asset('/storage/' . $description->image) }}" class="desc-item-img" alt="">
			<div class="desc-item">
				<div class="desc-item-title">
					{{$description->name}}
				</div>
				@if($test->test($description->id) == 5)
				<div class="rating-result">
					<span class="active"></span>	
					<span class="active"></span>    
					<span class="active"></span>  
					<span class="active"></span>    
					<span class="active"></span>
				</div>
				@elseif($test->test($description->id) >= 4 and $test->test($description->id) < 5)
					<div class="rating-result">
						<span class="active"></span>	
						<span class="active"></span>    
						<span class="active"></span>  
						<span class="active"></span>    
						<span></span>
					</div>
					@elseif($test->test($description->id) >= 3 and $test->test($description->id) < 4)
					<div class="rating-result">
						<span class="active"></span>	
						<span class="active"></span>    
						<span class="active"></span>  
						<span ></span>    
						<span></span>
					</div>
					@elseif($test->test($description->id) >= 2 and $test->test($description->id) < 3)
					<div class="rating-result">
						<span class="active"></span>	
						<span class="active"></span>    
						<span ></span>  
						<span ></span>    
						<span></span>
					</div>
					@elseif($test->test($description->id) >= 1 and $test->test($description->id) < 2)
					<div class="rating-result">
						<span class="active"></span>	
						<span ></span>    
						<span ></span>  
						<span ></span>    
						<span></span>
					</div>
					@elseif($test->test($description->id) >= 0 )
					<div class="rating-result">
						<span></span>	
						<span ></span>    
						<span ></span>  
						<span ></span>    
						<span></span>
					</div>
				@endif
				<div class="cards desc-item-price ">
					
					<div class="desc-item-price-title">
						<p class="card-price">{{ $description->price }} ₽</p>
					</div>
					<div class="desc-item-price-btn">
						<a href="{{ route('add_to_favorite' , $description->id)}}"  class="card-buy-btn">Добавить в избраное</a>
						<a href="{{ route('add_to_cart' , $description->id)}}"  class="card-buy-btn">Купить</a>
					</div>
				</div>
			
			</div>
			
			
		</div>

		<div class="tabs">
			<input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
			<label for="tab-btn-1">Описание</label>
			<input type="radio" name="tab-btn" id="tab-btn-2" value="">
			<label for="tab-btn-2">Характеристики</label>
			<input type="radio" name="tab-btn" id="tab-btn-3" value="">
			<label for="tab-btn-3">Отзывы</label>
			<input type="radio" name="tab-btn" id="tab-btn-4" value="">
			<label for="tab-btn-4">Оставить отзыв</label>

			<div class = "tab-content" id="content-1">
			 <h2>Описание {{$description->name}}</h2><br>
			 	{{$description->description}}
			</div>

			<div class = "tab-content" id="content-2">
			 <h2>Характеристики {{$description->name}}</h2><br>
			 	<table>
			 	  <tbody>
			 	    <tr>
			 	      <td class="name"><span>Вес.............................................................................................</span></td>
			 	      <td class="cur">36 шт</td>
			 	    </tr>
			 	    <tr>
			 	      <td class="name"><span>Количество на поддоне............................................................</</span></td>
			 	      <td class="cur">48 шт</td>
			 	    </tr>
			 	    <tr>
			 	      <td class="name"><span>Прочность..................................................................................</</span></td>
			 	      <td class="cur">200 - 400 кг/см</td>
			 	    </tr>
			 	  </tbody>
			 	</table>
			</div>	

			<div class = "tab-content" id="content-3">
			 <h2>Отзывы {{$description->name}}</h2><br>
			 	@foreach($reviews as $review )
			 		
			 <div class="reviews">
			 		<div class="reviews_title">
			 			<h4>Оценка</h4>
			 			@if($review->rating == 5)
			 			<div class="rating-mini">
			 				<span class="active"></span>	
			 				<span class="active"></span>    
			 				<span class="active"></span>  
			 				<span class="active"></span>    
			 				<span class="active"></span>
			 			</div>
			 			@elseif($review->rating >= 4 and $review->rating < 5)
			 				<div class="rating-mini">
			 					<span class="active"></span>	
			 					<span class="active"></span>    
			 					<span class="active"></span>  
			 					<span class="active"></span>    
			 					<span></span>
			 				</div>
			 				@elseif($review->rating >= 3 and $review->rating < 4)
			 				<div class="rating-mini">
			 					<span class="active"></span>	
			 					<span class="active"></span>    
			 					<span class="active"></span>  
			 					<span ></span>    
			 					<span></span>
			 				</div>
			 				@elseif($review->rating >= 2 and $review->rating < 3)
			 				<div class="rating-mini">
			 					<span class="active"></span>	
			 					<span class="active"></span>    
			 					<span ></span>  
			 					<span ></span>    
			 					<span></span>
			 				</div>
			 				@elseif($review->rating >= 1 and $review->rating < 2)
			 				<div class="rating-mini">
			 					<span class="active"></span>	
			 					<span ></span>    
			 					<span ></span>  
			 					<span ></span>    
			 					<span></span>
			 				</div>
			 				@elseif($review->rating >= 0 )
			 				<div class="rating-mini">
			 					<span></span>	
			 					<span ></span>    
			 					<span ></span>  
			 					<span ></span>    
			 					<span></span>
			 				</div>
			 			@endif
			 		</div>
			 		@empty(!$review->dignites)
			 		<div class="reviews_title">
			 			<h4>Достоинства</h4>
			 			<p>{{$review->dignites}}</p>
			 		</div>
			 		@endif
			 		@empty(!$review->disadvantages)
			 		<div class="reviews_title">
			 			<h4>Недостатки</h4>
			 			<p>{{$review->disadvantages}}</p>
			 		</div>
			 		@endif
			 		@empty(!$review->coment)
			 		<div class="reviews_title">
			 			<h4>Комментарий</h4>
			 			<p>{{$review->coment}}</p>
			 		</div>
			 		@endif
			 		
			 </div>
			 	@endforeach
			 	@empty($review)
			 		<span>У данного товаров еще нет отзывов!</span>
			 	@endif
			 	
			</div>

			<div class = "tab-content" id="content-4">
			 <h2>Оставить отзыв</h2><br>
			 <form action="{{route('create_review',$description->id)}}" method="post">
			 	@csrf
				 <div class="rating-area">
				 	<input type="radio" id="star-5" name="rating" value="5">
				 	<label for="star-5" title="Оценка «5»"></label>	
				 	<input type="radio" id="star-4" name="rating" value="4">
				 	<label for="star-4" title="Оценка «4»"></label>    
				 	<input type="radio" id="star-3" name="rating" value="3">
				 	<label for="star-3" title="Оценка «3»"></label>  
				 	<input type="radio" id="star-2" name="rating" value="2">
				 	<label for="star-2" title="Оценка «2»"></label>    
				 	<input type="radio" id="star-1" name="rating" value="1">
				 	<label for="star-1" title="Оценка «1»"></label>
				 </div>
				 @if($errors->has('rating'))
				 <div style="padding: 6px; border-radius:10px; border: 1px solid red; display: inline-block;">@error('rating'){{$message}}@enderror</div>
				 @endif
				 <div class="rating-input">
					 <label for="">Достоинства</label>
					 <p><input  type="text" name="dignites" value="{{old('dignites')}}"></p>
					 <span class="text-danger">
					 <label for="">Недостатки</label>
					 <p><input  type="text" name="disadvantages" value="{{old('disadvantages')}}"></p>
					 <label for="">Комментарий</label>
					 <p><textarea  rows="10" cols="45" name="coment" value="{{old('coment')}}"></textarea></p>
				 </div>
				 <div>
					 <input style="border: 2px solid #f16c00;
					 			   background: white;
								   border-radius: 20px;
								   padding: 10px 30px;
								   margin-top:20px;" 
					 type="submit" value="Оставить отзыв">
				 </div>
				 	
			 </form>

			</div>

		</div>

	</div>	


@endsection