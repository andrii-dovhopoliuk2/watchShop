<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">

            <li>
                <img src="images/bnr-2.jpg" alt=""/>
            </li>
            <li>
                <img src="images/bnr-3.jpg" alt=""/>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends-->

<!--about-starts-->

<!--print brands -->
<?php if ($brands):?>
<div class="about">
    <div class="container">
        <div class="about-top grid-1">
            <?php foreach ($brands as $brand):?>
            <div class="col-md-4 about-left">
                <figure class="effect-bubba">
                    <img class="img-responsive" src="images/<?=$brand['img'];?>" alt=""/>
                    <figcaption>
                        <h2><?=$brand['title'];?></h2>
                        <p><?=$brand['description'];?></p>
                    </figcaption>
                </figure>
            </div>
            <?php endforeach;?>



            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php endif; ?>
<!--print brands-end-->
<!--about-end-->
<!--product-starts-->
<?php if($topProduct):?>
<?php $curr = \ishop\App::$app->getProperty('currency'); ?>
<div class="product">
    <div class="container">
        <div class="product-top">
            <div class="product-one">



               <?php foreach ($topProduct as $product):?>
                <?php if($product['hit'] && $product['status']):?>
                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="product/<?=$product['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$product['img'];?>" alt="" /></a>
                        <div class="product-bottom">
                            <h3><a href="product/<?=$product['alias'];?>"> <?=$product['title'];?></a></a></h3>
                            <p>Explore Now</p>
                            <h4><a data-id = "<?=$product['id'];?>" class="add-to-cart-link" href="cart/add?id-<?=$product['id'];?>"><i></i></a> <span class=" item_price"><?=$curr["symbol_left"];?> <?=$product['price'] * $curr['value'];?>
                            <?=$curr["symbol_right"];?>        <?php if ($product['old_price']): ?>
                                        <small><del>
                                                <?=$curr["symbol_left"];?>
                                                <?= $product['old_price']*$curr["value"];?>
                                                <?=$curr["symbol_right"];?>
                                            </del></small>

                                    <?php endif;?>
                                </span></h4>

                        </div>

                        <div class="srch">
                            <?php if ($product['old_price']&&$product['old_price']>$product['price']):?>

                                <span><?php
                                    $value1 = $product['price'] / $product['old_price'] * 100;
                                    $value1 = 100 - $value1;
                                    echo round($value1,1);
                                    ?> %</span>
                             <?php endif;?>
                        </div>
                    </div>
                </div>
                       <?php endif;?>
                   <?php endforeach;?>
                <?php endif;?>


                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->