@extends('layout')

@section('content')
<main>

            <div class="index-content">
                <div class="banner">
                    <div id="polosa">
                        <img src="/image/skidki.jpg" alt="" class="slides-img">
                        <img src="/image/sale2.jpg" alt="" class="slides-img">


                    </div>
                </div>

                    <button id="slider-left" class=" btn-s">&#10094</button>
                    <button id="slider-right" class=" btn-s">&#10095</button>

                <div class="sale">
                    <p class="sale-title"><b>Акции</b></p>
                    <div class="sale-text">
                        <a href="" class="">Товары со скидкой</a>
                        <br>
                        <a href="" class="">Выгодные комплекты</a>
                    </div>
                </div>

                 <div class="banner2 ">
                    <h3>Актуальные предложения</h3>
                      <div class ="cards-slider ">
                        @foreach($actual as $a)
                            <div class="card_product-slider">
                                <a href="{{route('description',$a->id)}}">
                                <img src="{{asset('/storage/' . $a->image) }}" alt="">
                                <p class="banner_product_name">{{ $a->name }}</p>
                                <p><strong>{{ $a->price }} ₽</strong></p>
                                </a>

                            </div>
                        @endforeach    
                    </div>
                </div>

                
            </div>

                
                        
</main>

  
@endsection