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
                <!-- <a class="navbar-brand" href="index.html">Healthcare for elder</a>  -->
                <!-- <img src="assets/img/logo-1.png" class="navbar-brand"> -->
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
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('member/history') }}"><font size="4"> ประวัติการทำแบบประเมิน</font></a>
                                </li>
                            </ul>
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
                    <div class="col-md-8">
                        <h2><B>&nbsp;แบบประเมินระดับความรุนแรงของโรค<br>ข้อเข่าเสื่อม</B></h2>
                    </div>
                    <div class="col-md-offset-1">
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
                        <p>
                        <br><B>คำชี้แจง :</B>
                        โปรดเลือกหัวข้อที่ตรงกับอาการที่เกิดขึ้นกับตัวท่านมากที่สุดในช่วงเวลา 1 เดือนที่ผ่านมา</p>
                        <br>
                    </div>
                </div>

                {!! Form::open(['action' => 'KneeFormController@calculate']) !!}
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                                        <div class="form-group">
                                            <p><B>1.&nbsp;ให้ท่านบรรยายลักษณะอาการเจ็บปวดเข่าของท่าน</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '4') }} &nbsp;ไม่มีอาการปวดเข่า
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '3') }} &nbsp;อาการปวดลึก ๆ ที่เข่าเล็กน้อย เฉพาะเวลาขยับตัวหรืออยู่ในบางท่าเท่านั้น 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '2') }} &nbsp;หลังใช้งานนาน อาการปวดเข่ามากขึ้น พักแล้วดีขึ้น เป็น ๆ หาย ๆ
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '1') }} &nbsp;อาการปวดเพิ่มมากขึ้น ปวดนานขึ้น
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '0') }} &nbsp;อยู่เฉย ๆ ก็ปวดมาก ขยับไม่ได้
                                        </div>

                                        <div class="form-group">
                                            <br>
                                            <p><B>2.&nbsp;ท่านมีปัญหาเรื่องเข่าในการทำกิจวัตรประจำวันด้วยตัวเอง หรือไม่ เช่น การยืนอาบน้ำ เป็นต้น</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '4') }} &nbsp;ไม่มีปัญหา 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '3') }} &nbsp;มีอาการปวดเข่า/ข้อเข่าฝืด/ตึงขัดเล็กน้อย แต่น้อยมาก 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '2') }} &nbsp;มีอาการปวดเข่า/ข้อเข่าฝืด/ตึงขัดเล็กน้อย บ่อยครั้ง
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '1') }} &nbsp;เริ่มมีปัญหา ทำด้วยความยากลำบาก
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '0') }} &nbsp;ไม่สามารถทำได้ 
                                        </div>

                                        <div class="form-group">
                                            <br>
                                            <p><B>3.&nbsp;ท่านมีปัญหาเรื่องเข่า เมื่อก้าวขึ้นลงรถ หรือรถประจำทางหรือไม่</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '4') }} &nbsp;ไม่มีอาการใด ๆ 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '3') }} &nbsp;มีอาการปวดเข่า/ข้อเข่าฝืดเล็กน้อย แต่ก้าวขึ้นลงได้ปกติ 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '2') }} &nbsp;มีอาการปวดเข่า/ข้อเข่าฝืด ก้าวขึ้นลงได้ช้ากว่าปกติ
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '1') }} &nbsp;มีอาการปวดเข่ามาก/ข้อเข่าฝืด ก้าวขึ้นลงได้ด้วยความลำบาก
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '0') }} &nbsp;ไม่สามารถทำได้ 
                                        </div>

                                        <div class="form-group">
                                            <br>
                                            <p><B>4.&nbsp;ระยะเวลานานเท่าไรที่ท่านเดินได้มากที่สุดก่อนที่ท่านจะมีอาการปวดเข่า</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '4') }} &nbsp;เดินได้เกิน 1 ชั่วโมง โดยไม่มีอาการอะไร 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '3') }} &nbsp;เดินได้ 16-60 นาที เริ่มมีอาการปวด 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '2') }} &nbsp;เดินได้เพียง 5-15 นาที เริ่มมีอาการปวด
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '1') }} &nbsp;เดินได้แค่รอบบ้านเท่านั้น เริ่มมีอาการปวด
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '0') }} &nbsp;ทำไม่ได้และเดินไม่ไหว 
                                        </div>

                                        <div class="form-group">
                                            <br>
                                            <p><B>5.&nbsp;หลังทานอาหารเสร็จ ในขณะที่ลุกขึ้นจากเก้าอี้นั่ง เข่าของท่านมีอาการอย่างไร</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '4') }} &nbsp;ไม่มีอาการ 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '3') }} &nbsp;มีอาการปวดเข่า/ข้อเข่าฝืดเล็กน้อย 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '2') }} &nbsp;มีอาการปวดเข่า/ข้อเข่าฝืดปานกลาง
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '1') }} &nbsp;มีอาการปวดเข่ามาก/ข้อเข่าฝืด ลุกขึ้นยืนได้ด้วยความลำบาก
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '0') }} &nbsp;ปวดมาก ไม่สามารถลุกขึ้นได้ 
                                        </div>

                                        <div class="form-group">
                                            <br>
                                            <p><B>6.&nbsp;ท่านต้องเดินโยกตัว (เดินกระโผลกกระเผลก) เพราะอาการที่เกิดจากเข่าของท่าน หรือไม่</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch6', '4') }} &nbsp;ไม่เคย 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch6', '3') }} &nbsp;ในช่วง 2-3 ก้าวแรก ที่ออกเดินเท่านั้น 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch6', '2') }} &nbsp;เป็นบางครั้ง
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch6', '1') }} &nbsp;เป็นส่วนใหญ่
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch6', '0') }} &nbsp;ตลอดเวลา 
                                        </div>

                                        <div class="form-group">
                                            <br>
                                            <p><B>7.&nbsp;ท่านสามารถนั่งลงคุกเข่าและลุกขึ้นได้หรือไม่</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch7', '4') }} &nbsp;ลุกได้ง่าย 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch7', '3') }} &nbsp;ลุกได้ ลำบากเล็กน้อย 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch7', '2') }} &nbsp;ลุกได้แต่ยากขึ้น
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch7', '1') }} &nbsp;ลุกได้แต่ยากลำบากมาก
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch7', '0') }} &nbsp;ลุกไม่ไหว 
                                        </div>

                                        <div class="form-group">
                                            <br>
                                            <p><B>8.&nbsp;ท่านเคยมีปัญหาปวดเข่าในขณะที่นอนตอนกลางคืนหรือไม่</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch8', '4') }} &nbsp;ไม่เคย 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch8', '3') }} &nbsp;ใน 1 เดือนมี 1-2 ครั้ง 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch8', '2') }} &nbsp;บางคืน
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch8', '1') }} &nbsp;ส่วนมาก
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch8', '0') }} &nbsp;ทุกคืน 
                                        </div>
  
                                        <div class="form-group">
                                            <br>
                                            <p><B>9.&nbsp;ในขณะที่ท่านทำงาน/ทำงานบ้าน ท่านมีอาการปวดเข่าหรือไม่</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch9', '4') }} &nbsp;ไม่มี 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch9', '3') }} &nbsp;น้อยมาก 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch9', '2') }} &nbsp;บางครั้ง
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch9', '1') }} &nbsp;ส่วนมาก
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch9', '0') }} &nbsp;ตลอดเวลา 
                                        </div>

                                        <div class="form-group">
                                            <br>
                                            <p><B>10.&nbsp;ท่านเคยมีความรู้สึกว่าเข่าของท่านทรุดลงทันทีหรือหมดแรงทันทีจนตัวทรุดลงหรือไม่</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch10', '4') }} &nbsp;ไม่เคย 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch10', '3') }} &nbsp;ในช่วงแรกที่ก้าวเดิน เท่านั้น 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch10', '2') }} &nbsp;บางครั้ง
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch10', '1') }} &nbsp;ส่วนมาก
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch10', '0') }} &nbsp;ตลอดเวลา 
                                        </div>

                                        <div class="form-group">
                                            <br>
                                            <p><B>11.&nbsp;ท่านสามารถไปซื้อของใช้ต่าง ๆ ได้ด้วยตัวท่านเองหรือไม่</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch11', '4') }} &nbsp;ได้เป็นปกติ 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch11', '3') }} &nbsp;ไปได้ เริ่มมีอาการปวดเข่า/ตึงเข่าเล็กน้อย 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch11', '2') }} &nbsp;ไปได้ เริ่มมีอาการปวดเข่า/ตึงเข่ามากขึ้น
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch11', '1') }} &nbsp;พอไปได้ แต่ด้วยความยากลำบากมาก 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch11', '0') }} &nbsp;ไปไม่ไหว 
                                        </div>

                                        <div class="form-group">
                                            <br>
                                            <p><B>12.&nbsp;ท่านสามารถเดินลงบันไดได้หรือไม่</B>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch12', '4') }} &nbsp;เดินลงได้ เป็นปกติ 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch12', '3') }} &nbsp;เดินลงได้ เริ่มมีอาการปวดเข่า/ตึงเข่าเล็กน้อย 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch12', '2') }} &nbsp;เดินลงได้ เริ่มมีอาการปวดเข่า/ตึงเข่ามากขึ้น
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch12', '1') }} &nbsp;เดินลงได้ด้วยความยากลำบากมาก 
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch12', '0') }} &nbsp;เดินลงไม่ได้ 
                                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-8">
                            <div class="form-group">
                            <br>
                            {!! Form::submit('ตรวจคะแนน', array('class'=>'btn btn-primary btn-lg btn-block')) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}

                <!-- footer starts here -->
                <footer class="footer">
                    <div class="row"> 
                         <div class="col-md-10 col-md-offset-1">
                            <br><br>
                            <p>&copy; แหล่งอ้างอิง: Dawson J, Fitzpatrick R, Murray D, Carr A. Questionnaire on the perceptions of patients about total knee replacement. J Bone Joint Surg Br. 1998 Jan;80(1):63-9.
                            <!-- <a href="http://www.orthopaedicscore.com/scorepages/oxford_knee_score.html"><U>Link</U></span></a></p> -->
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


				


