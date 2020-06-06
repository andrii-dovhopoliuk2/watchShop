<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список користувачів
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li class="active">Список користувачів</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead >
                            <tr>
                                <th>ID</th>
                                <th>Логін</th>
                                <th>Email</th>
                                <th>Ім'я</th>
                                <th>Роль</th>
                                <th>Дія</th>
                            </tr>
                            </thead>
                            <?php foreach($users as $user): ?>
                            <tbody class="<?php if ($user->role == 'admin') echo 'p-3 mb-2 bg-success text-white';?>" >

                                    <td><?=$user->id;?></td>
                                    <td><?=$user->login;?></td>
                                    <td><?=$user->email;?></td>
                                    <td><?=$user->name;?></td>
                                    <td><?=$user->role;?></td>
                                    <td><a href="<?=ADMIN;?>/user/edit?id=<?=$user->id;?>"><i class="fa fa-fw fa-eye"></i></a></td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($users);?> з  <?=$count;?>)</p>
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