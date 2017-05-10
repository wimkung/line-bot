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
                        <h2><B>&nbsp; แบบประเมินความสามารถในการทำกิจวัตรประจำวัน</B></h2>
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
                    <div style="background: #537ba3; padding: 10px 0px 10px 20px; border:3px solid #f3f3f3;">
                        <font color="#fff">
                        <p><B> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แบบประเมินความสามารถในการทำกิจวัตรประจำวัน (Barthel Activities of Daily Living : ADL)</B> เป็นการจำแนกผู้สูงอายุตามกลุ่มศักยภาพเพื่อให้เหมาะสมกับการดำเนินงานดูแลส่งเสริมสุขภาพผู้สูงอายุระยะยาวครอบคลุมกลุ่มเป้าหมายตามกลุ่มศักยภาพ<br></p></font>
                    </div>

                    <br>
                    <div style="background: #d0f2fe; padding: 10px 0px 10px 20px; border:2px solid #f3f3f3;">
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กรมอนามัย กระทรวงสาธารณสุขร่วมกับภาคีเครือข่ายและผู้ทรงคุณวุฒิ  ได้ประยุกต์จากเกณฑ์การประเมินความสามารถในการทำกิจวัตรประจำวัน  ดัชนีบาร์เธลเอดีแอล (Barthel  ADL index) ซึ่งมีคะแนนเต็ม 20 คะแนน และได้แบ่งผู้สูงอายุออกเป็น 3 กลุ่ม ดังนี้
  
                        <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>ผู้สูงอายุกลุ่มที่ 1</B>&nbsp;&nbsp;&nbsp;ผู้สูงอายุที่พึ่งตนเองได้ ช่วยเหลือผู้อื่น ชุมชนและสังคมได้ (กลุ่มติดสังคม) มีผลรวมคะแนน ADL ตั้งแต่  12  คะแนนขึ้นไป<br>  
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>ผู้สูงอายุกลุ่มที่ 2</B>&nbsp;&nbsp;&nbsp;ผู้สูงอายุที่ดูแลตนเองได้บ้าง ช่วยเหลือตนเองได้บ้าง (กลุ่มติดบ้าน) มีผลรวมคะแนน ADL อยู่ในช่วง 5-11 คะแนน<br>

                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>ผู้สูงอายุกลุ่มที่ 3</B>&nbsp;&nbsp;&nbsp;ผู้สูงอายุกลุ่มที่พึ่งตนเองไม่ได้ ช่วยเหลือตนเองไม่ได้ พิการ หรือทุพพลภาพ (กลุ่มติดเตียง) มีผลรวมคะแนน ADL อยู่ในช่วง 0-4 คะแนน</p>
                    </div>
                        <br><br><br>
                        <p><B>คำชี้แจง :</B>
                        ให้ท่านสำรวจตัวท่านเองและประเมินเหตุการณ์ อาการหรือความคิดเห็นและความรู้สึกของท่านว่าอยู่ในระดับใด</p>
                        <br>
                    </div>
                </div>

            {!! Form::open(['action' => 'ADLFormController@calculate']) !!}
            <!-- {!! Form::open(['url' => 'member/stress/form', 'method' => 'post']) !!} -->

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">                    
                                <div class="form-group">
                                    <p><B>1.&nbsp;รับประทานอาหารเมื่อเตรียมสำรับไว้ให้เรียบร้อยต่อหน้า</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '0') }} &nbsp;ทำไม่ได้
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '1') }} &nbsp;ทำเองได้บ้างแต่ต้องมีคนช่วย 
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch1', '2') }} &nbsp;ทำได้เอง
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>2.&nbsp;ล้างหน้า หวีผม แปรงฟัน โกนหนวด ในระยะเวลา 24 -  28 ชั่วโมงที่ผ่านมา</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '0') }} &nbsp;ต้องการความช่วยเหลือ
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch2', '1') }} &nbsp;ทำเองได้
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>3.&nbsp;ลุกนั่งจากที่นอน หรือจากเตียงไปยังเก้าอี้</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '0') }} &nbsp;ทำไม่ได้
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '1') }} &nbsp;ต้องการความช่วยเหลืออย่างมาก
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '2') }} &nbsp;ต้องการความช่วยเหลือบ้าง 
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch3', '3') }} &nbsp;ทำได้เอง
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>4.&nbsp;การใช้ห้องน้ำ ห้องส้วม</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '0') }} &nbsp;ช่วยตัวเองไม่ได้
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '1') }} &nbsp;ทำเองได้บ้าง
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch4', '2') }} &nbsp;ช่วยตัวเองได้ดี  
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>5.&nbsp;การเคลื่อนที่ภายในห้องหรือบ้าน</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '0') }} &nbsp;เคลื่อนที่ไปไหนไม่ได้
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '1') }} &nbsp;ต้องใช้รถเข็นช่วยตัวเองให้เคลื่อนที่ได้เอง (ไม่ต้องมีคนเข็นให้)
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '2') }} &nbsp;เดินหรือเคลื่อนที่โดยมีคนช่วย 
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch5', '3') }} &nbsp;เดินหรือเคลื่อนที่ได้เอง  
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>6.&nbsp;การสวมใส่เสื้อผ้า</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch6', '0') }} &nbsp;ต้องมีคนสวมใส่ให้ 
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch6', '1') }} &nbsp;ช่วยตัวเองได้ประมาณร้อยละ 50 ที่เหลือต้องมีคนช่วย
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch6', '2') }} &nbsp;ทำได้เอง  
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>7.&nbsp;การขึ้นลงบันได 1 ชั้น</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch7', '0') }} &nbsp;ไม่สามารถทำได้ 
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch7', '1') }} &nbsp;ต้องการคนช่วย
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch7', '2') }} &nbsp;ขึ้นลงได้เอง (ถ้าต้องใช้เครื่องช่วยเดิน เช่น walker จะต้องเอาขึ้นลงได้ด้วย)  
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>8.&nbsp;การอาบน้ำ</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch8', '0') }} &nbsp;ต้องมีคนช่วยหรือทำให้ 
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch8', '1') }} &nbsp;อาบน้ำเองได้
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>9.&nbsp;การกลั้นการถ่ายอุจจาระในระยะ 1 สัปดาห์ที่ผ่านมา</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch9', '0') }} &nbsp;กลั้นไม่ได้ 
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch9', '1') }} &nbsp;กลั้นไม่ได้บางครั้ง (เป็นน้อยกว่า 1 ครั้งต่อสัปดาห์)
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch9', '2') }} &nbsp;กลั้นได้เป็นปกติ
                                </div>

                                <div class="form-group">
                                    <br>
                                    <p><B>10.&nbsp;การกลั้นปัสสาวะในระยะ 1 สัปดาห์ที่ผ่านมา</B>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch10', '0') }} &nbsp;กลั้นไม่ได้ 
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch10', '1') }} &nbsp;กลั้นไม่ได้บางครั้ง (เป็นน้อยกว่าวันละ 1 ครั้ง)
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ Form::radio('ch10', '2') }} &nbsp;กลั้นได้เป็นปกติ
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
</html>


				


