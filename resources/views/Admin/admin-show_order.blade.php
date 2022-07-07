@if(count($orders) > 0)
@foreach($orders as $key => $value)
<div>
	Номер заказа:{{$value->id}} <br>
	Имя:{{$value->name}}<br>
	Номер телефона:{{$value->phone}}<br>
	Email:{{$value->email}}<br>
	Способ получения:{{$value->mhetod_obtaining}}<br>
	@if($value->mhetod_obtaining == 'Доставка')
	Aдрес:{{$value->address}}<br>
	@else
	Пункт выдачи:{{$value->address_shop}}<br>
	@endif
	Оплата:{{$value->mhetod_payment}}<br>
	Товар:<br>
			<table>
				<colgroup>
				  <col span="2" style="background:Khaki"><!-- С помощью этой конструкции задаем цвет фона для первых двух столбцов таблицы-->
				  <col style="background-color:#32cd32"><!-- Задаем цвет фона для следующего (одного) столбца таблицы-->
				</colgroup>
				<tr>
				  <th>Код товара</th>
				  <th>Наименование</th>
				  <th>Цена, руб.</th>
				</tr>
		@foreach($order_product as $op)

		@if($value->id == $op->order_id )
		@foreach($products as $product)
		@if($op->product_id == $product->id)
			  
			  <tr>
			    <td>{{$product->id}} </td>
			    <td>{{$product->name}}</td>
			    <td>{{$product->price}}</td>
			  </tr>		 
		@endif
		@endforeach	
		@endif	
		@endforeach
			</table>
	<br>
</div><br>
@endforeach
@else
Заказов нет!
@endif