<?php
session_start();
$_SESSION['role'] = $_GET['role'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<?php include 'navber.php'; ?>
<!-- หน้าปรับปรุงข้อมูล
1. สามารถปรับปรุงข้อมูลแหล่งท่องเที่ยวได้
2. เมื่อปรับปรุงข้อมูลสาเร็จให้ลิงค์กลับไปยังหน้าปรับปรุงข้อมูล
3. มีปุ่มสำหรับกลับไปยังหน้าหน้าแสดงข้อมูลแหล่งท่องเที่ยวได้
4. มีปุ่มสำหรับลบข้อมูลแหล่งท่องเที่ยว
5. เมื่อลบข้อมูลสำเร็จให้ลิงค์กลับไปยังหน้าแสดงข้อมูลแหล่งท่องเที่ยว
-->
<style>
    select {
        margin-top: 5%;
    }
</style>
<?php
if (isset($_POST['submit2'])) {
    session_unset();
    session_reset();
    session_destroy();
}

    include 'contr.php';
    $ss = new contr();
if (isset($_POST['submit'])) {
    $num = $_POST['num'];
    $nm1 = $_POST['nmbx'];
    $nmare1 = $_POST['nmare'];
    $urim1 = $_POST['urim'];
    $ty1 = $_POST['ty'];
    $pro1 = $_POST['pro'];

    $ss->connect();
    $con = $ss->cc;

    $sql = "UPDATE tlform SET Nm='$nm1' , details='$nmare1' ,im='$urim1',ty='$ty1',pro='$pro1' WHERE id='$num'";

    if (mysqli_query($con, $sql)) {
        header("Location: index.php");
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);
}

if (isset($_POST['submit1'])) {
    $num2 = $_POST['num'];

    
    $ss->connect();
    $conn = $ss->cc;
    // sql to delete a record
    $sql = "DELETE FROM tlform WHERE id='$num2'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}
?>

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

<style>
    @media screen and (max-width : 980px) {
        .container-fluid {
            width: 500px;
        }
    }

    @media screen and (max-width : 668px) {
        .container-fluid {
            width: 400px;
        }
    }
</style>


<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4" style="margin-left: 30%;">
                    <div class="page-header">
                        <h2>Update Record and Delete</h2>
                    </div>
                    <?php
                     while ($rows = $result->fetch_assoc()) {
                    if($_SESSION['role'] == $rows['Nm']){
                    ?>

                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <label>เลือกอันดับที่จะอัปเดต</label>
                        <input type="number" class="form-control" name="num" value="<?php echo $rows['id']?>" />
                        <label>ชื่อแหล่งท่องเที่ยว </label>
                        <input type="text" class="form-control" name="nmbx" value="<?php echo $rows['Nm']?>"/>
                        <label> รายละเอียดแหล่งท่องเที่ยว </label>
                        <input type="Textarea" class="form-control" name="nmare"value="<?php echo $rows['details']?>" />
                        <label>URL รูปภาพหน้าปก </label>
                        <input type="Text" class="form-control" name="urim" value="<?php echo $rows['im']?>"/>

                        <label for="cars">ประเภทแหล่งท่องเที่ยว</label>
                        <select name="ty" id="cars">
                            <option value="ทะเล">ทะเล</option>
                            <option value="ทะเล">ตลาดแหล่งคนเดิน</option>
                            <option value="ทะเล">วัด</option>
                            <option value="ภูเขา">ภูเขา</option>
                            <option value="น้ำตก">น้ำตก</option>
                            <option value="ธรรมชาติ">ธรรมชาติ</option>
                        </select>

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
                            <option value="สัตหีบ">สัตหีบ</option>
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




                        <input type="submit" class="btn btn-success" name="submit" value="Update"></input>
                        <input type="submit" class="btn btn-danger" name="submit1" value="Delete"></input>

                        <input type="button" class="btn btn-warning" name="submit2" onclick="location.href='index.php';" value="ย้อนกลับ" />
                        <!--4. มีปุ่มสำหรับกลับไปยังหน้าแสดงข้อมูลแหล่งท่องเที่ยวได้ -->
                        <!--5. เมื่อลบข้อมูลสำเร็จให้ลิงค์กลับไปยังหน้าแสดงข้อมูลแหล่งท่องเที่ยว -->
                    </form>
                        <?php
                        }
                     }
                     ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>