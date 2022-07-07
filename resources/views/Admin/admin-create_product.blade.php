<form action="{{ route('create_product') }}" method="post" enctype="multipart/form-data">
	@csrf
	<lable>Наименование товара</lable>
	<p></p>
	<input type="text" name="name">
	<p></p>
	<lable>Цена</lable>
	<p></p>
	<input type="text" name="price">
	<p></p>
	<lable>Описание товара</lable>
	<p></p>
	<input type="text" name="description">
	<p></p>
	<lable>Категория</lable>
	<p></p>
	<select name="category_slug">
		@foreach($category_list as $list)
	    <option selected value="{{$list->slug}}">{{$list->name}}</option>
	   	@endforeach
   </select>
	<p></p>
	<lable>Картинка</lable>
	<p></p>
	<input type="file" name="image">
	<p></p>
	<button type="submit">Добавить товар</button>
</form>