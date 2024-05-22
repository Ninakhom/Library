<?php
include 'connect_db.php';
$id = $_GET['edit_id'];

//get info by id
$query = $pdo->prepare("SELECT * FROM tbl_writer WHERE writer_id=?");
$query->execute(([$id]));
if ($query->rowCount() > 0) {
    foreach ($query as $row) {
        $name = $row['writer_name'];
        
    }
if(isset($_POST['update'])){
    $newname=$_POST['p_name'];
    
    $querys=$pdo->prepare("UPDATE tbl_writer SET writer_name=? where writer_id=?");
    $querys->execute(([$newname,$id]));
    if($querys){
        echo '<script>window.location.href="writer_list.php"</script>';
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit publisher</title>
    <!-- bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- bootstrap5 icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Noto Sans Lao';
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-4"></div>
        <!-- 12block -->
        <div class="col-4">
            <div class="container card_style">
                <form action="" method="post">
                    <div class="card-body text-start">
                        <h4 class="text-center mt- mb-5">ແກ້ໄຂຂໍ້ມູນນັກຂຽນ</h4>
                        <div class="mb-3">
                            <label class="form-label">ຊື່ນັກຂຽນ</label>
                            <input type="text" class="form-control" required name="p_name" value="<?= $name ?>">
                        </div>

                        <div class="row mb-3 mt-5">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary form-control" name="update">ບັນທຶກ</button>
                            </div>
                            <div class="col-6">
                                <a type="button" class="btn btn-danger form-control" href="writer_list.php">ຍົກເລີກ</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</body>

</html>