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
                        <h4><font style="color: #fff">ผู้ดูแลเว็บไซต์</font></h4>
                        <img src="{{ asset('assets/img/admin-3.png') }}" class="user-image img-responsive"/>
                    </li>

                     <li>
                        <a href="{{url ('admin/')}}"><i class="fa fa-home"></i><font size="4">หน้าแรก</font></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-medkit"></i><font size="4">การดูแลสุขภาพ</font><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url ('admin/health')}}"><font size="3">บทความสุขภาพ</font></a>
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
                                    <a class="active-menu" href="{{url ('admin/dhamma')}}"><font size="3">บทความธรรมะ</font></a>
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
                <div class="row">
                    <div class="col-md-8">
                        &nbsp;
                        <h2 class="fa fa-pencil fa-2x" style="color:#00bfff">
                        <font color="#000000">แก้ไขข้อมูลบทความธรรมะ</font></h2>
                    </div>
                    <div class="col-md-2 col-md-offset-2">
                        <br>
                        <a href="{{url ('admin/dhamma')}}" class="btn btn-success btn-lg btn-block" type="button"><span class="fa fa-arrow-left"> กลับสู่หน้าหลัก</span></a>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <br><br>

                @if (count($errors) > 0)
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif

                <div class="row">

                    <!-- {!! Form::open(['url' => 'admin/health', 'method' => 'post', 'files' => 'true']) !!} -->

                    {!! Form::model($dhamma, ['method' => 'PUT', 'action'=>['AdminDhammaController@update', $dhamma->dhamma_id]]) !!}

                    <br>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {!! Form::label('ชื่อข้อมูลบทความสุขภาพ') !!}
                            {!! Form::text('dhamma_title', null, array('required', 'class'=>'form-control','placeholder'=>'ชื่อ')) !!}
                        </div>
                    </div>
                    <br><br>

                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {!! Form::label('รายละเอียดข้อมูลบทความสุขภาพ') !!}
                            {!! Form::textarea('dhamma_inform', null, array('required', 'class'=>'form-control','row'=>'5','placeholder'=>'รายละเอียด')) !!}
                        </div>
                    </div>

                    <div class="col-md-8 col-md-offset-2">
                        <br>
                        <a href="{{url ('admin/dhamma/pic/'. $dhamma->dhamma_id)}}" class="btn btn-default"><span class="fa fa-pencil"> แก้ไขรูปภาพ</span></a>
                        <p>*หากไม่ต้องการแก้ไขรูปภาพ ให้ข้ามขั้นตอนนี้ได้เลย</p>
                    </div>

                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <!-- {!! Form::label('images', 'รูปภาพ') !!}
                            {!! Form::file('images[]', array('multiple'=>true)) !!} -->
                        </div>
                    </div>

                    <div class="col-md-2 col-md-offset-9">
                        <div class="form-group">
                            {!! Form::submit('อัพเดทข้อมูล', array('class'=>'btn btn-primary')) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

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
