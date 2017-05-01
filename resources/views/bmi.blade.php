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
                    <div class="col-md-12">
                        <h1><B>&nbsp; คำนวณค่าดัชนีมวลกาย (BMI)</B></h1>
                        <hr>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div style="background: #b1fed6; padding: 10px 0px 10px 20px; border:5px solid #f3f3f3;">
                            <p><B> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ค่าดัชนีมวลกาย (Body Mass Index: BMI)</B> เป็นค่าที่ได้จากการคำนวณ ใช้ชี้วัดความสมดุลของ<br>น้ำหนักตัวและส่วนสูง ซึ่งจะสามารถระบุรูปร่างของบุคคลนั้นได้ว่าอยู่ในระดับใด ตั้งแต่อ้วนมาก ไปจนถึงผอมเกินไป ซึ่งค่าที่ได้จากการคำนวณ ทางการแพทย์สามารถใช้บ่งบอกความเสี่ยงในการเกิดโรคเบาหวาน ความดันโลหิตสูง ไขมันในเลือด ระบบหัวใจ รวมไปถึงมะเร็งบางชนิดได้</p>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                    <div style="background: #537ba3; padding: 10px 0px 10px 20px; border:3px solid #f3f3f3;">
                        <font color="#fff">
                        <p><B>สูตรคำนวณ BMI</B> = น้ำหนักตัว (กิโลกรัม) / (ส่วนสูง (เมตร) ยกกำลังสอง)</p></font>
                    </div>
                </div>

                <div class="row">
                   {!! Form::open(['action' => 'BmiController@calculate']) !!}
                            
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <div class="input-group-lg">
                            <br><br>
                            <p><B>{!! Form::label('น้ำหนัก (กิโลกรัม)') !!}
                            {!! Form::number('weight', null, array('required','placeholder'=>'น้ำหนัก','min'=>'1')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <div class="input-group-lg">
                            <p><B>{!! Form::label('ส่วนสูง (เซนติเมตร)') !!}
                            {!! Form::number('height', null, array('required','placeholder'=>'ส่วนสูง','min'=>'1')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <br>
                            {!! Form::submit('คำนวณ', array('class'=>'btn btn-primary btn-lg btn-block')) !!}
                            <br><br>
                        </div>
                    </div>

                </div>
                <br><br>

                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <div style="background: #c9ffe9; padding: 5px 0px 20px 20px; border:5px solid #f3f3f3;">
                            <h3><B>ตารางการแปลผล</B></h3>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <td><p><B>BMI กก./(ม.)<sup>2</sup></B></p></td>
                                    <td><p><B>อยู่ในเกณท์</B></p></td>
                                </tr>
                            </thead>
                        <tbody>
       
                            <tr>
                                <td><p>น้อยกว่า 18.50</p></td> 
                                <td><p>น้ำหนักน้อย / ผอม</p></td>
                            </tr>
                            <tr>
                                <td><p>ระหว่าง 18.50 - 22.90</p></td>
                                <td><p>น้ำหนักปกติ / สมส่วน</p></td>
                            </tr>
                            <tr>
                                <td><p>ระหว่าง 23 - 24.90</p></td>
                                <td><p>น้ำหนักเกิน / ท้วม</p></td>
                            </tr>
                            <tr>
                                <td><p>ระหว่าง 25 - 29.90</p></td>
                                <td><p>อ้วน </p></td>
                            </tr>
                            <tr>
                                <td><p>มากกว่า 30</p></td>
                                <td><p>อ้วนมาก </p></td>   
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            {!! Form::close() !!}

            <!-- footer starts here -->
                <footer class="footer">
                    <div class="row"> 
                        <div class="col-md-10 col-md-offset-1">
                            <br><br>
                            <p>&copy; แหล่งอ้างอิง: กองออกกำลังกาย เพื่อสุขภาพ กรมอนามัย กระทรวงสาธารณสุข</p>
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
</html>
