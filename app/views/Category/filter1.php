<?php if (!empty($products)): ?>
    <?php $curr = \ishop\App::$app->getProperty('currency'); ?>
    <?php foreach ($products as $product): ?>
        <div class="col-md-4 product-left p-left">
            <div class="product-main simpleCart_shelfItem">
                <a href="product/<?= $product['alias']; ?>" class="mask"><img class="img-responsive zoom-img"
                                                                              src="images/<?= $product['img']; ?>"
                                                                              alt=""/></a>
                <div class="product-bottom">
                    <h3><?= $product['title']; ?></h3>

                    <h4><a data-id="<?= $product['id']; ?>" class="add-to-cart-link"
                           href="cart/add?id-<?= $product['id']; ?>"><i></i></a> <span
                                class=" item_price"><?= $curr["symbol_left"]; ?> <?= $product['price'] * $curr['value']; ?>
                            <?= $curr["symbol_right"]; ?>        <?php if ($product['old_price']): ?>
                                <small><del>
                                                <?= $curr["symbol_left"]; ?>
                                                <?= $product['old_price'] * $curr["value"]; ?>
                                                <?= $curr["symbol_right"]; ?>
                                            </del></small>

                            <?php endif; ?>
                                </span></h4>

                </div>
                <div class="srch">
                    <?php if ($product['old_price'] && $product['old_price'] > $product['price']): ?>

                        <span><?php
                            $value1 = $product['price'] / $product['old_price'] * 100;
                            $value1 = 100 - $value1;
                            echo round($value1, 1);
                            ?> %</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="clearfix"></div>
    <div class="text-center">
        <?php if (count($products) > 1) : ?>
            <p><?= count($products) ?> товарів із <?= $total ?></p>
        <?php endif; ?>
        <?php if ($pagination->countPages > 1): ?>
            <?= $pagination; ?>
        <?php endif; ?>
    </div>

<?php else : ?>
    <h3>Товарів не знайдено</h3>
<?php endif; ?>
