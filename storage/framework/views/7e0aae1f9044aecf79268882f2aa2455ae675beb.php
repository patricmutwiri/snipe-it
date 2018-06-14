<?php $__env->startSection('title'); ?>

 <?php echo e($category->name); ?>

 <?php echo e(ucwords($category_type_route)); ?>


##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<div class="btn-group pull-right">
  <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo e(trans('button.actions')); ?>

    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo e(route('categories.edit', ['category' => $category->id])); ?>"><?php echo e(trans('admin/categories/general.edit')); ?></a></li>
    <li><a href="<?php echo e(route('categories.create')); ?>"><?php echo e(trans('general.create')); ?></a></li>
  </ul>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <table
          name="category_assets"
          class="snipe-table"
          id="table"
          data-url="<?php echo e(route('api.'.$category_type_route.'.index',['category_id'=> $category->id])); ?>"
          data-cookie="true"
          data-click-to-select="true"
          data-cookie-id-table="category<?php echo e($category_type_route); ?>Table">
      </table>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>

  <?php if($category->category_type=='asset'): ?>
    <?php echo $__env->make('partials.bootstrap-table',
    [
      'exportFile' => 'category-' . $category->name . '-export',
      'search' => true,
      'columns' => \App\Presenters\AssetPresenter::dataTableLayout()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php elseif($category->category_type=='accessory'): ?>
    <?php echo $__env->make('partials.bootstrap-table',
    [
      'exportFile' => 'category-' . $category->name . '-export',
      'search' => true,
      'columns' => \App\Presenters\AccessoryPresenter::dataTableLayout()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php elseif($category->category_type=='consumable'): ?>
    <?php echo $__env->make('partials.bootstrap-table',
    [
      'exportFile' => 'category-' . $category->name . '-export',
      'search' => true,
      'columns' => \App\Presenters\ConsumablePresenter::dataTableLayout()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php elseif($category->category_type=='component'): ?>
    <?php echo $__env->make('partials.bootstrap-table',
    [
      'exportFile' => 'category-' . $category->name . '-export',
      'search' => true,
      'columns' => \App\Presenters\ComponentPresenter::dataTableLayout()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>