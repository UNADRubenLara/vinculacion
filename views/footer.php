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
   printf(
      $template,
      TXTFooter
   );
