<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writer</title>
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
    <!-- Data Tables -->
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <!-- Data Tables -->
</head>

<body>
    <?php
    include 'nav-menu.php'
    ?>
    <div class="fs-5 text-center mt-5 fw-bold">ລາຍຊື່ນັກຂຽນ</div>
    <div class="conatainer-fluid">
        <div class="card-body text-end">
            <a type="button" class="btn btn-outline-success ຶbtn-sm" href="writer_add.php">ເພີ່ມນັກຂຽນ</a>
        </div>
    </div>
    <div class="container-fluid mt-2">
        <table id="myTable" class="table table-bordered table-hover">
            <thead style="background-color: #FCF3CF;">
                <th class="fs-6 text-center">ລະຫັດ</th>
                <th class="fs-6 text-start">ຊື່</th>
                <th class="fs-6 text-center">ສະຖານະ</th>
                <th class="fs-6 text-center">ແກ້ໄຂ</th>
            </thead>

            <tbody>
                <?php
                require "connect_db.php";

                $query = $pdo->prepare("SELECT * FROM tbl_writer ORDER BY writer_id ASC");
                $query->execute();

                if ($query->rowCount() > 0) {
                    foreach ($query as $row) {
                        $w_id = $row['writer_id'];
                        $w_name = $row['writer_name'];
                        $writer_active = $row['writer_active'];

                ?>
                        <tr>
                            <td class="text-center"><?= $w_id ?></td>
                            <td class="text-center"><?= $w_name ?></td>
                            <td class="text-center">

                                <?php if ($writer_active == 'yes') {
                                ?>
                                    <a class="btn btn-primary btn-sm" style="width: 50px; boder-radius:10px;" href="writer_status.php?status=yes&id=<?= $w_id ?>">yes</a>
                                <?php
                                } else {
                                ?>

                                    <a class="btn btn-danger btn-sm" style="width: 50px; boder-radius:10px;" href="writer_status.php?status=no&id=<?= $w_id ?>">no</a>
                                <?php
                                }
                                ?>

                            </td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary btn-sm" href="writer_edit.php?edit_id=<?= $w_id ?>">
                                    <i class="bi bi-pen"></i>ແກ້ໄຂ
                                </a>
                            </td>

                        </tr>
                <?php
                    }
                } else {
                    $sms = "ບໍ່ມີຂໍ້ມູນ";
                    echo '<tr>
                       <td colspan="9" alingn="center">' . $sms . '</td>
                       </tr>';
                }

                ?>
            </tbody>
        </table>
    </div>

</body>

</html>