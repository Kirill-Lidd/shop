@extends('layout')


@section('content')
<div class="content">
<form action="{{ route('confirm_order') }}" method="post">
@csrf
<div class="order_product">	
	 <h1>Товар</h1>
	 <table class="table">
	 	<thead>
	 		<tr>
	 			<th>Наименование</th>
	 			<th>Цена</th>
	 		</tr>
	 	</thead>
	 	@foreach($products as $product => $value)
			 
	 	<tbody>
	 		<tr>
	 			<td>{{$value->name}}</td>
	 			<td>{{$value->price}}</td>
	 		</tr>
	 	</tbody>
			 <input type="text" name="id[]" hidden  value="{{ $value->id}}">
	 	@endforeach
	 </table>
	 
</div>
<div class="client_info">
	 <h1>Данные</h1>
	 <div class="client_info_input">
		 	
		 <input type="text" name="name" placeholder="Имя">
	 </div>
	 <div class="client_info_inputs">
	 	
		 <input type="phone" name="phone" placeholder="Телефон">
		 <input type="email" name="email" placeholder="E-mail (необязательно)">
	 </div>
</div>
 <div class="mhetods">
 	
 <h1>Способ получения</h1>
 <div class="tabs-order">
 <input type="radio" name="mhetod_obtaining" id="pickup" value="Самовывоз" checked>
 <label for="pickup">Самовывоз</label>
 <input type="radio" name="mhetod_obtaining" id="delivery" value="Доставка">
 <label for="delivery">Доставка</label>
 	<div class = "pickup-content" id="pickup-section">
 		
	  	<div class="maps">
	  		 		<div class="map_info">
	  				  	<h3>ТЕХНОМИР</h3>
	  				  	<p>г.Балашиха, мкр Янтарный, д.10</p>
	  				  	<p>Пн-Вс с 10:00 до 22:00</p>
	  		 		</div>
	  	 <div id="map" class="map"></div>
	  	<input type="text" name="address_shop" hidden value="г.Балашиха, мкр Янтарный, д.10">
	  	</div>
	</div>
	 <div class = "delivery-content" id="delivety-section">
	 	<input type="text" name="address" placeholder="Город,улица,номер дома, номер подъезда, этаж, номер квартиры">
	 </div>

 </div>
 
 </div>
 <div class="payments">
 	
	 <h1>Способ Оплаты</h1>
	 <input type="radio" name="mhetod_payment" id="cash" value="При получении" checked>
	 <label for="cash">При получении</label>
	 <input type="radio" name="mhetod_payment" id="online" value="Онлайн">
	 <label for="online">Онлайн</label>
 </div>
	 <button class="order_btn" type="submit">Подтвердить заказ</button>
</form>
</div>
@endsection

