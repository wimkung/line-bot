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
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('member/history') }}"><font size="4"> ประวัติการทำแบบประเมิน</font></a>
                                </li>
                            </ul>
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
                    <div class="col-md-6">
                        <h2><B>&nbsp; แบบประเมินความเครียด (ST-5)</B></h2>
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
                    <br>
                    <div style="background: #d0f2fe; padding: 10px 0px 10px 20px; border:2px solid #f3f3f3;">
                        <p><B> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แบบประเมินความเครียด (ST-5)</B> เป็นแบบวัดความเครียด 5 ข้อ เพื่อประเมินอาการหรือความรู้สึกที่เกิดขึ้นในระยะ 2 - 4 สัปดาห์ โดยมีรายละเอียด ดังนี้
                        <br><br>แบ่งการประเมินเป็น 4 ระดับ คือ 
                        <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แทบไม่มี (0 คะแนน)
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เป็นครั้งคราว (1 คะแนน) 
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;บ่อย ๆ ครั้ง (2 คะแนน) 
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เป็นประจำ (3 คะแนน) 

                        <br><br>การแปลผลคะแนนรวม ระหว่าง 0 – 15 คะแนน จำแนกภาวะเครียดเป็น 3 กลุ่ม คือ 
                        <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กลุ่มที่ไม่มีความเครียด (น้อยกว่า 4 คะแนน) 
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สงสัยว่ามีปัญหาความเครียด (5 – 7 คะแนน) 
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;น่าจะป่วยด้วยความเครียด (มากกว่าหรือเท่ากับ 8 คะแนน) </p>
                    </div>
                        <br><br>
                    <div style="background: #537ba3; padding: 10px 0px 10px 20px; border:3px solid #f3f3f3;">
                        <font color="#fff"><p><B>หมายเหตุ :&nbsp;</B>  
                            ระดับอาการแทบไม่มี&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หมายถึง&nbsp;&nbsp;&nbsp;&nbsp;ไม่มีอาการหรือเกิดอาการเพียง 1 ครั้ง <br>

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ระดับอาการเป็นบางครั้ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หมายถึง&nbsp;&nbsp;&nbsp;&nbsp;มีอาการมากกว่า 1 ครั้ง แต่ไม่บ่อย <br>

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ระดับอาการบ่อยครั้ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หมายถึง&nbsp;&nbsp;&nbsp;&nbsp;มีอาการเกิดขึ้นเกือบทุกวัน <br>

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ระดับอาการเป็นประจำ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หมายถึง&nbsp;&nbsp;&nbsp;&nbsp;มีอาการเกิดขึ้นทุกวัน</p></font>
                        </div>

                        <br><br>
                        <p><B>คำชี้แจง :</B>
                        คำถามต่อไปนี้จะถามถึงประสบการณ์ของท่านในช่วง ระยะ 2-4 สัปดาห์ที่ผ่านมา ให้ท่านสำรวจตัวท่านเองและประเมินเหตุการณ์ อาการหรือความคิดเห็นและความรู้สึกของท่านว่าอยู่ในระดับใด</p>
                    </div>
                </div>

            {!! Form::open(['action' => 'StressFormController@calculate']) !!}
            <!-- {!! Form::open(['url' => 'member/stress/form', 'method' => 'post']) !!} -->

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">                    
                                <div class="form-group">
                                    <br>
                                    <p><B>1.&nbsp;มีปัญหาการนอน นอนไม่หลับหรือนอนมาก</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '0') }} &nbsp;แทบไม่มี
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '1') }} &nbsp;เป็นบางครั้ง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '2') }} &nbsp;บ่อยครั้ง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '3') }} &nbsp;เป็นประจำ
                                </div>
                                

                                <div class="form-group">
                                    <br>
                                    <p><B>2.&nbsp;มีสมาธิน้อยลง</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '0') }} &nbsp;แทบไม่มี
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '1') }} &nbsp;เป็นบางครั้ง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '2') }} &nbsp;บ่อยครั้ง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '3') }} &nbsp;เป็นประจำ
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>3.&nbsp;หงุดหงิด/กระวนกระวาย/ว้าวุ่นใจ</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '0') }} &nbsp;แทบไม่มี
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '1') }} &nbsp;เป็นบางครั้ง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '2') }} &nbsp;บ่อยครั้ง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '3') }} &nbsp;เป็นประจำ
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>4.&nbsp;รู้สึกเบื่อ เซ็ง</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '0') }} &nbsp;แทบไม่มี
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '1') }} &nbsp;เป็นบางครั้ง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '2') }} &nbsp;บ่อยครั้ง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '3') }} &nbsp;เป็นประจำ
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>5.&nbsp;ไม่อยากพบปะผู้คน</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '0') }} &nbsp;แทบไม่มี
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '1') }} &nbsp;เป็นบางครั้ง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '2') }} &nbsp;บ่อยครั้ง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '3') }} &nbsp;เป็นประจำ
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
                            <p>&copy; แหล่งอ้างอิง: กรมสุขภาพจิต กระทรวงสาธารณสุข (Department of MentalHealth, Ministry of Public Health.)</p>
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


				


