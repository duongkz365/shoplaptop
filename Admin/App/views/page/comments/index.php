<div class="table-wrapper">
    <div class="table__header">
        <h1 class="table__title">Manage Comments and reviews</h1>
    </div>

    <div class="table-container">
        <table class="content-table">
            <thead>
                <tr>
                    <th class="width-100">ID</th>
                    <th class="width-250">Email</th>
                    <th class="width-250">Content</th>
                    <th class="width-250">Rating</th>
                    <th class="width-250">Confirm</th>
                    <th class="width-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                foreach ($comments as $comment) { ?>
                    <tr>
                        <td class='width-100 text-center'> <?php echo $number;
                                                            $number++ ?></td>
                        <td class='width-250 '> <?php echo $comment['email'] ?> </td>
                        <td class=''> <?php echo $comment['content'] ?> </td>
                        <td class='text-center'>
                            <?php for ($i = 0; $i < $comment['rate']; $i++) {
                            ?>
                                <i class="fa-solid fa-star star"></i>
                            <?php } ?>
                        </td>
                        <td class="width-200 text-center">
                            <a style="display:<?php echo $display = $comment['status_comment'] == 1 ? 'none' : '' ?>" href="comment/accept/<?php echo $comment['id'] ?>" class="btn-action btn-action--accept">
                                <i class="fa-solid fa-check"></i>
                            </a>
                        </td>
                        <td class="width-200 text-center">
                            <a href="comment/edit/<?php echo $comment['id'] ?>" class="btn-action btn-action--edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a class="btn-action btn-action--delete" onclick="handleNotification(<?php echo $comment['id'] ?>, 'Bạn có chắc muốn xóa đánh giá này không?','comment/delete');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>