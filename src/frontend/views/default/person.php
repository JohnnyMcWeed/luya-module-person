<div class="row">
    <h1 class="col-12">Person: <?= $model->first_name ?> <?= $model->last_name ?></h1>
</div>
<div class="row">
    <div class="col-3">
        <img src="<?= $model->getImage() ?>" alt="" />
    </div>
    <div class="col-9">
        <table class="table">
            <tbody>
            <tr>
                <th scope="row">Name</th>
                <td><?= $model->first_name ?> <?= $model->last_name ?></td>
            </tr>
            <tr>
                <th scope="row">Birthdate</th>
                <td><?= Yii::$app->formatter->asDate($model->birthday) ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row"><?= var_dump($model->addresses) ?>
    <?php /*foreach ($model->getAddresses() as $address): ?>

    <?php endforeach;*/ ?>
</div>