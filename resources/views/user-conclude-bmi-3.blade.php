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
                                    <a href="{{ url('user/dhamma') }}"><font size="4">บทความธรรมะ</font></a>
                                </li>
                            </ul>
                    </li>
                        
                    <li>
                        <a class="active-menu" href="{{ url('user/bmi') }}"><i class="fa fa-calculator fa-2x"></i><font size="5">ค่าดัชนีมวลกาย</font></a>
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
                <div class="row">
                    <div class="col-md-7">
                        <h2><B>&nbsp; ผลการคำนวณค่าดัชนีมวลกาย (BMI)</B></h2>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <br>
                        <a href="{{url ('user/bmi')}}" class="btn btn-success btn-lg" type="button"><span class="fa fa-arrow-left fa-2x"> กลับสู่หน้าหลัก</span></a>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <br>
                        <div style="background: #537ba3;
                            padding: 20px 0px 30px 20px; border:3px solid #f3f3f3;">
                                <font size="5"; color="#fff"><B>BMI = <B>{{$bmi}}</B></font>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <br>
                        <h3><B>การแปลผล</B></h3>
                        <div style="background: #d0f2fe;
                            padding: 10px 0px 10px 0px; border:1px solid #f3f3f3;">
                            <p>&nbsp;&nbsp;&nbsp;ค่าดัชนีมวลกายมีค่าระหว่าง 23 - 24.90 หมายถึง  น้ำหนักเกิน หรือรูปร่างท้วม</p>
                        </div>
                            <br>
                            <h3><B>คำแนะนำ</B></h3>
                        <div style="background: #c1ffc1;
                            padding: 10px 0px 10px 10px; border:1px solid #f3f3f3;">
                            <p>&nbsp;&nbsp;&nbsp;1. ควรควบคุมอาหาร โดยลดปริมาณอาหารหรือปรับเปลี่ยนอาหารจากที่ให้พลังงานมากเป็นอาหารที่ให้พลังงานน้อย ทั้งนี้พลังงานที่ได้รับไม่ควรต่ำกว่า 1200 กิโลแคลอรีต่อวัน โดยลดอาหารไขมัน/ เนื้อสัตว์ อาหารผัด/ทอด ขนมหวาน เครื่องดื่มที่ใส่น้ำตาล แอลกอฮอล์ แต่ต้องกินอาหารให้หลากหลายในสัดส่วนที่เหมาะสม กินข้าวและแป้ง รวมทั้งเมล็ดธัญพืชอื่น ๆ ไม่น้อยกว่าวันละ 6 ทัพพี กินผัก รวมทั้งเมล็ดถั่ว ผลไม้ ไม่ต่ำกว่าวันละ 5 ส่วน หรือครึ่งกิโลกรัม เพื่อลดพลังงานเข้า ร่างกายจะได้ใช้พลังงานส่วนเกินที่สะสมอยู่ในรูปไขมันแทน
                            <br><br>
                            &nbsp;&nbsp;&nbsp;2. ควรเคลื่อนไหวและออกกำลังกายแบบแอโรบิกอย่างสม่ำเสมอทุกวัน หรือเกือบทุกวันอย่างน้อยให้เหนื่อยพอควร โดยหายใจกระชั้นขึ้น สะสมอย่างน้อยวันละ 30 นาที อาจแบ่งเป็นวันละ 2 - 3 ครั้งก็ได้ เช่น เดินเร็ว ถีบจักรยาน เป็นต้น หากยังไม่เคยออกกำลังกายเริ่มแรกควร ออกกำลังเบา ๆ ที่ง่ายที่สุดคือ การเดิน ใช้เวลาน้อย ๆ ก่อน จากนั้นค่อย ๆ เพิ่มเวลาขึ้นในแต่ละสัปดาห์ โดยยังไม่เพิ่มความหนัก เมื่อร่างกายปรับตัวได้จึงค่อยเพิ่มความหนัก หรือความเหนื่อยตามที่ต้องการ และเพิ่มการเคลื่อนไหวร่างกายให้มากขึ้นในชีวิตประจำวัน เพื่อให้มีการใช้พลังงานเพิ่มขึ้น อย่างน้อยวันละ 200 - 300 กิโลแคลอรี
                            <br><br>
                            &nbsp;&nbsp;&nbsp;3. ควรฝึกความแข็งแรงของกล้ามเนื้อ ด้วยการฝึกกายบริหารหรือยกน้ำหนัก จะช่วยเสริมให้ร่างกายมีการใช้พลังงานเพิ่มมากขึ้น ทำให้ไขมันลดลง
                            </p>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
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


                


