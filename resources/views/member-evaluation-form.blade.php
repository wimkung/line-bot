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
                        <a class="active-menu" href="{{ url('member/evaluation') }}"><i class="glyphicon glyphicon-list-alt fa-2x"></i><font size="5">แบบประเมินสุขภาพ</font></a>
                    </li>

                    <li>
                        <a href="{{ url('member/notification') }}"><i class="fa fa-bell fa-2x"></i><font size="5">การแจ้งเตือน</font></a>
                    </li>
                </ul>
            </div>
        </nav>    

        <!-- /. nav side-->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1><B>&nbsp; แบบประเมินสุขภาพ</B></h1>
                        <hr>
                    </div>
                </div>

				<div class="col-md-1">
                    <h2>&nbsp; <span class="glyphicon glyphicon-list-alt" style="color:#00bfff"></span></h2>
                </div>

                <div class="col-md-5">
                    <h2>แบบประเมินความเครียด</h2>
                </div>

				<div class="col-md-2 col-md-offset-2">
				    <br>
					<a href="{{url ('member/stress/form')}}" class="btn btn-success btn-lg" type="button"><span class="fa fa-pencil fa-2x"> ทำแบบประเมิน</span></a>                     
				</div>
				<div class="col-md-12">
					<br>
                    <!-- <p>&nbsp;&nbsp;&nbsp;ความเครียด เป็นเรื่องของร่างกายและจิตใจ ที่เกิดการตื่นตัวเตรียมรับกับเหตุการณ์ใดเหตุการณ์หนึ่ง ซึ่งเราคิดว่าไม่น่าพอใจ เป็นเรื่องที่เกินความสามารถที่จะแก้ไขได้ ทำาให้รู้สึกหนักใจเป็นทุกข์ และทำาให้เกิดอาการผิดปกติทางร่างกายและพฤติกรรมตามไปด้วย</p> -->
                    <hr>
				</div>		
				<br>

                <div class="col-md-1">
                    <h2>&nbsp; <span class="glyphicon glyphicon-list-alt" style="color:#00bfff"></span></h2>
                </div>
                
                <div class="col-md-5">
                    <h2>แบบประเมินโรคซึมเศร้า</h2>
                </div>

                <div class="col-md-2 col-md-offset-2">
                    <br>
                    <a href="{{url ('member/depress/form')}}" class="btn btn-success btn-lg" type="button"><span class="fa fa-pencil fa-2x"> ทำแบบประเมิน</span></a>
                </div>
                    
                <div class="col-md-12">
                    <br>
                    <hr>
                </div>
                <br>

                <div class="col-md-1">
                    <h2>&nbsp; <span class="glyphicon glyphicon-list-alt" style="color:#00bfff"></span></h2>
                </div>
                
                <div class="col-md-5">
                    <h2>แบบประเมินระดับความรุนแรงของโรคข้อเข่าเสื่อม</h2>
                </div>

                <div class="col-md-2 col-md-offset-2">
                    <br>
                    <a href="{{url ('member/knee/form')}}" class="btn btn-success btn-lg" type="button"><span class="fa fa-pencil fa-2x"> ทำแบบประเมิน</span></a>
                </div>
                    
                <div class="col-md-12">
                    <br>
                    <hr>
                </div>
                <br>

                <div class="col-md-1">
                    <h2>&nbsp; <span class="glyphicon glyphicon-list-alt" style="color:#00bfff"></span></h2>
                </div>
                
                <div class="col-md-5">
                    <h2>แบบประเมินความสามารถในการทำกิจวัตรประจำวัน</h2>
                </div>

                <div class="col-md-2 col-md-offset-2">
                    <br>
                    <a href="{{url ('member/adl/form')}}" class="btn btn-success btn-lg" type="button"><span class="fa fa-pencil fa-2x"> ทำแบบประเมิน</span></a>
                </div>
                    
                <div class="col-md-12">
                    <br>
                    <hr>
                </div>
                <br>

                <div class="col-md-1">
                    <h2>&nbsp; <span class="glyphicon glyphicon-list-alt" style="color:#00bfff"></span></h2>
                </div>
                
                <div class="col-md-5">
                    <h2>แบบประเมินความเสี่ยงต่อโรคหัวใจและหลอดเลือดสมอง</h2>
                </div>

                <div class="col-md-2 col-md-offset-2">
                    <br>
                    <a href="{{url ('member/preDMHT/form')}}" class="btn btn-success btn-lg" type="button"><span class="fa fa-pencil fa-2x"> ทำแบบประเมิน</span></a>
                </div>
                    
                <div class="col-md-12">
                    <br>
                    <hr>
                </div>
                <br>        
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
