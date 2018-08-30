<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=MVCFrame\StringFormatter::ToHtmlSafe($this->GetTitle())?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="<?=MVCFrame\StringFormatter::ToHtmlSafe(MVCFrame\Url::Recache('assets/css/vendor/font-awesome/css/fontawesome-all.css'));?>" />
    <link rel="stylesheet" href="<?=MVCFrame\StringFormatter::ToHtmlSafe(MVCFrame\Url::Recache('assets/css/vendor/bootstrap/bootstrap.min.css'));?>" />
    <link rel="stylesheet" href="<?=MVCFrame\StringFormatter::ToHtmlSafe(MVCFrame\Url::Recache('assets/css/main.css'));?>" />
    
    <script src="<?=MVCFrame\StringFormatter::ToHtmlSafe(MVCFrame\Url::Recache('assets/js/vendor/jquery/jquery.min.js?d'));?>"></script>
    <script src="<?=MVCFrame\StringFormatter::ToHtmlSafe(MVCFrame\Url::Recache('assets/js/vendor/bootstrap/bootstrap.bundle.min.js'));?>"></script>
    <script src="<?=MVCFrame\StringFormatter::ToHtmlSafe(MVCFrame\Url::Recache('assets/js/main.js'));?>"></script>
</head>
<body>
