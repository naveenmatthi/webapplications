<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: index.php");
   }
?>
<html>
<script>
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>
</html>