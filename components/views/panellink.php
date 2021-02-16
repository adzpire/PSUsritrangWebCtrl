<?php
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\Html;
?>
<?php
    //print_r($items);
?>
<div class="container-fluid">
    <?php
    $first = true;
    foreach ($items as $key => $value){
//        if(!$first) {
            echo '<div class=" '.$setdiv['divwidth'].' ">';
            echo '<div class="panel panel-primary panel-clickable text-center" id="pannel-'.$key.'" data-url="'.Url::to([$value['url'][0]]).'">';
            echo '<div class="panel-heading"><h3 class="panel-title">'.$value['label'].'</h3></div>';
            echo '<div class="panel-body">'.Html::a( Html::icon($value['icon']), $value['url'], ['style' => 'font-size: 4em',]).'</div>';
            echo '</div></div>';
//        } else {
//            echo '<div class="col-lg-2 col-sm-3 rtl-no-left-margin col-sm-offset-1 col-lg-offset-3">';
//            echo '<div class="panel panel-primary panel-clickable text-center" id="pannel-2" data-url="'.$value['url'].'">';
//            echo '<div class="panel-heading"><h3 class="panel-title">'.$value['label'].'</h3></div>';
//            echo '<div class="panel-body">'.Html::a( Html::icon($value['icon']), [$value['url']], ['style' => 'font-size: 4em',]).'</div>';
//            echo '</div></div>';
//            $first = false;
//        }
    }
    ?>
</div>
<?php
$this->registerJs("
/**
* Panel Clickable
* Like in front page, or quick actions
*/
$(document).ready(function(){
    $('.panel-clickable').click(function(){
    if($(this).data('url')!=''){
    window.location.href = $(this).data('url');
    }
    });
});
", View::POS_END);
$this->registerCss("
/**
* Panel Clickable
* Like in front page, or quick actions
*/
.panel-clickable {
  opacity: 1;
  top: 0px; }
.panel-clickable:hover {
  cursor: pointer;
  cursor: hand; }
");
?>
