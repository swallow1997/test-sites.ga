<?
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (�����)
 * @date 06.03.2015
 */
/* @var $this \yii\web\View */
/* @var \skeeks\cms\models\Tree $model */

$opacity = $model->relatedPropertiesModel->getAttribute("opacity");
?>

<?= $this->render('@template/include/breadcrumbs', [
    'model' => $model
]) ?>

<!--=== Content Part ===-->
<section class="padding-xxs" <?= $opacity ? "style='opacity: {$opacity};'" : "" ?>>
    <div class="container content">
        <div class="row">
            <div class="col-md-12 sx-content">
                <?= $model->description_full; ?>

                <?= \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::widget([
                    'namespace' => 'FormWidget-feedback-callback',
                    'form_code' => 'feedback',
                    'viewFile' => 'whith-messages',
                ]) ?>


            </div>
        </div>
    </div>
</section>