<?php header("Content-Type: text/xml"); ?>
<rss version="2.0"
	xmlns:atom="http://www.w3.org/2005/Atom"
	>
    <channel>
        <title>Gordon's Crown Menus</title>
        <link><?=BASEURL?></link>
		<atom:link href="<?=BASEURL?>feed/" rel="self" type="application/rss+xml" />
        <description>This is RSS Feed of Gordon's Crown Menus</description>
        <language>en</language>

        <?php foreach($allFeed as $feed): ?>
        <item>
            <title>Menu <?=$feed['id']?></title>
			<link><?=BASEURL?>menu/<?=str_replace(".jpg", "", $feed['image'])?></link>
			<guid isPermaLink="false"><?=BASEURL?>menu/<?=str_replace(".jpg", "", $feed['image'])?></guid>
			<category><![CDATA[Salads]]></category>		
            <description><![CDATA[
				<p><?=$feed['description']?></p>
				<div name="menuimage"><img src="<?=BASEURL?>media/img/<?=$feed['image']?>" alt="<?=$feed['title']?>" title="<?=$feed['title']?>" /></div>
				<div name="menueprice">Price: &pound;<?=$feed['price']?></div>
				<div name="menuerating">Rating: <?php printf("%.1f",$feed['rating']/$feed['ratetime']);?> (<?=$feed['ratetime']?> ratings)</div>
				<div name="menuetags">Tags: <a href="<?=BASEURL?>tags/fish">fish</a>, <a href="<?=BASEURL?>tags/cocktail">cocktail</a></div>
			]]></description> 	
        </item>

	    <?php endforeach; ?>
	
	</channel>
</rss>