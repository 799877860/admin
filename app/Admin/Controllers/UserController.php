<?php

namespace App\Admin\Controllers;

use App\Models\UserModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserModel());

        $grid->column('u_id', __('U id'));
        $grid->column('u_name', __('用户名'));
        $grid->column('u_email', __('电子邮箱'));
        $grid->column('u_mobile', __('手机号'));
        $grid->column('u_question', __('密保问题'))->label();
        // $grid->column('u_answer', __('密报答案'));
        $grid->column('u_role', __('用户权限'))->label();
        // $grid->column('u_pass', __('用户密码'));
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
        $show = new Show(UserModel::findOrFail($id));

        $show->field('u_id', __('U id'));
        $show->field('u_name', __('U name'));
        $show->field('u_email', __('U email'));
        $show->field('u_mobile', __('U mobile'));
        $show->field('u_question', __('U question'));
        $show->field('u_answer', __('U answer'));
        $show->field('u_role', __('U role'));
        $show->field('u_pass', __('U pass'));
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
        $form = new Form(new UserModel());

        $form->text('u_name', __('用户名'));
        $form->text('u_email', __('电子邮箱'));
        $form->text('u_mobile', __('手机号'));
        $question = [
            1 => '您父亲的姓名？',
            2 => '您母亲的姓名？',
            3 => '您母亲的生日？' ,
            4 => '您父亲的生日？' ,
        ];
        $form->select('u_question', '密保问题')->options($question);
        $form->text('u_answer', __('密保答案'));
        $form->radio('u_role','用户权限')->options([0 => '管理员', 1 => '普通用户']);
        $form->password('u_pass', __('用户密码'));

        return $form;
    }
}
