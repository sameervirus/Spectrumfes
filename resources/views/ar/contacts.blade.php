@extends('layouts.arabic')

@section('title', 'الاتصال بنا')

@section('content')
<div class="contact page">
    <div class="contact-header">
        <div class="text-contact">
            <span>ابق على تواصل معنا.</span>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 pull-right-desktop">
                <div class="row">
                    <div class="col-md-6">
                        <h4>الايميل</h4>
                        <p>{{ $contacts['email'] }}</p>
                    </div>
                    <div class="col-md-6">
                        <h4>الاتصال</h4>
                        <address>{{ $contacts['office_address'] }}</address>
                        <p>{{ $contacts['office_tel'] }}</p>
                        <p>{{ $contacts['office_mob'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pull-right-desktop">
                @if (Session::has('feedback'))
                    @if (Session::get('feedback') == 'sucsses')
                        <div class="alert alert-success alert-dismissible show" role="alert">
                          <strong>تم استلام رسالتك، وسوف نقوم بالرد عليك قريبا</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    @else
                        <div class="alert alert-warning alert-dismissible show" role="alert">
                          <strong>عفوا. حدث خطأ. حاول مرة اخرى!</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    @endif
                @else
                <form method="post" action="{{route('contacts')}}">
                    {{ csrf_field() }}
                    @honeypot
                    <div class="form-group">
                        <div class="col-sm-6">
                          <input type="text" name="name" class="form-control" placeholder="الاسم">
                        </div>
                        <div class="col-sm-6">
                          <input type="email" name="email" class="form-control" placeholder="الايميل">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea name="user_message" class="form-control" rows="4" placeholder="الرسالة"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="button-submit">ارسل</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
    <div id="map">
    </div>
</div>
@endsection

@section('jsFiles')

    <script>
      function initMap() {
        var chicago = new google.maps.LatLng(29.990070, 31.280541);

        var map = new google.maps.Map(document.getElementById('map'), {
          center: chicago,
          zoom: 16
        });

        var coordInfoWindow = new google.maps.InfoWindow();
        coordInfoWindow.setContent(createInfoWindowContent(chicago, map.getZoom()));
        coordInfoWindow.setPosition(chicago);
        coordInfoWindow.open(map);

        map.addListener('zoom_changed', function() {
          coordInfoWindow.setContent(createInfoWindowContent(chicago, map.getZoom()));
          coordInfoWindow.open(map);
        });
      }

      var TILE_SIZE = 256;

      function createInfoWindowContent(latLng, zoom) {
        var scale = 1 << zoom;

        var worldCoordinate = project(latLng);

        var pixelCoordinate = new google.maps.Point(
            Math.floor(worldCoordinate.x * scale),
            Math.floor(worldCoordinate.y * scale));

        var tileCoordinate = new google.maps.Point(
            Math.floor(worldCoordinate.x * scale / TILE_SIZE),
            Math.floor(worldCoordinate.y * scale / TILE_SIZE));

        return [
          "{{ $contacts['title'] }}",
          "{{ $contacts['office_address'] }}"          
        ].join('<br>');
      }

      // The mapping between latitude, longitude and pixels is defined by the web
      // mercator projection.
      function project(latLng) {
        var siny = Math.sin(latLng.lat() * Math.PI / 180);

        // Truncating to 0.9999 effectively limits latitude to 89.189. This is
        // about a third of a tile past the edge of the world tile.
        siny = Math.min(Math.max(siny, -0.9999), 0.9999);

        return new google.maps.Point(
            TILE_SIZE * (0.5 + latLng.lng() / 360),
            TILE_SIZE * (0.5 - Math.log((1 + siny) / (1 - siny)) / (4 * Math.PI)));
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC90ihkzvn2Z1Y_Qq89QSGgOh5SO3PkSr0&callback=initMap">
    </script>


@endsection