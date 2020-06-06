<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Групи фільтрів
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li class="active">Групи фільтрів</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <a href="<?=ADMIN;?>/filter/group-add" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Добавити групу</a>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Назва</th>

                                <th>Дія</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($attrs_group as $item): ?>
                            <tr>
                                <td><?=$item->title;?></td>

                                <td>
                                    <a href="<?=ADMIN;?>/filter/group-edit?id=<?=$item->id;?>"><i class="fa fa-fw fa-pencil"></i></a>
                                    <a class="delete text-danger" href="<?=ADMIN;?>/filter/group-delete?id=<?=$item->id;?>"><i class="fa fa-fw fa-close text-danger"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->