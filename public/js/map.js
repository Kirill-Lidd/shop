
       function init(){
           var myMap = new ymaps.Map("map", {
               center: [55.820861821398886,37.88307113105622],
               zoom: 16
           });

           let placemark = new ymaps.Placemark([55.820861821398886,37.88307113105622],{},{

           });

           myMap.geoObjects.add(placemark);
       }
       ymaps.ready(init);
