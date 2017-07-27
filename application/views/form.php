<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-sm-12 main">

    <h1 class="page-header">クレジットカードを探す</h1>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#filterForm" aria-expanded="true" aria-controls="collapseOne">
                        検索フォーム <span class="glyphicon glyphicon-menu-down"></span>
                    </a>
                </h4>
            </div>
            <div id="filterForm" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <form method="post" action="<?php echo base_url('view/filter');?>" class="form" role="form">
                        <?php foreach ($params as $key => $val) : ?>
                            <div class="col-sm-3">
                                <h5><?php echo $val[0]['group_name'];?></h5>
                                <?php foreach ($val as $v) : ?>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="<?php echo $key;?>[]" value="<?php echo $v['cols'];?>"
                                            <?php if (isset($_SESSION['filter'][$key]) && intval($_SESSION['filter'][$key],10) & intval($v['cols'],10)) : echo "checked"; endif; ?>>
                                            <?php echo $v['param_name'];?>
                                        </label>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        <?php endforeach; ?>
                        <div class="clearfix col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">絞り込み検索</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
