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
        <div style="color: white; padding: 1px 50px 200px 50px; background: #025a2c; font-size: 84px;">
            <!-- <div class="text-center"> -->
                <!-- <h4><font style="color: #fff">Welcome</font></h4> -->
                <!-- <p>วันที่ {{ date("d/m/Y" )}} &nbsp; เวลา {{ date("H:i:s") }}</p> -->
            <!-- </div> -->
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <br>
                        <div><img src="{{ asset('assets/img/background.png') }}" width="450" height="450"></div>
                    </div>

                    <div class="col-md-5 col-md-offset-2">
                        <div class="text-center">
                        <br><br>
                        <B>ยินดีต้อนรับ</B>
                        <br>
                            <a href="{{ url('/login') }}"><font color="#fff" size="10"><B>เข้าสู่หน้าเว็บไซต์</B></font></a> 
                        </div>
                    </div>
                </div>  
            </div>
        </div>
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

