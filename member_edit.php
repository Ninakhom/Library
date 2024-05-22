<?php 
include 'connect_db.php';
if(isset($_POST['status'])){
$update_id=$_POST['update_id'];

// check indo with id
$query_info = $pdo->prepare("SELECT member_id,member_active FROM tbl_member where member_id = ?");
$query_info->execute([$update_id]);
if ($query_info->rowCount() > 0) {
    foreach($query_info as $row){
        $member_id=$row['member_id'];
        $old_status=$row['member_active'];

    }
    if($old_status=='yes'){
        $status='no';
    }
    else{
        $status='yes';
    }

    //update new status

    $query_update = $pdo->prepare("UPDATE tbl_member SET member_active=? WHERE member_id=?");
    $query_update->execute([$status, $member_id]);
    
    if($query_update){
        echo '<script>alert("Update successful"); window.location.href="member_list.php";</script>';
    }
    
}
}

?>