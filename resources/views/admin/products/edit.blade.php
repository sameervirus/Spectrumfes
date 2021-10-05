@extends('admin.admin')

@section('title', 'Products')

@section ('cssFiles')
    <style type="text/css">
      .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
      }
      .inputfile + label {
          font-size: 1.25em;
          font-weight: 700;
          color: white;
          background-color: black;
          display: inline-block;
          padding: 0 20px;
      }

      .inputfile:focus + label,
      .inputfile + label:hover {
          background-color: red;
      }
      .inputfile + label {
        cursor: pointer; /* "hand" cursor */
      }
      .thumbnail .image {height: auto!important;}
    </style>
@endsection

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Products<small></small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        @if (session('message'))
            <div id="back-message" class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Oh yeah!</strong> {{session('message')}}
             </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="clearfix"></div> 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Products <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

        <form 
            class="form-horizontal" 
            role="form" 
            method="POST" 
            action="{{route('products.update', ['id' => $product->model] ) }}" 
            enctype="multipart/form-data"
            novalidate>
                
            {{ csrf_field() }} {{ method_field('PUT') }}

            <input type="hidden" name="partner" value="{{$partner}}">

            <div class="form-group">
                <label for="category" class="col-md-2 control-label">Category - التصنيف</label>

                <div class="col-md-10">
                    <input id="category" type="text" class="form-control" 
                    name="category" value="{{$product->category}}" required autofocus placeholder="Product Type">

                    <input type="text" class="form-control" 
                    name="category_ar" value="{{$product->category_ar}}" required placeholder="نوع المنتج">

                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-md-2 control-label">Model المنتج</label>

                <div class="col-md-10">
                    <input id="name" type="text" class="form-control" name="model" value="{{$product->model}}" required placeholder="Product Name">

                    <input type="text" class="form-control" name="model_ar" value="{{$product->model_ar}}" required placeholder="اسم المنتج بالعربي">

                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Features المواصفات</label>

                <div class="col-md-10">
                    <textarea type="text" name="features" id="description" class="form-control" row="4" placeholder="Features" required>{!! html_entity_decode($product->features) !!}</textarea>

                    <textarea type="text" name="features_ar" class="form-control" row="4" placeholder="المواصفات" required>{!! html_entity_decode($product->features_ar) !!}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Technical Data المواصفات الفنية</label>

                <div class="col-md-10">
                    <textarea type="text" name="technical_data" id="description" class="form-control" row="4" placeholder="Technical Data">{!! $product->technical_data !!}</textarea>

                    <textarea type="text" name="technical_data_ar" class="form-control" row="4" placeholder="المواصفات الفنية">{!! $product->technical_data_ar !!}</textarea>
                </div>
            </div>

            <div class="form-group to_show">
                <label for="description" class="col-md-2 control-label">Equipment</label>

                <div class="col-md-10">
                    <textarea type="text" name="equipment" id="description" class="form-control" row="4" placeholder="Features" required>{!! $product->equipment !!}</textarea>

                    <textarea type="text" name="equipment_ar" class="form-control" row="4" placeholder="المواصفات" required>{!! $product->equipment_ar !!}</textarea>
                </div>
            </div>

            <div class="form-group to_show">
                <label for="description" class="col-md-2 control-label">Benefits & Features</label>

                <div class="col-md-10">
                    <textarea type="text" name="benefits" id="description" class="form-control" row="4" placeholder="Features" required>{!! $product->benefits_features !!}</textarea>

                    <textarea type="text" name="benefits_ar" class="form-control" row="4" placeholder="المواصفات" required>{!! $product->benefits_features_ar !!}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Accessories الملحقات</label>

                <div class="col-md-10">
                    <textarea type="text" name="accessories" id="description" class="form-control" row="4" placeholder="Accessories">{!! $product->accessories !!}</textarea>

                    <textarea type="text" name="accessories_ar" class="form-control" row="4" placeholder="الملحقات">{!! $product->accessories_ar !!}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Optional الخيارات</label>

                <div class="col-md-10">
                    <textarea type="text" name="optional" id="description" class="form-control" row="4" placeholder="Optional">{!! $product->optional !!}</textarea>

                    <textarea type="text" name="optional_ar" class="form-control" row="4" placeholder="الخيارات">{!! $product->optional_ar !!}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="data_sheet" class="col-md-2 control-label">Data Sheet التحميلات</label>

                <div class="col-md-10">
                    <input id="data_sheet" type="text" class="form-control" 
                    name="data_sheet" value="{{$product->data_sheet}}" placeholder="التحميلات">
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                <label for="img" class="col-md-2 control-label">Product Images</label>
                
                <div class="col-md-10">
                    <input id="img" type="file" class="form-control" name="file[]" value="" accept="image/*" multiple>
                    <p class="help-block">Use High resolution images</p>
                </div>
            </div>
               
                          <a href="{{route('products.index')}}" type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                          <button type="submit" class="btn btn-primary">Save</button>
       
                        </form>
                        </div>
                          
                        
                       
                    </div>
                </div>
            </div>

            <hr/> 
            @if (@$images)
            <div class="row">
                <h1>Delete Images</h1>
            @foreach ($images as $image)
            @if(str_contains($image, 'small'))
              <div class="col-md-3 img-frame well">
                  <div class="thumbnail">
                    <div class="image view view-first">
                      <img src="{{asset($image)}}" alt="image" width="100%">
                      <div class="mask">
                        <p></p>
                        <div class="tools tools-bottom">
                        <a href="#" class="to_delete_event" data-img="{{$image}}"><i class="fa fa-times"></i></a>  
                          
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            @endif
            @endforeach
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('jsFiles')
    
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <script src="{{asset('vendors/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript">
      
      function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#' + id).attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
      } 

      $(".inputfile").change(function(){
          var img = $(this).data('id');
          readURL(this, img);
      });



      tinymce.init({
          selector: 'textarea',
          height: 200,
          theme: 'modern',
          plugins: 'code print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help paste',
          toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link media image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
          image_advtab: true,
          paste_as_text: true,
          relative_urls : false,
          remove_script_host : false,
          convert_urls : true, 
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i'
          ]
         });

      $("body").on("click",".to_delete_event",function (e) {
        e.preventDefault();
        if (confirm('Are you sure ?')) {
          var tr =  $( this ).parents( ".img-frame" );
          var img = $(this).data('img');
          $.post("{{route('del-img')}}",{_token:"{{ csrf_token() }}", img: img}).done(function( data ) {
            if (data == 1) {
              tr.slideUp('slow').remove();
            } else {
              alert ("Server is down please try again");
            }
          });
        }
      });
    </script>

@endsection
