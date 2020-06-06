<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список замовлень
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li class="active">Список замовлень</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Покупець</th>
                                    <th>Статус</th>
                                    <th>Сума</th>
                                    <th>Дата замовлення</th>
                                    <th>Дата змінення</th>
                                    <th>Дія</th>
                                </tr>
                            </thead>
                            <tbody>

                                    <?php foreach($orders as $order): ?>
                                    <?php $class = $order['status'] ? 'success' : ''; ?>
                                        <tr class="<?= $class; ?>">
                                            <td><?= $order['id']; ?></td>
                                            <td><?= $order['name']; ?></td>
                                            <td><?= $order['status'] ? 'Завершений' : 'Новий'; ?></td>
                                            <td><?= $order['sum']; ?> <?= $order['currency']; ?></td>
                                            <td><?= $order['date']; ?></td>
                                            <td><?= $order['update_at']; ?></td>
                                            <td><a href="<?= ADMIN; ?>/orders/view?id=<?= $order['id']; ?>"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                    <a class="delete" href="<?= ADMIN; ?>/orders/delete?id=<?= $order['id']; ?>"><i
                                                            class="fa fa-fw fa-close  delete-order"></i></a>
                                            </td>
                                        </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($orders);?> заказ(ів) із <?=$count;?>)</p>
                        <?php if($pagination->countPages > 1): ?>
                            <?=$pagination;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->