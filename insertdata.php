<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <?php include 'navber.php'; ?>
</head>

<body>

  <!-- หน้าเพิ่มข้อมูล
1. สามารถเพิ่มข้อมูลแหล่งท่องเที่ยวได้โดยมีพารามิเตอร์ดังนี้
1.1. ชื่อแหล่งท่องเที่ยว (Textbox)
1.2. รายละเอียดแหล่งท่องเที่ยว (Textarea)
1.3. URL รูปภาพหน้าปก (Textbox)
1.4. ประเภทแหล่งท่องเที่ยว (Dropdown)
1.5. จังหวัด (Dropdown)
2. บันทึกข้อมูลทดสอบมาอย่างน้อย 20 รายการ
3. เมื่อเพิ่มข้อมูลสำเร็จให้ลิงค์กลับไปยังหน้าแสดงข้อมูลแหล่งท่องเที่ยว
4. มีปุ่มสำหรับกลับไปยังหน้าแสดงข้อมูลแหล่งท่องเที่ยวได้ -->

  <?php

    include 'contr.php';
     $ck = "Fill in the blanks completely."; 

  if (isset($_POST['submit'])) {
      if(!empty($_POST['nmbx']) && !empty($_POST['nmare']) && !empty($_POST['urim']) && !empty($_POST['ty']) && !empty( $_POST['pro'])){

    $nm1 = $_POST['nmbx'];
    $nmare = $_POST['nmare'];
    $urim = $_POST['urim'];
    $ty = $_POST['ty'];
    $pro = $_POST['pro'];

    $ss = new contr();
    $ss->connect();

    $ss->insert($nm1,$nmare, $urim,$ty,$pro,$ss->cc);
  }else{
    $ck = "Complete information.";
  }
}

  ?>
  <style>
    .fm-in{
          margin-top: 30px;
        
          height: 400px;
          width: 700px;
          margin-left: 15%;
    }
    form{
      margin-top: 30px;
      font-size: 16px;
    }
    .sb{color: white;background-color: green;}
    .sb1{color: white;background-color:red;}
    select{color: black;margin-top: 40px;}

   
    @media screen and (max-width : 980px) {
        .container{
        width: 500px;
     }
     .fm-in{
      width: 500px;
     }
  }
    @media screen and (max-width : 668px) {
        .container{
        width: 400px;
         }
         .fm-in{
      width: 300px;
     }
    }
    

  </style>
  
  <div class="container">
    <div class="row">
    <h2>Insert Data form database</h2>
    <hr>
      <div class="col-sm-4 fm-in">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <label>ชื่อแหล่งท่องเที่ยว </label>
    <input type="text" class="form-control" name="nmbx" />
    <label> รายละเอียดแหล่งท่องเที่ยว </label>
    <input type="Textarea" class="form-control" name="nmare" />
    <label>URL รูปภาพหน้าปก </label>
    <input type="Text" class="form-control" name="urim" />
    <!-- ประเภทแหล่งท่องเที่ยว (Dropdown) -->
    <label for="cars">ประเภทแหล่งท่องเที่ยว</label>
    <select name="ty" id="cars">
    <option value=""></option>
      <option value="ทะเล">ทะเล</option>
      <option value="ทะเล">ตลาดแหล่งคนเดิน</option>
      <option value="ทะเล">วัด</option>
      <option value="ภูเขา">ภูเขา</option>
      <option value="น้ำตก">น้ำตก</option>
      <option value="ธรรมชาติ">ธรรมชาติ</option>
    </select>
    <!-- จังหวัด (Dropdown) -->
    <label for="cars">จังหวัด</label>
    <select name="pro" id="cars">
      <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
      <option value="กระบี่">กระบี่ </option>
      <option value="กาญจนบุรี">กาญจนบุรี </option>
      <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
      <option value="กำแพงเพชร">กำแพงเพชร </option>
      <option value="ขอนแก่น">ขอนแก่น</option>
      <option value="จันทบุรี">จันทบุรี</option>
      <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
      <option value="ชัยนาท">ชัยนาท </option>
      <option value="ชัยภูมิ">ชัยภูมิ </option>
      <option value="ชุมพร">ชุมพร </option>
      <option value="ชลบุรี">ชลบุรี </option>
      <option value="เชียงใหม่">เชียงใหม่ </option>
      <option value="เชียงราย">เชียงราย </option>
      <option value="ตรัง">ตรัง </option>
      <option value="ตราด">ตราด </option>
      <option value="ตาก">ตาก </option>
      <option value="นครนายก">นครนายก </option>
      <option value="นครปฐม">นครปฐม </option>
      <option value="นครพนม">นครพนม </option>
      <option value="นครราชสีมา">นครราชสีมา </option>
      <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
      <option value="นครสวรรค์">นครสวรรค์ </option>
      <option value="นราธิวาส">นราธิวาส </option>
      <option value="น่าน">น่าน </option>
      <option value="นนทบุรี">นนทบุรี </option>
      <option value="บึงกาฬ">บึงกาฬ</option>
      <option value="บุรีรัมย์">บุรีรัมย์</option>
      <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
      <option value="ปทุมธานี">ปทุมธานี </option>
      <option value="ปราจีนบุรี">ปราจีนบุรี </option>
      <option value="ปัตตานี">ปัตตานี </option>
      <option value="พะเยา">พะเยา </option>
      <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
      <option value="พังงา">พังงา </option>
      <option value="พิจิตร">พิจิตร </option>
      <option value="พิษณุโลก">พิษณุโลก </option>
      <option value="เพชรบุรี">เพชรบุรี </option>
      <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
      <option value="แพร่">แพร่ </option>
      <option value="พัทลุง">พัทลุง </option>
      <option value="ภูเก็ต">ภูเก็ต </option>
      <option value="มหาสารคาม">มหาสารคาม </option>
      <option value="มุกดาหาร">มุกดาหาร </option>
      <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
      <option value="ยโสธร">ยโสธร </option>
      <option value="ยะลา">ยะลา </option>
      <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
      <option value="ระนอง">ระนอง </option>
      <option value="ระยอง">ระยอง </option>
      <option value="ราชบุรี">ราชบุรี</option>
      <option value="ลพบุรี">ลพบุรี </option>
      <option value="ลำปาง">ลำปาง </option>
      <option value="ลำพูน">ลำพูน </option>
      <option value="เลย">เลย </option>
      <option value="ศรีสะเกษ">ศรีสะเกษ</option>
      <option value="สกลนคร">สกลนคร</option>
      <option value="สงขลา">สงขลา </option>
      <option value="สมุทรสาคร">สมุทรสาคร </option>
      <option value="สมุทรปราการ">สมุทรปราการ </option>
      <option value="สมุทรสงคราม">สมุทรสงคราม </option>
      <option value="สระแก้ว">สระแก้ว </option>
      <option value="สระบุรี">สระบุรี </option>
      <option value="สิงห์บุรี">สิงห์บุรี </option>
      <option value="สุโขทัย">สุโขทัย </option>
      <option value="สุพรรณบุรี">สุพรรณบุรี </option>
      <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
      <option value="สุรินทร์">สุรินทร์ </option>
      <option value="สตูล">สตูล </option>
      <option value="หนองคาย">หนองคาย </option>
      <option value="หนองบัวลำภู">หนองบัวลำภู </option>
      <option value="อำนาจเจริญ">อำนาจเจริญ </option>
      <option value="อุดรธานี">อุดรธานี </option>
      <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
      <option value="อุทัยธานี">อุทัยธานี </option>
      <option value="อุบลราชธานี">อุบลราชธานี</option>
      <option value="อ่างทอง">อ่างทอง </option>
      <option value="อื่นๆ">อื่นๆ</option>
    </select>



    <!--4. มีปุ่มสำหรับบันทึก-->
    <p><?php echo $ck ;?></p>
    <input type="submit" name="submit" class="sb" value="Submit"></input>
    <input type="button" class="sb1"  onclick="location.href='index.php';"  value="ย้อนกลับ" />
    <!--4. มีปุ่มสำหรับกลับไปยังหน้าแสดงข้อมูลแหล่งท่องเที่ยวได้ -->
  </form>
      </div>
    </div>
  </div>
 

</body>
<!-- มีปุ่มสำหรับเพิ่มข้อมูลแหล่งท่องเที่ยวได้ -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>