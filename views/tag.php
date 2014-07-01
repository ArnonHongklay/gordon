<h1>Menus with tag "<?=$title?>"</h1>
			<div id="tags-wrapper" class="category">
				<ul>
					<?php foreach($tags as $tag): ?>
					<li>
						<a href="./menu/<?=str_replace(".jpg", "", $tag['image'])?>" title="Go to detail view of <?=$tag['title']?> - &pound;<?=$tag['price']?>"><?=$tag['title']?> - &pound;<?=$tag['price']?></a>
					</li>
					<?php endforeach; ?>
				</ul>					
			</div>		