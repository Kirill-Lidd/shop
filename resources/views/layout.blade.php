
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ТЕХНОМИР</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/apps.css') }}">
	<link rel="icon" href="/image/logo.svg" type="image/x-icon">
	<script src="https://api-maps.yandex.ru/2.1/?apikey=217645b0-e948-44ac-92fe-62567245e5af&lang=ru_RU" type="text/javascript"></script>

</head>
<body>

		<div id="backgr">

		</div>
		<!--HEADER START-->
		<header>
			<div class="top-header">
				<div class="wrapper">
					<ul class="top-header-number">
						<li class="number"><a href="#" class=""><b>+7 (999) 999-99-99</b>&nbsp(c 8:00 до 22:00)</a></li>
					</ul>
					<ul class="top-header-autori">
							@if(session()->has('loginId'))
							<span>Здравствуйте,{{session('loginName')}}</span>
							<li class="login"><a  href="{{route('logout')}}"><b>Выйти</b></a></li>
							
							@else
							<li class="reg"><a  href="#" id="reg"><b>Зарегистрироваться</b></a></li>
							<li class="login"><a  href="#" id="login"><b>Войти</b></a></li>
						
							@endif
						
					</ul>



				</div>
			</div>

			<div class="main-header">
				<div class="wrapper">
					<div class="nav_conteiner">
						<div class="logo-conteiner"><a  class="logo" href="{{route('index')}}"><img src="/image/logo.svg" alt="" class=""></a></div>

					<form  action="{{route('search')}}" method="get" class="presearch" data-role="presearch-form">
						<div class="ui-input-search ui-input-search_presearch">
							<input class="ui-input-search__input " name="text" value="" type="search" placeholder="Поиск по сайту" autocomplete="off">
						</div>
					</form>

					<ul class="main-header-nav">
						<li class="nav"><img src="/image/izbr.png" alt="" class="izbr-img"><a href="{{ route('favorite_index')}}">Избранное</a></li>
						<li class="nav"><img src="/image/cart.png" alt="" class="cart-img"><a href="{{ route('cart')}}">Корзина@if(count(session('products')) > 0)({{count(session('products'))}})@endif</a></li>

					</ul>
					</div>
				</div>
			</div>

		</header>

			<div id="reg-window">
				<img src="/image/close.svg" alt="" id="close-reg">
				<div class="reg-title">
					Регистрация
				</div>
				<form action="{{ route('register') }}" class="reg-form" method="post">
					@csrf
					<input type="text" name="name" placeholder="Имя" class="reg-input" autocomplete="off" value="{{old('name')}}">
					<p>
					<span class="text-danger">@error('name'){{$message}}@enderror</span>
					<input type="text" name="last_name" placeholder="Фамилия" class="reg-input" autocomplete="off" value="{{old('last_name')}}">
					<p>
					<span class="text-danger">@error('last_name'){{$message}}@enderror</span>
					<input type="email" name="email" placeholder="Email" class="reg-input" autocomplete="off" value="{{old('email')}}">
					<p>
					<span class="text-danger">@error('email'){{$message}}@enderror</span>

					<input type="password" name="password" placeholder="Пароль" class="reg-input" autocomplete="off" >
					<p>
					<span class="text-danger">@error('password'){{$message}}@enderror</span>
					<input type="password" name="password2" placeholder="Подтвредите пароль" class="reg-input" autocomplete="off">
					<p>
					<span class="text-danger">@error('password2'){{$message}}@enderror</span>

					<br>
					<button type="submit" name="do_signup" class="reg-btn">Зарегистрироваться</button>
					<!-- <div class="polit">Нажимая кнопку "Зарегистрирвоаться", Вы соглашаетесь
	c условиями политики конфиденциальности</div> -->
				</form>
			</div>


			<div id="log-window">
				<img src="/image/close.svg" alt="" id="close-log">
				<div class="log-title">
					Войти
				</div>
				<form action="{{ route('login') }}" class="log-form" method="post">
					@csrf
					<input type="text" name="email" placeholder="Email" class="log-input" value="{{old('email')}}">
					<p>
					<span class="text-danger">@error('email'){{$message}}@enderror</span>
					<input type="password" name="password" placeholder="Пароль" class="log-input">
					<p>
					<span class="text-danger">@error('password'){{$message}}@enderror</span>
					<br>
					<button type="submit" name="do_login" class="log-btn">Войти</button>
				</form>
			</div>
		<!--HEADER END-->

		<div class="wrapper">
			
			@if(Session::has('success'))
			<div class="alert">{{ Session::get('success') }}</div>
			@endif
			@if(Session::has('fail'))
			<div>{{ Session::get('fail') }}</div>
			@endif
		</div>

		<div class="main-container">
			<div class="wrapper">

				<div class="main-nav-conteiner">

						<ul class="main-navs">
						
							@foreach($categories as $category)
								
								<li class="main-nav"><a href="{{ route('showProduct' , $category->slug)}}" class="">{{ $category->name }}</a></li>
							@endforeach
						</ul>

				</div>


				@yield('content')


			</div>
		</div>


		<!--FOOTER START-->
		<div class="footer-container">
			<div class="wrapper">
				<a href="/" class=""><img src="/image/logo.svg" alt="" class="footer-logo"></a>

				<div class="main-footer-items">

					<div class="footer-comp"></div>
					<div class="line"></div>

				</div>
				<div class="footer-name-items-container">
					<ul class="footer-name-items">
						<li class="footer-name-item-title">Компания</li>
						<li class="footer-name-item"><a href="">Вакансии</a></li>
						<li class="footer-name-item"><a href="">Новости</a></li>
						<li class="footer-name-item"><a href="">Партнерам</a></li>
						<li class="footer-name-item"><a href="">Правила продаж</a></li>
					</ul>
					<ul class="footer-name-items">
						<li class="footer-name-item-title"><a href="">Покупателям</a></li>
						<li class="footer-name-item"><a href="">Бонусная программа</a></li>
						<li class="footer-name-item"><a href="">Подарочные карты</a></li>
						<li class="footer-name-item"><a href="">Доставка</a></li>
						<li class="footer-name-item"><a href="">Кредиты</a></li>
					</ul>
					<ul class="footer-name-items">
						<li class="footer-name-item-title">Помощь</li>
						<li class="footer-name-item"><a href="">Способы оплаты</a></li>
						<li class="footer-name-item"><a href="">Как оформить заказ</a></li>
						<li class="footer-name-item"><a href="">Обмен,возврат,гарантия</a></li>
						<li class="footer-name-item"><a href="">Статусы заказов</a></li>
					</ul>
					<ul class="footer-name-items-icons">
						<div class="footer-name-item-title">Социальные сети</div>
						<li class="footer-name-item-icon"><a href=""><img src="/image/soc/vk.png" alt="" class="soc-icon"></a></li>
						<li class="footer-name-item-icon"><a href=""><img src="/image/soc/inst.png" alt="" class="soc-icon"></a></li>
						<li class="footer-name-item-icon"><a href=""><img src="/image/soc/fb.png" alt="" class="soc-icon"></a></li>
						<li class="footer-name-item-icon"><a href=""><img src="/image/soc/yt.png" alt="" class="soc-icon"></a></li>
					</ul>
				</div>

			</div>
		</div>
	<!--FOOTER END-->


		<script src="/js/regshow.js"></script>
		<script src="/js/logshow.js"></script>
		<script src="/js/carusel.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="/js/slick.min.js"></script>
		<script src="/js/slickw.js"></script>
		<script src="/js/map.js"></script>
		


		    

</body>
</html>