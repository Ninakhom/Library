<?php
include 'connect_db.php';
$id = $_GET['id'];
$old_status = $_GET['status'];
if(isset($_POST['cancel'])){
    echo '<script>window.location.href="publisher_list.php"</script>';
}
if(isset($_POST['change'])){
    if($old_status=='yes'){
        $newstatus='no';
    }else{
        $newstatus='yes';
    }
    $query = $pdo->prepare("UPDATE tbl_publisher SET publisher_active=? WHERE publisher_id=?");
    $query->execute(([$newstatus,$id]));
    if($query){
        echo '<script>window.location.href="publisher_list.php"</script>';
    }
}
//echo $id, $old_status;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change status</title>
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

<!-- Modal -->
<form action="" method="post">
    <div class="modal fade" id="onload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂສະຖານະສຳນັກພິມ</h5>

                </div>
                <div class="modal-body">
                    ທ່ານຕ້ອງການແກ້ໄຂສະຖານນະນີ້ ຫຼື ບໍ່ ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" name="cancel">ຍົກເລີກ</button>
                    <button type="submit" class="btn btn-primary" name="change">ຕົກລົງ</button>
                </div>
            </div>
        </div>
    </div>
</form>

<body>


</body>

</html>
<!-- jquery V3 -->
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script>
    window.onload = () => {
        $('#onload').modal('show');
    }
</script>