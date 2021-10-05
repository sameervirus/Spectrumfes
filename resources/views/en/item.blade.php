@extends('layouts.website')

@section( 'title', strtoupper(str_replace('_',' ', str_replace('-',' ',$item->model ))) )

@section('cssFiles')

    <!-- easyzoom -->
    <link href="{{asset('vendors/i-like-robots-EasyZoom-5aebb28/css/easyzoom.css')}}" rel="stylesheet">

@endsection

@section('content')
<div class="item page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home' )}}">Home</a> / 
                <a href="{{ route('products', $product )}}">{{ucwords(str_replace('_',' ',str_replace('-',' ',$product)))}}</a> / 
                <a href="{{ route('category', ['product' => $product, 'category' => $category ] )}}">{{ucwords(str_replace('_',' ',str_replace('-',' ',$category)))}}</a> / 
                {{strtoupper(str_replace('_',' ',str_replace('-',' ',$item->model)))}} </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="easyzoom easyzoom--overlay">
                    @if (ends_with($item->model, '.'))
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
                <h2>{{strtoupper(str_replace('_',' ',str_replace('-',' ',$item->model)))}}</h2>
                <a href="#" class="spical_button div_trans" data-toggle="modal" data-target="#myModal">Ask for Price</a>
                <div class="item-details">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="active"><a data-toggle="tab" href="#home">Descriptions</a></li>
                      @if($item->technical_data) <li><a data-toggle="tab" href="#menu1">Technical Data</a></li> @endif
                      @if(@$item->equipment) <li><a data-toggle="tab" href="#menu2">Equipment</a></li> @endif
                      @if(@$item->benefits_features) <li><a data-toggle="tab" href="#menu3">Benefits & Features</a></li> @endif
                      @if($item->accessories) <li><a data-toggle="tab" href="#menu4">Accessories</a></li> @endif
                      @if($item->optional) <li><a data-toggle="tab" href="#menu5">Optional</a></li> @endif
                      @if($item->data_sheet) <li><a data-toggle="tab" href="#menu6">Downloads</a></li> @endif
                    </ul>

                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        {{-- <h3>Descriptions</h3> --}}
                        <div>{!! html_entity_decode($item->features) !!}</div>
                      </div>
                      @if($item->technical_data)
                      <div id="menu1" class="tab-pane fade">
                        {{-- <h3>Technical Data</h3> --}}
                        <div>{!! html_entity_decode($item->technical_data) !!}</div>
                      </div>
                      @endif
                      @if(@$item->equipment) 
                      <div id="menu2" class="tab-pane fade">
                        {{-- <h3>Equipment</h3> --}}
                        <div>{!! html_entity_decode($item->equipment) !!}</div>
                      </div>
                      @endif
                      @if(@$item->benefits_features) 
                      <div id="menu3" class="tab-pane fade">
                        {{-- <h3>Benefits & Features</h3> --}}
                        <div>{!! html_entity_decode($item->benefits_features) !!}</div>
                      </div>
                      @endif
                      @if($item->accessories) 
                      <div id="menu4" class="tab-pane fade">
                        {{-- <h3>Accessories</h3> --}}
                        <div>{!! html_entity_decode($item->accessories) !!}</div>
                      </div>
                      @endif
                      @if($item->optional)
                      <div id="menu5" class="tab-pane fade">
                        {{-- <h3>Optional</h3> --}}
                        <div>{!! html_entity_decode($item->optional) !!}</div>
                      </div>
                      @endif
                      @if($item->data_sheet)
                      <div id="menu6" class="tab-pane fade">
                        <h3>Download</h3>
                        <div><a target="_blank" class="ga-track-file" title="{{strtoupper(str_replace('_',' ',$item->model))}}" href="//{{$item->data_sheet}}"><span>{{strtolower($item->data_sheet)}}</span></a>
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
        <h4 class="modal-title">Ask for Price</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('contacts')}}" style="display: grid;">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-sm-6">
                  <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="col-sm-6">
                  <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <textarea name="user_message" class="form-control" rows="4" placeholder="message">I'd like to know the price/more information of {{strtoupper(str_replace('_',' ',str_replace('-',' ',$item->model)))}} - {{strtoupper(str_replace('_',' ',str_replace('-',' ',$product)))}}....
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="button-submit">Submit</button>
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