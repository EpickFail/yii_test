<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<?php
$form = \yii\widgets\ActiveForm::begin([
    'id' => 'form',
    'method'=>'post',
    'action' => 'http://localhost/yii_test/web/index.php?r=posts/index',
    'enableAjaxValidation' => false,
]);
?>
<?= $form->field($model, 'text')->textInput()->input('text', ['placeholder' => "kevin, art, bbc"])->label(false); ?>
<?= Html::buttonInput('Show Posts', ['id' => 'btn']) ?>

<?php $form->end(); ?>
<h1>Posts</h1>

<div id='workarea'>
    <?php foreach ($UsersPosts as $user => $posts): ?>
        <ul>
        <?= Html::tag('h2', Html::encode($user)) ?>
        <?php foreach ($posts as $post):?>
            <li>
                <img src="<?=$post?>" width="560" height="480" border="5">
                <br>
            </li>
        <?php endforeach; ?>
        </ul>       
    <?php endforeach; ?>
</div>

