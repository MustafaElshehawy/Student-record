<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home_style.css">
</head>
<body dir="rtl">
    <?php 
    // الاتصال مع قاعدة البيانات
    $host='localhost';
    $user='root';
    $pass='';
    $db='student1';
    $con= mysqli_connect($host,$user,$pass,$db);
    $res= mysqli_query($con,"select * from student");//امر جلب البيانات
    //button variable 
    $id='';
    $name='';
    $address='';
    if(isset($_POST['id'])){
        $id= $_POST['id'];
    }
    if(isset($_POST['name'])){
        $name= $_POST['name'];
    }
    if(isset($_POST['address'])){
        $address= $_POST['address'];
    }

    $insert='';
    if(isset($_POST['add'])){
        $insert = "insert into student value( $id,'$name','$address')";
        mysqli_query($con,$insert);
        header("location: home.php");
    }
    if(isset($_POST['del'])){
        $delete ="delete from student where id ='$id'";
        mysqli_query($con,$delete);
        header("location: home.php");
    }
    ?>
    <div id="mother">
        <!-- لوحة التحكم -->
        <form method="post">
        <aside>
            <div id="div">
                <img src="https://parspng.com/wp-content/uploads/2022/12/studentpng.parspng.com-6.png" alt="لوجو الموقع" width="100px"  height="120px" >
                <h3>لوحة المدير</h3>
                <label>رقم الطالب:</label><br>
                <input type="text" name="id" id="id"><br>
                <label>اسم الطالب</label><br>
                <input type="text" name="name" id="name"><br>
                <label>عنوان الطالب</label><br>
                <input type="text" name="address" id="address"><br><br>
                <button name="add" class="btnadd">اضافة طالب</button>
                <button name="del" class="btndel">حذف طالب</button>
            </div>
        </aside>
        <!-- عرض بيانات الطلاب -->
        <main>
            <table id="tbl">
                <tr>
                    <th>الرقم التسلسلي</th>
                    <th>اسم الطالب</th>
                    <th>عنوان الطالب</th>
                </tr>
                <?php 
                while($row = mysqli_fetch_array($res)){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </form>
        </main>
    </div>    
</body>
</html>
