@extends('admin.admin')

@section('title', 'Products')

@section('cssFiles')
    <!-- Datatables -->
    <link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <style type="text/css">
        #partner {overflow:overlay;}
        #loadingmessage {position: absolute;width: 100%;background: rgba(255, 255, 255, 0.74);    text-align: center;z-index: 99;height: 100%;}
        #loadingmessage img {height: 200px;}
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
                        <h2>Item <small></small></h2>
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
                        <p>
                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".add-user"><i class="fa fa-plus"></i> Add Item </a>
                            <a id="edit_item" href="#" class="btn btn-info btn-xs disabled"><i class="fa fa-plus"></i> Edit Item </a>
                            <a id="del_item" href="#" class="btn btn-danger btn-xs disabled"><i class="fa fa-plus"></i> Delete Item </a>
                        </p>
                        <div id="partner" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Partner</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <select id="priority_filter" class="form-control select2_css">
                                <option value="">Select Partner</option>
                                @foreach($products as $product)
                                <option value="{{$product->product}}">{{$product->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div id='loadingmessage' style='display:none'>
                          <img src="{{asset('images/source.gif')}}" />
                        </div>    
                        <table id="example" class="table table-striped table-bordered dataTable no-footer jambo_table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Model</th>
                                    <th>Category</th>
                                    <th>الموديل</th>
                                    <th>التصنيف</th>                                    
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

<div class="modal fade add-user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Add Product</h4>
        </div>                                
        <form class="form-horizontal" role="form" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data" novalidate>                              
        <div class="modal-body">
          
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="POST">

            <div id="partner" class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Select Partner</label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                  <select name="partner" class="form-control select2_css ckeck_change">
                    <option value="">Select Partner</option>
                    @foreach($products as $product)
                    <option value="{{$product->product}}">{{$product->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>

            <div class="form-group">
                <label for="category" class="col-md-2 control-label">Category - التصنيف</label>

                <div class="col-md-10">
                    <input id="category" type="text" class="form-control" 
                    name="category" value="" required autofocus placeholder="Product Type">

                    <input type="text" class="form-control" 
                    name="category_ar" value="" required placeholder="نوع المنتج">

                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-md-2 control-label">Model المنتج</label>

                <div class="col-md-10">
                    <input id="name" type="text" class="form-control" name="model" value="" required placeholder="Product Name">

                    <input type="text" class="form-control" name="model_ar" value="" required placeholder="اسم المنتج بالعربي">

                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Features المواصفات</label>

                <div class="col-md-10">
                    <textarea type="text" name="features" id="description" class="form-control" row="4" placeholder="Features" required></textarea>

                    <textarea type="text" name="features_ar" class="form-control" row="4" placeholder="المواصفات" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Technical Data المواصفات الفنية</label>

                <div class="col-md-10">
                    <textarea type="text" name="technical_data" id="description" class="form-control" row="4" placeholder="Technical Data"></textarea>

                    <textarea type="text" name="technical_data_ar" class="form-control" row="4" placeholder="المواصفات الفنية"></textarea>
                </div>
            </div>

            <div class="form-group to_show">
                <label for="description" class="col-md-2 control-label">Equipment</label>

                <div class="col-md-10">
                    <textarea type="text" name="equipment" id="description" class="form-control" row="4" placeholder="Features" required></textarea>

                    <textarea type="text" name="equipment_ar" class="form-control" row="4" placeholder="المواصفات" required></textarea>
                </div>
            </div>

            <div class="form-group to_show">
                <label for="description" class="col-md-2 control-label">Benefits & Features</label>

                <div class="col-md-10">
                    <textarea type="text" name="benefits" id="description" class="form-control" row="4" placeholder="Features" required></textarea>

                    <textarea type="text" name="benefits_ar" class="form-control" row="4" placeholder="المواصفات" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Accessories الملحقات</label>

                <div class="col-md-10">
                    <textarea type="text" name="accessories" id="description" class="form-control" row="4" placeholder="Accessories"></textarea>

                    <textarea type="text" name="accessories_ar" class="form-control" row="4" placeholder="الملحقات"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Optional الخيارات</label>

                <div class="col-md-10">
                    <textarea type="text" name="optional" id="description" class="form-control" row="4" placeholder="Optional"></textarea>

                    <textarea type="text" name="optional_ar" class="form-control" row="4" placeholder="الخيارات"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="data_sheet" class="col-md-2 control-label">Data Sheet التحميلات</label>

                <div class="col-md-10">
                    <input id="data_sheet" type="text" class="form-control" 
                    name="data_sheet" value="" placeholder="التحميلات">
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                <label for="img" class="col-md-2 control-label">Product Images</label>
                
                <div class="col-md-10">
                    <input id="img" type="file" class="form-control" name="file[]" value="" required accept="image/*" multiple>
                    <p class="help-block">Use High resolution images</p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
      </div>
    </div>
</div>
<form id="delete" action="{{ route('delitem') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="delete">
    <input id="delId" type="hidden" name="id" value="">    
    <input id="delTable" type="hidden" name="table" value="">    
</form>
@endsection

@section('jsFiles')
    
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>	
    <script src="{{asset('vendors/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript">
    var oTable;
    var table;
    $(document).ready(function() {
        /* Add a click handler to the rows - this could be used as a callback */
        $("#example").on('click', 'tbody tr', function( e ) {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                $("#edit_item").addClass('disabled');
                $("#del_item").addClass('disabled');
            }
            else {
                oTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $("#edit_item").removeClass('disabled');
                $("#del_item").removeClass('disabled');
            }
        });

        $("#priority_filter").change(function(){
            $('#loadingmessage').show();
            table = $("#priority_filter").val();
            $.post( "{{route('api_partner')}}", { table: table }, function( data ) {
              oTable = $('#example').dataTable();
              oTable.fnClearTable();
              oTable.fnAddData(data);
              $('#loadingmessage').hide();
            });            
            
        });

        $("#edit_item").on('click', function(e){
            var id = $('.selected td:first').text();
            $(this).attr('href', "/admin/products/"+ table + "-" + id + "/edit");
        });

        $("#del_item").on('click', function(e){
            e.preventDefault();
            var id = $('.selected td:first').text();
            if (confirm("Are you sure to delete?")){
                $('#delId').val(id);
                $('#delTable').val(table);
                $('form#delete').submit();
            }
        });
    });

    tinymce.init({
          selector: 'textarea',
          height: 200,
          theme: 'modern',
          plugins: 'code print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help paste',
          toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link media image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
          image_advtab: true,
          //paste_as_text: true,
          relative_urls : false,
          remove_script_host : false,
          convert_urls : true, 
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i'
          ]
         });

    $( ".ckeck_change" ).change(function() {
      if (this.value == 'perkins') {
        $(".to_show").css('display','block');
      }
    });
    </script>

@endsection
