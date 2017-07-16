<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <h1 class="page-header">クレジットカード登録</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-12 placeholder">
            <h4>クレジットカード登録</h4>
            <?php echo form_open('admin/items/insert'); ?>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th class="text-right">カード</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="クレジットカード名称" name="name" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">リンク先URL</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="http://link.to.card/page" name="pageurl" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">画像URL</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="http://***/***.jpg" name="picurl" value="">
                    </td>
                </tr>
                <?php foreach ($params as $key => $val) : ?>
                    <tr>
                        <th class="text-right"><?php echo $val[0]['group_name'];?></th>
                        <td class="text-left">
                            <?php foreach ($val as $v) : ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="<?php echo $key;?>[]" value="<?php echo $v['cols'];?>">
                                        <?php echo $v['param_name'];?>
                                    </label>
                                </div>
                            <?php endforeach;?>
                        </td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <th class="text-right">並び順</th>
                    <td class="text-left">
                        <input type="number" class="form-control" placeholder="0" name="sort" value="0">
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="col-sm-6 text-left">
                <button type="reset" class="btn btn-default">リセット</button>
            </div>
            <div class="col-sm-6 text-right">
                <button type="submit" class="btn btn-primary">　登録　</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>