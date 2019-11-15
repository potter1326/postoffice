<!DOCTYPE html>
<html>
<head>
    <title>บันทึกภาพรับพัสดุ</title>
    <script type="text/javascript" src="js_cam/jquery.min.js"></script>
    <script type="text/javascript" src="js_cam/webcam.min.js"></script>
    <link rel="stylesheet" href="js_cam/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body>
<?php
$id_pc=$_GET[id_pc];
?>
<div class="container">
    <h1 class="text-center">ถ่ายภาพรับพัสดุ</h1>
   
    <form method="POST" action="storeImage.php">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="กดที่นี่เพื่อถ่ายภาพ" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
                <input type="hidden" name="id_pc" value="<?php echo $id_pc; ?>">
            </div>
            <div class="col-md-6">
                <div id="results">ภาพที่ถ่ายจะแสดงที่นี่</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success">บันทึก</button>
            </div>
        </div>
    </form>
</div>
  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
 
</body>
</html>