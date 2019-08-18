<?php

namespace App\Admin\Controllers;

use App\Model\GoodsModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\GoodsModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GoodsModel);

        $grid->column('goods_id', __('Goods id'));
        $grid->column('goods_name', __('Goods name'));
        $grid->column('goods_selfprice', __('Goods selfprice'));
        $grid->column('goods_marketprice', __('Goods marketprice'));
        $grid->column('goods_up', __('Goods up'));
        $grid->column('goods_new', __('Goods new'));
        $grid->column('goods_best', __('Goods best'));
        $grid->column('goods_hot', __('Goods hot'));
        $grid->column('goods_num', __('Goods num'));
        $grid->column('goods_integral', __('Goods integral'));
        $grid->column('goods_img', __('Goods img'));
        $grid->column('goods_imgs', __('Goods imgs'));
        $grid->column('goods_desc', __('Goods desc'));
        $grid->column('cate_id', __('Cate id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('goods_salenum', __('Goods salenum'));
        $grid->column('create_time', __('Create time'));
        $grid->column('goods_recommend', __('Goods recommend'));
        $grid->column('click_id', __('Click id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('is_del', __('Is del'));

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
        $show = new Show(GoodsModel::findOrFail($id));

        $show->field('goods_id', __('Goods id'));
        $show->field('goods_name', __('Goods name'));
        $show->field('goods_selfprice', __('Goods selfprice'));
        $show->field('goods_marketprice', __('Goods marketprice'));
        $show->field('goods_up', __('Goods up'));
        $show->field('goods_new', __('Goods new'));
        $show->field('goods_best', __('Goods best'));
        $show->field('goods_hot', __('Goods hot'));
        $show->field('goods_num', __('Goods num'));
        $show->field('goods_integral', __('Goods integral'));
        $show->field('goods_img', __('Goods img'));
        $show->field('goods_imgs', __('Goods imgs'));
        $show->field('goods_desc', __('Goods desc'));
        $show->field('cate_id', __('Cate id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('goods_salenum', __('Goods salenum'));
        $show->field('create_time', __('Create time'));
        $show->field('goods_recommend', __('Goods recommend'));
        $show->field('click_id', __('Click id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('is_del', __('Is del'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new GoodsModel);

        $form->number('goods_id', __('Goods id'));
        $form->text('goods_name', __('Goods name'));
        $form->decimal('goods_selfprice', __('Goods selfprice'));
        $form->decimal('goods_marketprice', __('Goods marketprice'));
        $form->switch('goods_up', __('Goods up'));
        $form->switch('goods_new', __('Goods new'))->default(2);
        $form->switch('goods_best', __('Goods best'))->default(2);
        $form->switch('goods_hot', __('Goods hot'))->default(2);
        $form->number('goods_num', __('Goods num'));
        $form->number('goods_integral', __('Goods integral'));
        $form->text('goods_img', __('Goods img'));
        $form->text('goods_imgs', __('Goods imgs'));
        $form->textarea('goods_desc', __('Goods desc'));
        $form->number('cate_id', __('Cate id'));
        $form->number('brand_id', __('Brand id'));
        $form->number('goods_salenum', __('Goods salenum'));
        $form->number('create_time', __('Create time'));
        $form->text('goods_recommend', __('Goods recommend'));
        $form->number('click_id', __('Click id'))->default(100);
        $form->number('is_del', __('Is del'))->default(1);

        return $form;
    }
}
