<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<?php include 'navber.php'; ?>
<?php include 'header.php'; ?>

<body>
    <!-- พัฒนาระบบบันทึกและแสดงข้อมูลแหล่งท่องเที่ยว โดยมีหน้าจอและการทำงานดังนี 
 หน้าแสดงข้อมูลแหล่งท่องเที่ยว
1. สามารถแสดงข้อมูลรูปภาพแหล่งท่องเที่ยว, ชื่อแหล่งท่องเที่ยวได้
2. สามารถแสดงผลแบบ Responsive ได้
3. แสดงข้อมูลแหล่งท่องเที่ยวแยกตามภูมิภาค
4. สามารถซ่อน/แสดงข้อมูลแหล่งท่องเที่ยวแยกตามภูมิภาค
5. มีปุ่มสำหรับเพิ่มข้อมูลแหล่งท่องเที่ยวได้
6. สามารถคลิกที่รูปภาพหรือชื่อแหล่งท่องเที่ยวเพื่อปรับปรุงข้อมูลได้
-->

    <!-- สามารถแสดงข้อมูลรูปภาพแหล่งท่องเที่ยว, ชื่อแหล่งท่องเที่ยวได้ -->
    <style>
        .de-im {
            height: 250px;
            width: 250px;
        }

        @media screen and (max-width : 980px) {
            .container {
                width: 900px;
            }

        }

        @media screen and (max-width : 700px) {
            .container {
                width: 500px;
            }

        }
    </style>
    <?php


    // Username is root
    $user = 'root';
    $password = '';

    // Database name is geeksforgeeks
    $database = 'intl';

    // Server is localhost with
    // port number 3306
    $servername = 'localhost:3306';
    $mysqli = new mysqli($servername, $user, $password, $database);

    // Checking for connections
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    $sql = " SELECT * FROM tlform";
    $result = $mysqli->query($sql);
    $mysqli->close();
    ?>
    <?php $set1 = array("เชียงราย", "เชียงใหม่", "น่าน", "พะเยา", "แพร่", "แม่ฮ่องสอน", "ลำปาง", "ลำพูน", "อุตรดิตถ์"); ?>
    <?php $set2 = array("ชุมพร", "ระนอง", "สุราษฎร์ธานี", "กระบี่", "พังงา", "นครศรีธรรมราช", "ตรัง", "สตูล", "สงขลา", "ปัตตานี", "ยะลา", "นราธิวาส", "ภูเก็ต", "พัทลุง"); ?>
    <?php $set3 = array("ตาก", "กาญจนบุรี", "ราชบุรี", "เพชรบุรี", "และประจวบคีรีขันธ์"); ?>
    <?php $set4 = array("นครราชสีมา", "กาฬสินธุ์", "ขอนแก่น", "ชัยภูมิ", "นครพนม", "บึงกาฬ", "บุรีรัมย์", "มหาสารคาม", "มุกดาหาร", "ยโสธร", "ร้อยเอ็ด", "ศรีสะเกษ", "เลย", "สกลนคร", "สุรินทร์", "หนองคาย", "หนองบัวลำภู", "อุดรธานี", "อุบลราชธานี", "อำนาจเจริญ", "ชลบุรี", "ระยอง", "จันทบุรี", "ตราด", "ฉะเชิงเทรา", "นครนายก", "ปราจีนบุรี", "และสระแก้ว"); ?>
    <?php $set5 = array("สมุทรปราการ", "นนทบุรี", "ปทุมธานี", "พระนครศรีอยุธยา", "สระบุรี", "ลพบุรี", "อ่างทอง", "สิงห์บุรี", "ชัยนาท", "นครปฐม", "สุพรรณบุรี", "สมุทรสาคร", "สมุทรสงคราม", "เพชรบุรี", "กรุงเทพมหานคร"); ?>
    <div class="container text-center">

        <?php
        $jk = 0;
        while ($rows = $result->fetch_assoc()) {

            $Nm[$jk] = $rows['Nm'];
            $de[$jk] = $rows['details'];
            $im[$jk] = $rows['im'];
            $ty[$jk] = $rows['ty'];
            $pro[$jk] = $rows['pro'];

            $jk = $jk + 1;
        }
        ?>
        <h1>ภาคเหนือ</h1>
        <div class="row">
            <?php
            $f = 0;
            while ($f < $jk) {
                for ($d = 0; $d < count($set1); $d++) {
                    if ($pro[$f] == $set1[$d]) {
            ?>

                        <div class="col-sm-3" id="de2">
                            <h4><a href="edit.php?role=<?php echo $Nm[$f]?>"?><?php echo $Nm[$f]?></a></h4>
                            <img src="<?php echo  $im[$f]; ?>" class="de-im" />
                            <?php echo  $pro[$f]; ?>
                            <p><a href="edit.php?role=<?php echo $Nm[$f]?>"?><?php echo $de[$f]; ?></a></p>

                        </div>

            <?php
                    }
                }
                $f++;
            }
            ?>
        </div>

        <h1>ภาคใต้</h1>
        <div class="row">
            <?php
            $g = 0;
            while ($g < $jk) {
                for ($g1 = 0; $g1 < count($set2); $g1++) {
                    if ($pro[$g] == $set2[$g1]) {
            ?>
                        <div class="col-sm-3">
                            <h4><a href="edit.php?role=<?php echo $Nm[$g]?>"?><?php echo $Nm[$g]?></a></h4>
                            <img src="<?php echo  $im[$g]; ?>" class="de-im" />
                            <?php echo  $pro[$g]; ?>
                            <p><a href="edit.php?role=<?php echo $Nm[$g]?>"?><?php echo $de[$g]; ?></a></p>

                        </div>
            <?php
                    }
                }
                $g++;
            }
            ?>
        </div>

        <h1>ภาคตะวันออก</h1>
        <div class="row">
            <?php
            $y = 0;
            while ($y < $jk) {
                for ($y1 = 0; $y1 < count($set4); $y1++) {
                    if ($pro[$y] == $set4[$y1]) {
            ?>

                        <div class="col-sm-3">
                            <h4><a href="edit.php?role=<?php echo $Nm[$y]?>"?><?php echo $Nm[$y]?></a></h4>
                            <p><?php echo  $pro[$y]; ?></p>
                            <img src="<?php echo  $im[$y]; ?>" class="de-im" />
                            <p><a href="edit.php?role=<?php echo $Nm[$y]?>"?><?php echo $de[$y]; ?></a></p>

                        </div>

            <?php
                    }
                }
                $y++;
            }
            ?>
        </div>

        <h1>ภาคตะวันตก</h1>
        <div class="row">
            <?php
            $e = 0;
            while ($e < $jk) {
                for ($e1 = 0; $e1 < count($set3); $e1++) {
                    if ($pro[$e] == $set3[$e1]) {
            ?>

                        <div class="col-sm-3">
                            <h4><a href="edit.php?role=<?php echo $Nm[$e]?>"?><?php echo $Nm[$e]; ?></h4>
                              <p><?php echo  $pro[$e]; ?></p>
                            <img src="<?php echo  $im[$e]; ?>" class="de-im" />
                            <p><?php echo $de[$e]; ?></a></p>

                        </div>

            <?php
                    }
                }
                $e++;
            }
            ?>
        </div>

        <h1>ภาคกลาง</h1>
        <div class="row">
            <?php
            $a = 0;
            while ($a < $jk) {
                for ($a1 = 0; $a1 < count($set5); $a1++) {
                    if ($pro[$a] == $set5[$a1]) {
            ?>
                        <div class="col-sm-3">
                            <h4><a href="edit.php?role=<?php echo $Nm[$a] ?>"><?php echo $Nm[$a]; ?></a></h4>
                            <p><?php echo $pro[$a]; ?></p>
                            <img src="<?php echo  $im[$a]; ?>" class="de-im" />
                            <a href="edit.php?role=<?php echo $Nm[$a] ?>"><?php echo $de[$a]; ?></a>

                        </div>

            <?php
                    }
                }
                $a++;
            }
            ?>
            <p id="te"></p>
        </div>



        <?php if (isset($_POST['sub1'])) {

        }
        ?>

    </div>
    <script>
        function myFunction1() {
            var x = document.getElementById("de2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>





    <!-- มีปุ่มสำหรับเพิ่มข้อมูลแหล่งท่องเที่ยวได้ -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</body>

</html>