<?php

namespace App\Admin\Controllers;

use App\Models\ProductModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ProductModel());

        $grid->column('p_id', __('P id'));
        $grid->column('c_id', __('分类id'));
        $grid->column('p_name', __('商品名称'));
        $grid->column('p_subtitle', __('商品副标题'));
        $grid->column('p_main_image', __('产品主图'))->image();
        $grid->column('p_sub_images', __('商品图片'))->image();
        $grid->column('p_detail', __('商品详情'));
        $grid->column('p_price', __('价格'));
        $grid->column('p_stock', __('库存数量'));
        $grid->column('p_status', __('商品状态'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('最后一次更新时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ProductModel::findOrFail($id));

        $show->field('p_id', __('P id'));
        $show->field('c_id', __('C id'));
        $show->field('p_name', __('P name'));
        $show->field('p_subtitle', __('P subtitle'));
        $show->field('p_main_image', __('P main image'));
        $show->field('p_sub_images', __('P sub images'));
        $show->field('p_detail', __('P detail'));
        $show->field('p_price', __('P price'));
        $show->field('p_stock', __('P stock'));
        $show->field('p_status', __('P status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ProductModel());

        $form->number('c_id', __('分类id'));
        $form->text('p_name', __('商品名称'));
        $form->text('p_subtitle', __('商品副标题'));
        $form->image('p_main_image', __('产品主图'));
        $form->image('p_sub_images', __('商品图片'));
        $form->textarea('p_detail', __('商品详情'));
        $form->decimal('p_price', __('价格'));
        $form->number('p_stock', __('库存数量'));
        $form->number('p_status', __('商品状态'));

        return $form;
    }
}
