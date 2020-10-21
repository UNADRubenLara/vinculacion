<?php
   
   $template = '
</div>
</section>
<footer id="footer"> %s %s <a  href="%s" target="_blank">GITHUB</a></footer>
</section>
</body>
<script src="./public/js/reload.js"></script>
</html>';
   echo '<script src="./public/js/validates.js"></script>';
   printf(
      $template,
      TXTAppName,
      TXTFooter,
      TXTGitHub
   );

