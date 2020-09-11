<?php
   $template = '
</div>
<footer>
    %s %s
</footer>
</body>
<script src="./public/js/reload.js"></script>
</html>

';
   echo '<script src="./public/js/validates.js"></script>';
   printf(
      $template,
      TXTAppName,
      TXTFooter
   );
