<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!--header section ------->
        <?php foreach ($result_header as $row): ?>
            <div class="header-section">
                <?php echo $row->header_content; ?>
                <?php echo '<style>' . $row->header_css . '</style>' ?>
            <?php endforeach; ?>
        </div>

        <!--body section------->
        <?php foreach ($result as $row): ?>
            <div class="body-section">
                <?php echo $row->page_content; ?>
                <?php echo '<style>' . $row->page_css . '</style>' ?>

            <?php endforeach; ?>
        </div>

        <!--footer section------->
        <?php foreach ($result_footer as $row): ?>
            <div class="footer-section">
                <?php echo $row->footer_content; ?>
                <?php echo '<style>' . $row->footer_css . '</style>' ?>
            <?php endforeach; ?>
        </div>

    </body>
</html>


