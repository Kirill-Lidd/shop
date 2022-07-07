<form action="{{ route('create_category') }}" method="post">
	@csrf
	<lable>Название категории</lable>
	<p></p>
	<input type="text" name="name">
	<p></p>
	<button type="submit">Создать категорию</button>
</form>