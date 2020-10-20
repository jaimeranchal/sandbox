<?php
//$var = 'PHP Tutorial'. Put this variable into the title section, h3 tag and as an anchor text within an HTML document.
$var = 'PHP Tutorial';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title><?=$var ?></title>
    </head>
    <body>
        <h3><?=$var ?></h3>
        <p>PHP, an acronym for Hypertext Preprocessor, is a widely-used open source general-purpose scripting language. It is a cross-platform, HTML embedded server-side scripting language and is especially suited for web development.</p>
        <a>Go to the <?=$var ?></a>
    </body>
</html>
