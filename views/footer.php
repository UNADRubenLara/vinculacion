<?php
   $template = '
	</main>
</body>
<div >
    <p class="footer">%s</p>
</div>
<script src="./public/js/reload.js"></script>
</html>

';
   echo '<script src="./public/js/validates.js"></script>';
   printf(
      $template,
      TXTFooter
   );
