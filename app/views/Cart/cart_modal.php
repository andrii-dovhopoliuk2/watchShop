<?php if (!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Фото</th>
            <th>Назва</th>
            <th>Кількість</th>
            <th>Ціна</th>
            <th><span class="glyphicon glyphicon-remove"
             aria-hidden="true"></span></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['cart'] as $id => $item) : ?>
            <tr>
                <td><a href="product/<?=$item['alias'];?>"><img
                            src="images/<?=$item['img']?>" alt=""></a></td>
                <td><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></td>
                <td><?=$item['qty']; ?></td>
                <td><?=$item['price']; ?></td>
                <td><span data-id="<?=$id;?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td>Разом:</td>
                <td colspan="4" class="text-right cart-qty">
                    <?=$_SESSION['cart.qty'];?></td>
            </tr>
                <td>На суму:</td>
                <td colspan="4" class="text-right cart-sum">
                    <?=$_SESSION['cart.currency']['symbol_left'].$_SESSION['cart.sum'].$_SESSION['cart.currency']['symbol_right']; ?></td>

        </tbody>
    </table>
    </div>
<?php else: ?>
    <h3>Корзина порожня</h3>
<?php endif;?>
