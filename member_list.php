<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Member</title>
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


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="member_edit.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ເປີດ / ປິດການໃຊ້ງານຂອງ Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ທ່ານຕ້ອງການເປີດປິດການໃຊ້ງານ Member ນີ້ ຫຼືບໍ່?
                    <input type="hidden" id="update_id" name="update_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" class="btn btn-danger" name="status">ປ່ຽນສະຖານະ</button>
                </div>
            </div>
        </form>
    </div>
</div>


<body>
    <?php
    include 'nav-menu.php'
    ?>
    <div class="fs-5 text-center mt-5 fw-bold">ລາຍການທີ່ລົງທະບຽນສະມາຊິກ</div>
    <div class="container-fluid mt-2">
        <table id="myTable" class="table table-bordered table-hover">
            <thead style="background-color: #FCF3CF;">
                <th class="fs-6 text-center">ລະຫັດ</th>
                <th class="fs-6 text-start">ຊື່</th>
                <th class="fs-6 text-start">ນາມສະກຸນ</th>
                <th class="fs-6 text-center">ເພດ</th>
                <th class="fs-6 text-start">ເບີໂທລະສັບ</th>
                <th class="fs-6 text-start">ລະຫັດບັດປະຈຳຕົວ</th>
                <th class="fs-6 text-start">username</th>
                <th class="fs-6 text-center">ສະຖານະ</th>
                <th class="fs-6 text-center">ແກ້ໄຂ</th>

            </thead>

            <tbody>
                <?php
                require "connect_db.php";

                $query = $pdo->prepare("SELECT * FROM tbl_member ORDER BY member_id ASC");
                $query->execute();

                if ($query->rowCount() > 0) {
                    foreach ($query as $row) {
                        $member_id = $row['member_id'];
                        $f_name = $row['firstname'];
                        $l_name = $row['lastname'];
                        $gender = $row['gender'];
                        $tel_number = $row['tel_number'];
                        $card_id = $row['card_id'];
                        $username = $row['username'];
                        $member_active = $row['member_active'];
                ?>
                        <tr>
                            <td class="text-center"><?= $member_id ?></td>
                            <td class="text-center"><?= $f_name ?></td>
                            <td class="text-center"><?= $l_name ?></td>
                            <td class="text-center"><?= $gender ?></td>
                            <td class="text-center"><?= $tel_number ?></td>
                            <td class="text-center"><?= $card_id ?></td>
                            <td class="text-center"><?= $username ?></td>
                            <td class="text-center">

                                <?php
                                if ($member_active == 'yes') {
                                ?>
                                    <button class="btn btn-primary btn-sm" disabled>yes</button>
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-danger btn-sm" disabled>no</button>
                                <?php
                                }
                                ?>

                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="bi bi-pen"></i>
                                    ແກ້ໄຂ
                                </button>
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
<!-- Script for send Info -->
<script>
    $(document).ready(function() {
        $('.editBtn').on('click', function() { //thar kod editBtn
            $('#editModal').modal('show');

            $tr = $(this).closest('tr'); //aw data ma mod theo
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            $('#update_id').val(data[0]);
        })
    })
</script>