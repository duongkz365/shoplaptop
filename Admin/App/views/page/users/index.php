<div class="table-wrapper">
    <div class="table__header">
        <h1 class="table__title">Users</h1>
        <div class="table__right">
            <a href="user/add" class="btn btn--add">
                <i class="fa-solid fa-plus"></i>
                Add User
            </a>
        </div>
    </div>
    <div class="table-container">
        <table class="content-table">
            <thead>
                <tr>
                    <th class="width-100">ID</th>
                    <th>Name</th>
                    <th class="width-250">Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th class="width-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                foreach ($users as $user) {

                ?>
                    <tr>
                        <td class="width-100 text-center">
                            <?php
                            echo $number;
                            $number++;
                            ?>
                        </td>
                        <td class="text-center"> <?php echo $user['name'] ?> </td>
                        <td class="width-250 text-center"> <?php echo $user['email'] ?> </td>
                        <td class="text-center"> <?php echo $user['address'] ?> </td>
                        <td class="text-center"> <?php echo $user['phone'] ?> </td>
                        <td class="text-center"> <?php echo $user['gender'] == 1 ? 'Nam' : 'Nữ' ?> </td>
                        <td class="width-200 text-center">
                            <a href="user/edit/<?php echo $user['id'] ?>" class="btn-action btn-action--edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a class="btn-action btn-action--delete" onclick="handleNotification(<?php echo $user['id'] ?>, 'Bạn có chắc muốn xóa nhân viên này không?','user/delete');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>