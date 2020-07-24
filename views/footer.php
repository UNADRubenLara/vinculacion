<?php 
$template='
	<div>
	</main>
	<script src="./public/js/reload.js"></script>
	</div>
	<div class="footer" >
	<p >%s</p>
	</div>
</body>
</html>
';
printf(
    $template,
    TXTfooter
);