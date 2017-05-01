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
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0px">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <br><br>
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
                        <a href="{{ url('/') }}"><i class="fa fa-home fa-2x"></i><font size="5">หน้าแรก</font></a>
                    </li>

                    <li>
                        <a href="{{ url('/login') }}"><i class="fa fa-user-circle fa-2x"></i><font size="5">เข้าสู่ระบบ</font></a>
                    </li>

                    <li>
                        <a href="{{ url('/register') }}"><i class="fa fa-registered fa-2x"></i><font size="5">สมัครสมาชิก</font></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-medkit fa-2x"></i><font size="5">การดูแลสุขภาพ</font></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('user/health') }}"><font size="4"> บทความสุขภาพ</font></a>
                                </li>
                                <li>
                                    <a href="{{ url('user/food') }}"><font size="4">อาหาร</font></a>
                                </li>
                                <li>
                                    <a href="{{ url('user/exercise') }}"><font size="4">การออกกำลังกาย</font></a>
                                </li>
                                <li>
                                    <a href="{{ url('user/medicine') }}"><font size="4">ยาและสมุนไพรเพื่อสุขภาพ</font></a>
                                </li>
                                <li>
                                    <a class="active-menu" href="{{ url('user/dhamma') }}"><font size="4">บทความธรรมะ</font></a>
                                </li>
                            </ul>
                    </li>
                        
                    <li>
                        <a href="{{ url('user/bmi') }}"><i class="fa fa-calculator fa-2x"></i><font size="5">ค่าดัชนีมวลกาย</font></a>
                    </li>   
                        
                    <li>
                        <a href="{{ url('member/share') }}"><i class="fa fa-share-alt fa-2x"></i><font size="5">แบ่งปันประสบการณ์</font></a>
                    </li>

                    <li>
                        <a href="{{ url('user/evaluation') }}"><i class="glyphicon glyphicon-list-alt fa-2x"></i><font size="5">แบบประเมินสุขภาพ</font></a>
                    </li>

                    <li>
                        <a href="{{ url('member/notification') }}"><i class="fa fa-bell fa-2x"></i><font size="5">การแจ้งเตือน</font></a>
                    </li>

                    <li>
                        <a href="{{ route('admin.login.submit') }}"><i class="fa fa-user-secret fa-2x"></i><font size="5">ผู้ดูแลเว็บไซต์</font></a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- /. nav side-->
        <div id="page-wrapper" >
            <div id="page-inner">
                @foreach ($dhammas as $dhamma)
                <div class="row">
                    @if($loop->first)
                    <div class="col-md-6">
                        <br>
                        <h3><B>&nbsp;&nbsp;{{$dhamma->dhamma_title}}</B></h3>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <br>
                        <a href="{{url ('user/dhamma')}}" class="btn btn-success btn-lg" type="button"><span class="fa fa-arrow-left fa-2x"> กลับสู่หน้าหลัก</span></a>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    @endif
                </div>
                @endforeach
                <br><br>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row carousel-holder">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                            @foreach ($dhammas as $dhamma)
                                @if($loop->last)
                                <div class="item active">
                                    <img class="slide-image" src="{{asset('images/resize_dhamma/'.$dhamma->dhamma_pic_file) }}" alt="">
                                </div>
                                @endif
                            @endforeach

                            @foreach ($dhammas as $dhamma)
                                <div class="item">
                                    <img class="slide-image" src="{{asset('images/resize_dhamma/'.$dhamma->dhamma_pic_file) }}" alt="">
                                </div>
                            @endforeach

                                @foreach ($dhammas as $dhamma)
                            @if($loop->first)
                                <div class="item">
                                    <img class="slide-image" src="{{asset('images/resize_dhamma/'.$dhamma->dhamma_pic_file) }}" alt="">
                                </div>
                               @endif
                            @endforeach
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($dhammas as $dhamma)
                        @if ($loop->first) 
                            <div class="col-md-8 col-md-offset-2">
                                <br>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php $myStringWithANewLine ="$dhamma->dhamma_inform";
                                    $newString = str_replace("\r\n","<br />",$myStringWithANewLine);
                                    $newString = str_replace("\n\r","<br />",$newString);
                                    $newString = str_replace("\r","<br />",$newString);
                                    $newString = str_replace("\n","<br />",$newString);
                                    echo($newString); ?>
                        @endif
                    @endforeach
                        </p>
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
</html>
