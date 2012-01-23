<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
?>
					<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="box">						
						<div class="top">
							<?php if (!empty($block->subject)): ?>
							  <h1><?php print $block->subject ?></h1>
							<?php endif;?>
						</div><!-- /top -->
						<div class="mid">
							<?php print $block->content ?>
							<div class="fixer"></div>
						</div><!-- /mid -->
						<div class="bot"></div><!-- /bot -->
					</div><!-- /box -->