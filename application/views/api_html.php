<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form method="post" action="<?php echo base_url('view/filter');?>" class="form" role="form">
    <div class="row" id="prefecture_row">
        <div class="col-md-3">都道府県</div>
        <div class="col-md-9">
            <select name="prefecture_name" class="form-control">
                <?php foreach ($params['prefecture_name'] as $val) : ?>
                    <option value="<?php echo $val['cols']; ?>" <?php if (isset($_SESSION['filter']['prefecture_name']) && intval($_SESSION['filter']['prefecture_name'],10) & intval($val['cols'],10)) echo "selected"; ?>><?php echo $val['param_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <hr>
    <div class="row" id="body_parts_row">
        <div class="col-md-3">部位</div>
        <div class="col-md-9">
            <select name="body_parts" class="form-control">
                <?php foreach ($params['body_parts'] as $val) : ?>
                    <option value="<?php echo $val['cols']; ?>" <?php if (isset($_SESSION['filter']['body_parts']) && intval($_SESSION['filter']['body_parts'],10) & intval($val['cols'],10)) echo "selected"; ?>><?php echo $val['param_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <hr>
    <div class="row" id="payments_row">
        <div class="col-md-3">支払い方法</div>
        <div class="col-md-9">
            <?php foreach ($params['payments'] as $val) : ?>
                <div class="col-md-4 text-left">
                    <label>
                        <input type="checkbox" name="payments[]" value="<?php echo $val['cols'];?>"
                            <?php if (isset($_SESSION['filter']['payments']) && intval($_SESSION['filter']['payments'],10) & intval($val['cols'],10)) echo "checked"; ?>>
                        <?php echo $val['param_name'];?>
                    </label>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <hr>
    <div class="row" id="pr_points_row">
        <div class="col-md-3">こだわり</div>
        <div class="col-md-9">
            <?php foreach ($params['pr_points'] as $val) : ?>
                <div class="col-md-4 text-left">
                    <label>
                        <input type="checkbox" name="pr_points[]" value="<?php echo $val['cols'];?>"
                            <?php if (isset($_SESSION['filter']['pr_points']) && intval($_SESSION['filter']['pr_points'],10) & intval($val['cols'],10)) echo "checked"; ?>>
                        <?php echo $val['param_name'];?>
                    </label>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <hr>
    <div class="row" id="access_row">
        <div class="col-md-3">通いやすさ</div>
        <div class="col-md-9">
            <?php foreach ($params['access'] as $val) : ?>
                <div class="col-md-4 text-left">
                    <label>
                        <input type="checkbox" name="access[]" value="<?php echo $val['cols'];?>"
                            <?php if (isset($_SESSION['filter']['access']) && intval($_SESSION['filter']['access'],10) & intval($val['cols'],10)) echo "checked"; ?>>
                        <?php echo $val['param_name'];?>
                    </label>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <hr>
    <div class="row" id="services_row">
        <div class="col-md-3">サービス</div>
        <div class="col-md-9">
            <?php foreach ($params['services'] as $val) : ?>
                <div class="col-md-4 text-left">
                    <label>
                        <input type="checkbox" name="services[]" value="<?php echo $val['cols'];?>"
                            <?php if (isset($_SESSION['filter']['services']) && intval($_SESSION['filter']['services'],10) & intval($val['cols'],10)) echo "checked"; ?>>
                        <?php echo $val['param_name'];?>
                    </label>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <hr>
    <div class="clearfix col-sm-12 text-center">
        <button type="submit" class="btn btn-primary">絞り込み検索</button>
    </div>
</form>