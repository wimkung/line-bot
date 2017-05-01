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
    <link href="{{ asset('assets/css/custom-form.css') }}" rel="stylesheet" />
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
                                    <a href="foods.php"><font size="4">อาหาร</font></a>
                                </li>
                                <li>
                                    <a href="exercises.php"><font size="4">การออกกำลังกาย</font></a>
                                </li>
                                <li>
                                    <a href="medicine-herbs.php"><font size="4">ยาและสมุนไพรเพื่อสุขภาพ</font></a>
                                </li>
                                <li>
                                    <a href="dhamma-articles.php"><font size="4">บทความธรรมะ</font></a>
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
                        <a href="form.html"><i class="fa fa-bell fa-2x"></i><font size="5">การแจ้งเตือน</font></a>
                    </li>

                    <li>
                        <a href="{{ route('admin.login.submit') }}"><i class="fa fa-user-circle-o fa-2x"></i><font size="5">ผู้ดูแลเว็บไซต์</font></a>
                    </li>
                </ul>
            </div>
        </nav>    

        <!-- /. nav side-->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-6">
                        <h2><B>&nbsp; แบบประเมินความเสี่ยงต่อโรคหัวใจและหลอดเลือดสมอง</B></h2>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <br>
                        <a href="{{url ('member/evaluation')}}" class="btn btn-success btn-lg" type="button"><span class="fa fa-arrow-left fa-2x"> กลับสู่หน้าหลัก</span></a>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><p>{{ $error }}</p></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                    <div style="background: #537ba3; padding: 10px 0px 10px 10px; border:3px solid #f3f3f3;">
                        <font color="#fff">
                        <p><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; แบบประเมินความเสี่ยงต่อโรคหัวใจและหลอดเลือดสมอง</B> เป็นแบบประเมินที่ใช้ประเมินความเสี่ยงต่อโรคหัวใจและหลอดเลือดในกลุ่มเสี่ยงสูงต่อการเกิดโรคเบาหวานและโรคความดันโลหิตสูง (Pre-DM, Pre-HT) และผู้ที่มีภาวะอ้วน</p></font>
                    </div>

                    <br>
                    <div style="background: #d0f2fe; padding: 10px 0px 10px 20px; border:2px solid #f3f3f3;">
                        <p><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; กลุ่มเป้าหมาย :</B>
                       <br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. กลุ่มเสี่ยงสูงต่อการเกิดโรคความดันโลหิตสูง (Pre-HT) 
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(มีระดับความดันโลหิต ตั้งแต่ 120/80 ถึง 139/89 มม.ปรอท)
                        <br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. กลุ่มเสี่ยงสูงต่อการเกิดโรคเบาหวาน (Pre-DM)
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(มีระดับนํ้าตาลในเลือดเมื่ออดอาหาร 8 ชั่วโมงขึ้นไป ตั้งแต่ 100 -125 มก./ดล.)
                        <br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. กลุ่มที่มีดัชนีมวลกาย ≥ 25 กก./ม.<sup>2</sup>
                        </p>
                    </div>
                        <br><br>
                        <p><B>คำชี้แจง :</B>
                        ให้ท่านสำรวจตัวท่านเองและประเมินอาการของท่าน เพื่อตอบคำถามดังต่อไปนี้</p>
                        <br>
                    </div>
                </div>

            {!! Form::open(['action' => 'PreDMHTFormController@calculate']) !!}
            <!-- {!! Form::open(['url' => 'member/stress/form', 'method' => 'post']) !!} -->

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">                    
                                <div class="form-group">
                                    <p><B>1.&nbsp;ยังคงสูบบุหรี่ ยาเส้น ยาสูบ บุหรี่ซิกาแรต บุหรี่ซิการ์ หรือ หยุดสูบไม่เกิน 1 ปี</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '0') }} &nbsp;ไม่ใช่
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '1') }} &nbsp;ใช่ 
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>2.&nbsp;ระดับความดันโลหิต ตั้งแต่ 130/85 มม.ปรอท และ/หรือ เคยได้รับการวินิจฉัยจากแพทย์ว่าเป็น
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;โรคความดันโลหิตสูง</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '0') }} &nbsp;ไม่ใช่
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '1') }} &nbsp;ใช่
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>3.&nbsp;ระดับนํ้าตาลในเลือด (FPG) ตั้งแต่ 100 มก./ดล. และ/หรือ เคยได้รับการวินิจฉัยจากแพทย์ว่าเป็น
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;โรคเบาหวาน</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '0') }} &nbsp;ไม่ใช่
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '1') }} &nbsp;ใช่
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>4.&nbsp;เคยได้รับการวินิจฉัยจากแพทย์หรือพยาบาลว่ามีภาวะไขมันในเลือดผิดปกติ</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '0') }} &nbsp;ไม่ใช่
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '1') }} &nbsp;ใช่
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>5.&nbsp;ขนาดรอบเอว มากกว่า ส่วนสูง (เซนติเมตร) หาร 2</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '0') }} &nbsp;ไม่ใช่
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '1') }} &nbsp;ใช่ 
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>6.&nbsp;เคยได้รับการวินิจฉัยจากแพทย์ว่าเป็นโรคหัวใจขาดเลือด หรือโรคอัมพฤกษ์ อัมพาต</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch6', '0') }} &nbsp;ไม่ใช่ 
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch6', '1') }} &nbsp;ใช่ 
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>7.&nbsp;มีประวัติญาติในครอบครัวเป็นโรคหัวใจขาดเลือด หรือโรคอัมพฤกษ์ อัมพาต 
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;(ผู้ชายเป็นก่อนอายุ 55 ปี หรือผู้หญิงเป็นก่อนอายุ 65 ปี)</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch7', '0') }} &nbsp;ไม่ใช่ 
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch7', '1') }} &nbsp;ใช่ 
                                </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-md-offset-8">
                        <br>
                        {!! Form::submit('ตรวจคะแนน', array('class'=>'btn btn-primary btn-lg btn-block')) !!}
                        <br>
                    </div>
                </div>
       
            {!! Form::close() !!}
                <!-- footer starts here -->
                <footer class="footer">
                    <div class="row"> 
                        <div class="col-md-10 col-md-offset-1">
                            <br><br>
                            <p>&copy; แหล่งอ้างอิง: สถาบันเวชศาสตร์ผู้สูงอายุ กรมการแพทย์ กระทรวงสาธารณสุข</p>
                        </div>
                    </div> 
                </footer>
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


				


