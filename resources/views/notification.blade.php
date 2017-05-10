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
    <link href="{{ asset('assets/css/custom-6.css') }}" rel="stylesheet" />
    <!-- google fonts -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->

    <!-- font-awesome.min.css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 30px">
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
                    <i class="fa fa-user-circle-o fa-2x"></i><font size="5px"> {{ Auth::user()->name }} </font> 
                        &nbsp;
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><button class="btn btn-default square-btn-adjust btn-lg"><B>ออกจากระบบ</B></button>
                        <!-- Logout -->
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    </li>
                </div>
            @endif
        </nav> 

        <!-- /. nav top  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <h3><font style="color: #fff;">การดูแลสุขภาพผู้สูงอายุ</font></h3>
                        <img src="{{ asset('assets/img/logo.png') }}" class="user-image img-responsive"/>
                    </li>

                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-home fa-2x"></i><font size="5">หน้าแรก</font></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-medkit fa-2x"></i><font size="5">การดูแลสุขภาพ</font></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('member/health') }}"><font size="4"> บทความสุขภาพ</font></a>
                                </li>
                                <li>
                                    <a href="{{ url('member/food') }}"><font size="4">อาหาร</font></a>
                                </li>
                                <li>
                                    <a href="{{ url('member/exercise') }}"><font size="4">การออกกำลังกาย</font></a>
                                </li>
                                <li>
                                    <a href="{{ url('member/medicine') }}"><font size="4">ยาและสมุนไพรเพื่อสุขภาพ</font></a>
                                </li>
                                <li>
                                    <a href="{{ url('member/dhamma') }}"><font size="4">บทความธรรมะ</font></a>
                                </li>
                            </ul>
                    </li>
                        
                    <li>
                        <a href="{{ url('member/bmi') }}"><i class="fa fa-calculator fa-2x"></i><font size="5">ค่าดัชนีมวลกาย</font></a>
                    </li>   
                        
                    <li>
                        <a href="{{ url('member/share') }}"><i class="fa fa-share-alt fa-2x"></i><font size="5">แบ่งปันประสบการณ์</font></a>
                    </li>

                    <li>
                        <a href="{{ url('member/evaluation') }}"><i class="glyphicon glyphicon-list-alt fa-2x"></i><font size="5">แบบประเมินสุขภาพ</font></a>
                    </li>

                    <li>
                        <a class="active-menu" href="{{ url('member/notification') }}"><i class="fa fa-bell fa-2x"></i><font size="5">การแจ้งเตือน</font></a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- /. nav side-->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-6">
                        <h1><B>&nbsp; การแจ้งเตือน</B></h1>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <br>

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('flash_message') }}</p>
                    </div>
                @endif

                <div class="col-md-10 col-md-offset-1">
                    <div style="background: #537ba3; padding: 30px 30px 0px 30px; border:2px solid #f3f3f3;">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <!-- <img src="{{ asset('assets/img/line-friend.jpg') }}" width="200" alt=""> --> 
                                <img src="http://qr-official.line.me/L/dgAi5St0qN.png" width="200">   
                                <br><br><br>   
                            </div> 
                                <font color="#fff"><h3>&nbsp;&nbsp;&nbsp;&nbsp;เพิ่มเพื่อน LINE ด้วยคิวอาร์โค้ด</h3
                                >
                                <br>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เริ่มแอพ LINE แล้วสแกนคิวอาร์โค้ด 
                                โดยไปที่
                                <br>แท็บ "อื่นๆ" ในเมนู "เพิ่มเพื่อน" แล้วทำการสแกนคิวอาร์โค้ด</font>
                                <!-- <br><a href="http://line.me/R/ti/g/dVUUwx0bsQ"><font color="#fff"><U>เข้าร่วมกลุ่ม</U></font></span></a></p> --> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    {!! Form::open(['url' => 'member/notification', 'method' => 'post']) !!}
                    <br>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <div class="input-group-lg">
                            <p><B>{!! Form::label('ไอดีของคุณ') !!}
                            {!! Form::text('your_id', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <br>
                            <p><B>{!! Form::label('ข้อความที่ต้องการส่ง') !!}
                            <div style="border: 1px solid #ccc;">
                            {!! Form::textarea('notification_mess', null, array('required', 'class'=>'form-control','row'=>'10','placeholder'=>'ข้อความ')) !!}
                            </div>
                        </div>
                    </div>
                    <br><br>

                    <div class="col-md-8 col-md-offset-2">
                       <div class="form-group">
                            <div class="input-group-lg">
                            <p><B>{!! Form::label('เวลาที่ต้องทำสำหรับการแจ้งเตือน') !!}
                            {!! Form::time('notification_time', null, array('required', 'class'=>'form-control','placeholder'=>'ชั่วโมง')) !!}
                            </div>
                        </div>
                    </div>
 
                    <div class="col-md-3 col-md-offset-8">
                        <div class="form-group">
                            <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary btn-lg"><B>ส่งข้อความ</B></button>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <ul class="pagination">
                    </ul>
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
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</html>
