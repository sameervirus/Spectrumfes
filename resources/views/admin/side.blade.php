<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-user"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('/admin')}}">Dashboard</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> المحتويات الاساسية <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('sitecontent.index')}}?lang=en">البيانات الاساسية E</a></li>
					<li><a href="{{route('sitecontent.index')}}?lang=ar">البيانات الاساسية عربي</a></li>
                </ul>
            </li>
		<!--	
            <li><a><i class="fa fa-home"></i> الصفحة الرئيسية <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('slider.index')}}">Main Slider</a></li>
				</ul>
            </li>
        -->
			<li><a><i class="fa fa-file-powerpoint-o"></i> الصفحات الثابتة <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @foreach(\App\Admin\Pages\Page::all() as $page)
                    @continue($page->page == 'video')
                    <li><a href="{{route('pages.edit',$page->page)}}">{{Illuminate\Support\Str::title($page->page)}}</a></li>
                    @endforeach
				</ul>
            </li>
        
			<li><a><i class="fa fa-desktop"></i> العناصر الديناميكية <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('products.index')}}">المنتجات</a></li>                  
                </ul>
            </li>
        <!--
			<li><a><i class="fa fa-envelope"></i> رسائل من العملاء <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('admin/message')}}">الرسائل</a></li>
                </ul>
            </li>
        -->			
        </ul>
    </div>    
</div>
<!-- /sidebar menu -->
<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>