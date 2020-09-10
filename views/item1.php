<section class="product">
	<div class="product__photo">
		<div class="photo-container">
			<div class="photo-main">
				
				    <?php if(isset($item->images[0])) : ?>
                        <img src="img/<?=$item->images[0]->getName(); ?>">
                    <?php endif?>
			</div>
			<div class="photo-album">
				<ul>
					<li>
                        <?php foreach($images as $image) : ?>
                            <?php if($item->getIdItem() == $image->getIdItem()) :?>
                                <img src="img/<?=$image->getName(); ?>">
                            <?php endif; ?>   
                        <?php endforeach?>
                    </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="product__info">
		<div class="title">
			<h1><?= $item->getName()?></h1>
		</div>
		<div class="price">
			€ <span><?= $item->getPrice()?></span>
		</div>
		
		<div class="description">
            <p><?= $item->getDescription()?></p>
		</div>
		<button class="buy--btn">ADD TO Wishlist</button>
	</div>
</section>
