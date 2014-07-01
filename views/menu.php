
<script type="text/javascript" src="./media/js/menu.js"></script>

			<h1>Menu of Gordon&#39;s Crown</h1>
			<div id="sidebar">
				<h2>Jump to ...</h2>
				<ul>
					<?php foreach($allCate as $category): ?>
					<li><a href="javascript:;" onclick="goToByScroll('<?=str_replace(" ", "-", $category['category'])?>');"><?=$category['category']?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div id="foods">


				<?php foreach($allCate as $category): ?>


				<?php 
					$allMenu = $menus->search("category='{$category[category]}'");
					$rate = $rates->rate("{$category['category']}");

				?>

				<h2><a class="category" name="<?=str_replace(" ", "-", $category['category'])?>"><?=$category['category']?></a></h2>		
				<h3 class="rating">Rating: <?php printf("%.1f",$rate['rating']/$rate['ratetime']); ?> (<?=$rate['ratetime']?> ratings)</h3>
				<div class="category">
					<div class="foodcategory_image">
						<img src="./media/img/<?=$allMenu[0]['image']?>" alt="<?=$allMenu[0]['title']?>" />
					</div>
					<ul>	
						<?php foreach($allMenu as $menu): ?>				
						<li>
							<a href="./menu/<?=str_replace(".jpg", "", $menu['image'])?>" title="Go to detail view of <?=$menu['title']?> - &pound;<?=$menu['price']?>"><?=$menu['title']?> - &pound;<?=$menu['price']?></a>
						</li>
						<?php endforeach?>
					</ul>
				</div>

				<?php endforeach; ?>
				
			</div>
			<div id="rssfed"><a href="./feed/"><img src="./media/img/rss.gif" alt="RSS-Feed with Menus" title="RSS-Feed with Menus"></a></div>
		