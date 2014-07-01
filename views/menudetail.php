
<script type="text/javascript" src="./media/js/rating.js"></script>
<script type="text/javascript" src="./media/js/Tag.js"></script>


<p><a href="./menu" title="&larr; Back to the menu">&larr; Back to the menu</a></p>
			<h1><?=$title?> - &pound;<?=$menu['price']?></h1>
			<div class="food">
				<h3 class="category"><?=$menu['category']?></h3>
				<!-- food specific image is optional, but looks nice -->
				<div class="food_image">
					<img src="./media/img/<?=$menu['image']?>" alt="<?=$menu['title']?> - &pound;<?=$menu['price']?>" />
				</div>
				<div class="food_description">
					<p>
						<?=nl2br($menu['description'])?>
					</p>
				</div>
			
				<h3>Tags: &nbsp;</h3>
				<div id="tags-wrapper">
					<?php foreach($tags as $tag): ?>
					<div class="tag" id="tag<?=$tag['tid']?>">
						<a href="./tags/<?=$tag['name']?>" title="Show where this tag is being used"><?=$tag['name']?></a><?php if(isset($_SESSION['login'])): ?>(<a href="#" onclick="Tag.deleteTag(<?=$tag['tid']?>,<?=$tag['mid']?>); return false;" title="Remove tag on the left">Remove</a>)
				<?php endif; ?>
					</div>
					<?php endforeach; ?>
					<div class="message"></div>
					&nbsp;
				</div>

				<?php if(isset($_SESSION['login'])): ?>
					<div id="tagform">
						<form action="" method="post" id="newtagform">
							<input type="hidden" id="idMenu" value="<?=$menu['id']?>">
							<fieldset class="input">
								<div class="text" id="tag_list">
									<label for="taglist">Add an existing tag:</label>
									<select id="taglist">							
										<option value="0">-select-</option>

										<?php foreach($unuse as $sel): ?>
										<option value="<?=$sel['id']?>"><?=$sel['name']?></option>
										<?php endforeach; ?>
										<!-- already used for this food :
										<option value="2">fish</option>
										<option value="1">potatoes</option>
										-->
									</select>
									<span class="message"></span>
								</div>
								<div class="text" id="tag_add">
									<label for="tagnew">Add a new tag:</label>
									<input type="text" id="tagnew"/>
									<span class="message"></span>
								</div>
							</fieldset>
							<fieldset class="submit">
								<div class="submit">
									<input type="submit" value="Submit tag" />
									<span class="message"></span>
								</div>
							</fieldset>
						</form>
					</div>	
				<?php endif; ?>



				<?php if(isset($_POST['captcha_input'])): ?>
				<?php if($_POST['captcha_input'] != $_SESSION['captcha']): ?>

				<p class="message_error">
					Text dis not match the text on the CAPTCHA image. Try again with a new one!
				</p>


				<?php endif;?>
				<?php endif;?>



				<h3>Rating: &nbsp;</h3>
				<div id="ratings-wrapper">
					<div id="rating"><?php printf("%.1f",$menu['rating']/$menu['ratetime']); ?> (<?=$menu['ratetime']?> ratings)</div>
					
					<?php if(!$rates->search("mid={$menu['id']} AND sessionid='".session_id()."'")):?>
					<div id="ratingswitch" style="visibility:visible">
						<a href="javascript:;" onclick="toggleRatingForm()">Add a rating</a>
					</div>
					<div id="ratingform" style="visibility:collapse; height:0px">
						<form action="" method="post" id="newratingform">
							<fieldset class="input">
								<div class="text" id="rating_input">
									<label for="rating">Select your rating:</label>
									<select name="rating" id="rating">							
										<option value="1">1 bad</option>
										<option value="2">2</option>
										<option value="3">3 ok</option>
										<option value="4">4</option>
										<option value="5" selected>5 delicious</option>
									</select>
									<span class="message"></span>
								</div>
								<div class="text" id="rating_captcha">
									<label for="captcha_input">Type in the text from the image:</label>
									<!-- captcha image: do not store on filesystem, but generate dynamically - modify path in /media/js/rating.js -->
									<img src="../../media/img/emptycaptcha.gif" name="captcha_image" id="captcha_image" alt="Image with text to type in" title="Image with text to type in">
									<input type="text" name="captcha_input" id="captcha_input" size="5" maxlength="5"/>
									<span class="message"></span>
								</div>
							</fieldset>
							<fieldset class="submit">
								<div class="submit">
									<input type="submit" value="Submit rating" />
									<span class="message"></span>
								</div>
							</fieldset>
						</form>
					</div>	

					<?php endif; ?>	
				</div>

			<p><a href="./menu" title="&larr; Back to the menu">&larr; Back to the menu</a></p>
			</div>						