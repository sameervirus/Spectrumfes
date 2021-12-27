@extends('layouts.arabic')

@section( 'title', $item->model_ar )

@section('cssFiles')

    <!-- easyzoom -->
    <link href="{{asset('vendors/i-like-robots-EasyZoom-5aebb28/css/easyzoom.css')}}" rel="stylesheet">

@endsection

@section('content')
<div class="item page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home-ar' )}}">الرئيسية</a> / 
                <a href="{{ route('products-ar', $product )}}">{{$product_ar->name}}</a> / 
                <a href="{{ route('category-ar', ['product' => $product, 'category' => $category ] )}}">{{$item->category_ar}}</a> / {{$item->model_ar}} </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="easyzoom easyzoom--overlay">
                    @if (Illuminate\Support\Str::endsWith($item->model, '.'))
                    <a href="{{url('images/'.$product.'/'. str_replace('.','',$item->model) .'/large_'.$item->model.'.jpg' )}}">
                        <img src="{{asset('images/'.$product.'/'. str_replace('.','',$item->model) .'/small_'.$item->model.'.jpg' )}}" alt="" />
                    </a>
                    @else
                    <a href="{{url('images/'.$product.'/'. $item->model .'/large_'.$item->model.'.jpg' )}}">
                        <img src="{{asset('images/'.$product.'/'. $item->model .'/small_'.$item->model.'.jpg' )}}" alt="" />
                    </a>
                    @endif
                </div>
                <ul class="thumbnails">
                  @foreach($images as $image)
                    @if (str_contains($image, 'small'))
                    <li>
                        <a href="{{url(''. str_replace('small_','large_',$image) .'')}}" data-standard="{{url($image)}}">
                            <img src="{{asset(''. str_replace('small_','thumb_',$image) . '' )}}" alt="">
                        </a>
                    </li>
                    @endif
                  @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <h2>{{$item->model_ar}}</h2>
                <a href="#" class="spical_button div_trans" data-toggle="modal" data-target="#myModal">اسال عن السعر</a>
                <div class="item-details">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home">الوصف</a></li>
                      @if($item->technical_data_ar) <li><a data-toggle="tab" href="#menu1">البيانات الفنية</a></li> @endif
                      @if($item->accessories_ar) <li><a data-toggle="tab" href="#menu2">ملحقات</a></li> @endif
                      @if($item->optional_ar) <li><a data-toggle="tab" href="#menu3">خيارات</a></li> @endif
                      @if($item->data_sheet) <li><a data-toggle="tab" href="#menu4">التحميل</a></li> @endif
                    </ul>

                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        <h3>الوصف</h3>
                        <div>{!! html_entity_decode($item->features_ar) !!}</div>
                      </div>
                      @if($item->technical_data_ar)
                      <div id="menu1" class="tab-pane fade">
                        <h3>البيانات الفنية</h3>
                        <div>{!! html_entity_decode($item->technical_data_ar) !!}</div>
                      </div>
                      @endif
                      @if($item->accessories_ar) 
                      <div id="menu2" class="tab-pane fade">
                        <h3>ملحقات</h3>
                        <div>{!! html_entity_decode($item->accessories_ar) !!}</div>
                      </div>
                      @endif
                      @if($item->optional_ar)
                      <div id="menu3" class="tab-pane fade">
                        <h3>خيارات</h3>
                        <div>{!! html_entity_decode($item->optional_ar) !!}</div>
                      </div>
                      @endif
                      @if($item->data_sheet)
                      <div id="menu4" class="tab-pane fade">
                        <h3>التحميل</h3>
                        <div><a target="_blank" class="ga-track-file" title="{{$item->model_ar}}" href="//{{$item->data_sheet}}"><span>www.{{strtolower($item->data_sheet)}}</span></a>
                          </div>
                      </div>
                      @endif
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">اسال عن السعر</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('contacts')}}" style="display: grid;">
            {{ csrf_field() }}
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
                    <textarea name="user_message" class="form-control" rows="4" placeholder="الرسالة">برجاء اريد معلومات عن سعر ومواصفات  {{$item->model_ar}} - {{ $product_ar->name }}....
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="button-submit">ارسل</button>
                </div>
            </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('jsFiles')

    <!-- easyzoom -->
    <script src="{{asset('vendors/i-like-robots-EasyZoom-5aebb28/dist/easyzoom.js')}}"></script>

    <script type="text/javascript">
        jQuery( document ).ready(function() {
            $easyzoom = $('.easyzoom').easyZoom();
            // Get the instance API
            var api = $easyzoom.data("easyZoom");

            // Add click event listeners to thumbnails
            $(".thumbnails").on("click", "a", function(e) {
              var $this = $(this);

              e.preventDefault();

              // Use EasyZoom's `swap` method
              api.swap($this.data("standard"), $this.attr("href"));
            });
        });
    </script>

@endsection