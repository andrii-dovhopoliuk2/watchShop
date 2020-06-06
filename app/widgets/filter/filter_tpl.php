<?php foreach ($this->groups as $group_id => $group_item): ?>

    <section class="sky-form">
    <h4><?= $group_item; ?></h4>
    <div class="row1 scroll-pane">

    <div class="col col-4">
        <?php if (isset($this->attrs[$group_id])) :?>
        <?php foreach ($this->attrs[$group_id] as $attr_id => $value): ?>
            <?php if (!empty($filter) && in_array($attr_id, $filter)): ?>
                <?php $checked = 'checked'; ?>
            <?php else:?>
                <?php $checked = null;?>
            <?php endif; ?>
            <label class="checkbox">
                <input value="<?= $attr_id; ?>" <?=$checked;?> type="checkbox" name="checkbox"><i></i><?= $value; ?>
            </label>
        <?php endforeach; ?>
        <?php endif;?>
    </div>
    </div>
    </section>
<?php endforeach; ?>