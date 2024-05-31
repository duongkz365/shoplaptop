<div class="table-wrapper">
    <div class="table__header">
        <h1 class="table__title">Search results</h1>
    </div>

    <div class="table-container">
        <table class="content-table">
            <thead>
                <tr>
                    <th class="width-100">ID</th>
                    <th class="width-250">Email</th>
                    <th class="width-250">Content</th>
                    <th class="width-250">Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                while ($comment = mysqli_fetch_array($comments)) { ?>
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>