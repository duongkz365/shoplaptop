<nav class="page-link" style="display:<?php echo $display = (empty($func->getUrl()[0]) || $func->getUrl()[0] == 'home') ? 'none' : 'flex' ?>;">
    <a href="home">
        <i class="fa-solid fa-house"></i> Home
    </a>
    <span style="display:<?php echo $link = isset($func->handleDisplayPageLink()['url'][1]) ? '' : 'none' ?>"><i class="fa-solid fa-chevron-right"></i></span>

    <a href="<?php echo $link = isset($func->handleDisplayPageLink()['url'][0]) ? $func->handleDisplayPageLink()['url'][0] : ''  ?>">
        <?php echo $controller = isset($func->handleDisplayPageLink()['url'][0]) ? $func->handleNameController() : ''; ?>
    </a>
    <!-- ----- -->
    <span><i class=" fa-solid fa-chevron-right"></i></span>
    <!-- ----- -->
    <a onclick="handleLink()" class='active'>
        <?php echo $controller = isset($func->handleDisplayPageLink()['url'][1]) ? $func->handleNameAction() : $func->handleNameController(); ?>
    </a>
</nav>
<script>
    function handleLink() {
        window.location.href = window.location.href;
    }
</script>