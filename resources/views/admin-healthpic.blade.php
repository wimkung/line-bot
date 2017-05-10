<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <title>ELDER - a healthcare website for elder</title>
    <!-- bootstrap styles -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- fontawesome styles -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- custom styles -->
    <link href="{{ asset('assets/css/admin-custom.css') }}" rel="stylesheet" />
    <!-- google fonts -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->

    <!-- font-awesome.min.css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 50px">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <br><br>

        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <div style="color: white;
                padding: 1px 50px 5px 50px;
                float: right;
                font-size: 16px;">
                <i class="fa fa-user-circle-o"></i> {{ Auth::user()->name }} &nbsp;
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><button class="btn btn-default square-btn-adjust"><B>ออกจากระบบ</B></button>
                        <!-- Logout -->
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </li>
        @endif
        </div>
        </nav> 

        <!-- /. nav top  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <h4><font style="color: #fff;">การดูแลสุขภาพผู้สูงอายุ</font></h4>
                        <img src="{{ asset('assets/img/logo.png') }}" class="user-image img-responsive"/>
                    </li>

                     <li>
                        <a href="{{url ('admin/')}}"><i class="fa fa-home"></i><font size="4">หน้าแรก</font></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-medkit"></i><font size="4">การดูแลสุขภาพ</font><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active-menu" href="{{url ('admin/health')}}"><font size="3">บทความสุขภาพ</font></a>
                                </li>
                                <li>
                                    <a href="{{url ('admin/food')}}"><font size="3">อาหาร</font></a>
                                </li>
                                <li>
                                    <a href="{{url ('admin/exercise')}}"><font size="3">การออกกำลังกาย</font></a>
                                </li>
                                <li>
                                    <a href="{{url ('admin/medicine')}}"><font size="3">ยาและสมุนไพรเพื่อสุขภาพ</font></a>
                                </li>
                                <li>
                                    <a href="{{url ('admin/dhamma')}}"><font size="3">บทความธรรมะ</font></a>
                                </li>
                            </ul>
                    </li>

                    <li>
                        <a href="{{url ('admin/share')}}"><i class="fa fa-share-alt"></i><font size="4">แบ่งปันประสบการณ์</font></a>
                    </li>

                    <li>
                        <a href="{{url ('admin/notify')}}"><i class="fa fa-bell"></i><font size="4">การแจ้งเตือน</font></a>
                    </li>
                </ul>
            </div>
        </nav>  

        <!-- /. nav side-->
        <div id="page-wrapper" >
            <div id="page-inner">

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                
                <div class="row">
                {!! Form::model($health, ['method' => 'PUT', 'files' => 'true', 'action'=>['AdminHealthPicController@update', $health->health_id]]) !!}
                    <br>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group">
                            {!! Form::label('images', 'รูปภาพ') !!}
                            {!! Form::file('images[]', array('multiple'=>true, 'accept' =>'.png, .jpg, .jpeg')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-3">
                        <div class="form-group">
                            <div style="font-size: 14pt">
                            {!! Form::submit('เพิ่มรูปภาพ', array('class'=>'btn btn-primary')) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                    <div class="col-md-2 col-md-offset-5">
                        <a href="{{url ('admin/health')}}" class="btn btn-success btn-lg btn-block" type="button"><span class="fa fa-arrow-left"> กลับสู่หน้าหลัก</span></a>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <br>

                <div class="row">
                    <!-- <div class="col-md-5 col-md-offset-1"> -->
                
                            @foreach ($healths as $health)
                                <div class="col-md-5 col-md-offset-1">
                                    <img class="slide-image" src="{{asset('images/resize/'.$health->health_pic_file) }}" width="300"alt="">
                                </div>

                                <div class="col-md-2 col-md-offset-3">
                                <br><br><br>
                                {!! Form::open(['url'=>'admin/health/pic/destroy/'.$health->health_pic_id,'method'=>'DELETE','class'=>'form-horizontal',
                        'role'=>'form','onsubmit' => 'return confirm("คุณแน่ใจหรือไม่ ?")'])!!}
                   
                        <!-- {{ Form::open(array('route' => array('health.destroy', $health->health_id), 'method' => 'delete')) }} -->
                            <button class="btn btn-danger" type="submit" data-confirm="Are you sure you want to delete this?">
                            <span class="fa fa-trash"> ลบ</span></button>

                            </div>
                       
                        {{ Form::close() }}

                        <div class="col-md-12">
                            <hr>
                        </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="text-center">
                                <ul class="pagination">
                                    {!! $healths->render() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
            </div> <!-- /. PAGE INNER  -->
        </div> <!-- /. PAGE WRAPPER  -->
    </div> <!-- /. WRAPPER  -->
</body>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- METISMENU SCRIPTS -->
    <!-- <script src="assets/js/jquery.metisMenu.js"></script> -->
    <!-- CUSTOM SCRIPTS -->
    <!-- <script src="assets/js/custom.js"></script> -->
</html>
