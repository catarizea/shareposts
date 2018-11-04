<script src="<?php echo URLROOT.'/js/main.js'; ?>"></script>
<script type="text/javascript">
  var connection = new WebSocket('ws://localhost:62183');
  connection.onmessage = function (e) {
    location.reload();
  };
</script>
</body>
</html>