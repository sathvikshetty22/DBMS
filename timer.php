<?php
    $user = $_REQUEST['var'];
    $time = $_REQUEST['t'];
?>
<html>
    <body>
    <link rel="stylesheet" href="css/timer_style.css"><br><br>
    <style>
    .center
{
  margin:auto;
  width:50%;
  border:3px solid green;
  padding:10px;
}
</style>
        <script>
            var varname = '<?php echo $user ;?>';
            var vartime = '<?php echo $time ;?>';
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent =  minutes + ":" + seconds;

        if (--timer < 0) {
                window.location.href='update.php?varn=<?php echo $user; ?>&tm=<?php echo $time; ?>';
        }
    }, 1000)
    if(minutes == 0 && seconds == 0)
    {
        return;
    }
}

window.onload = function () {
    var Minutes = vartime,
        display = document.querySelector('#time');
    startTimer(Minutes, display);
};

</script>
    <div class="center"><h1><b>Time Left : <span id="time"></span> minutes!</b></h1></div>
</body>
</html>