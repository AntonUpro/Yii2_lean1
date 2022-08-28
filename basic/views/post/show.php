<?php 
//$this->title = 'Одная статья';
use app\components\MyWidget;
?>

<?php $this -> beginBlock('block1'); ?>
    <h1>Заголовок страницы</h1>
<?php $this -> endBlock(); ?>

<h1>Show Action</h1>

<?php //echo MyWidget::widget(['name' => 'Антон']); ?>

<?php MyWidget::begin() ?>
    <h1>Привет мир!!!!</h1>
<?php MyWidget::end() ?>


<?php //debug($countr); ?>
<?php //echo count($countr[0]->city); ?>
<?php //debug($countr); ?>

<?php 
// foreach ($countr as $coun) {
//     echo '<ul>';
//         echo '<li>' . $coun->Name . '</li>';
//         $city = $coun->city;
//         foreach ($city as $cit) {
//             echo '<ul>';
//                 echo '<li>' . $cit->Name . '</li>';
//             echo '</ul>';
//         }
//     echo '</ul>';
// } ?>



<button class='btn btn-success' id='btn'>Click me...</button>

<?php //$this -> registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']) ?>
<?php //$this -> registerJs("$('.container').append('<p>SHOW!!!</p>');", \yii\web\View::POS_LOAD)?>

<?php //$this -> registerCss('.container{background: #ccc;}')?>

<?php 
$js = <<<JS
    $('#btn').on('click', function()  {
        $.ajax({
            url: 'index.php?r=post/index',
            data: {test: '123'},
            type: 'POST',
            success: function(res) {
                console.log(res);
            },
            error: function () {
                alert("Error!");
            }

        });
    });
JS;

$this -> registerJs($js);

?>
