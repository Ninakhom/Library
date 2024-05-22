<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all publisher</title>
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
    <?php
    include 'nav-menu.php'
    ?>
    <div class="fs-5 text-center mt-5 mb-3 fw-bold">ຈັດການຂໍ້ມູນສຳນັກພິມ</div>
    <div class="conatainer-fluid">
        <div class="card-body text-end">
            <a type="button" class="btn btn-outline-success ຶbtn-sm" href="publisher_add.php">ເພີ່ມສຳນັກພິມໃໝ່</a>
        </div>
    </div>

    <div class="container-fluid">
        <table id="myTable" class="table table-bordered table-hover">

        <thead style="background-color: #FCF3CF;">
            <th class="text-start">ລຳດັບ</th>
            <th class="text-center">ຊື່ສຳນັກພິມ</th>
            <th class="text-center">ລາຍລະອຽດສຳນັກພິມ</th>
            <th class="text-center">ສະຖານະ</th>
            <th class="text-center">ແກ້ໄຂ</th>

        </thead>
        <tbody>
            <?php
            require 'connect_db.php';
            $query = $pdo->prepare("SELECT * FROM tbl_publisher ORDER BY publisher_id");
            $query->execute();
            if($query->rowCount()>0){
                foreach($query as $row){
                    $publisher_id = $row['publisher_id'];
                    $publisher_name = $row['publisher_name'];
                    $publisher_desc = $row['publisher_desc'];
                    $publisher_active = $row['publisher_active'];
                    ?>
                    <tr>
                        <td class="text-center"><?= $publisher_id ?></td>
                        <td class="text-start"><?= $publisher_name ?></td>
                        <td class="text-start"><?= $publisher_desc ?></td>
                        <td class="text-center">
                            <?php if($publisher_active=='yes'){
                             ?> 
                             <a class="btn btn-primary btn-sm" style ="width: 50px; boder-radius:10px;" href="publisher_status.php?status=yes&id=<?=$publisher_id?>">yes</a>
                             <?php  
                            } else{
                                ?>
                               
                                <a class="btn btn-danger btn-sm" style ="width: 50px; boder-radius:10px;" href="publisher_status.php?status=no&id=<?=$publisher_id?>" >no</a>
                                <?php 
                            }
                            ?>
                        </td>

                        <td class = text-center>
                            <a class="btn btn-outline-primary btn-sm" href="publisher_edit.php?edit_id=<?= $publisher_id ?>">
                                <i class="bi bi-pen"></i>ແກ້ໄຂ
                            </a>
                        </td>
                    </tr>
                    <?php

                }

            }else{
                $sms="ບໍ່ມີຂໍ້ມູນທີບັນທຶກ";
                echo '<tr><td colspan="5" align="center">'.$sms.'</td></tr>';

            }
            ?>
        </tbody>
        </table>

    </div>


</body>

</html>