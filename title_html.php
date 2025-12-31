<?php include 'start_html.php'?>
<link href="./asset/css/login_register.css" rel="stylesheet">
</head>
<body>
<?php
    if($_SERVER["REQUEST_METHOD"] === "POST" && $view2->isEmptyErrors())
        $view2->showSuccessMessage();
    else if($_SERVER["REQUEST_METHOD"] === "POST")
        $view2->displayErrors();