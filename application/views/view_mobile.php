<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1 class="page-header">クレジットカード一覧</h1>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#filterForm" aria-expanded="true" aria-controls="collapseOne">
                    検索フォーム <span class="glyphicon glyphicon-menu-down"></span>
                </a>
            </h4>
        </div>
        <div id="filterForm" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <form method="post" action="<?php echo base_url('view/filter');?>" class="form" role="form">
                    <?php foreach ($params as $key => $val) : ?>
                        <div class="col-sm-12">
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

<table class="table table-striped">
<tbody>
<?php foreach($items as $item): ?>
    <tr>
        <td class="col-xs-4">
            <?php if ( ! empty($item['officialurl'])) : ?><a href="<?php echo $item['officialurl']; ?>"><?php endif; ?>
                <?php if ( ! empty($item['picurl'])) : ?>
                    <img src="<?php echo $item['picurl']; ?>" alt="<?php echo $item['name']; ?>" width="130"><br>
                    <?php echo $item['name']; ?>
                <?php else : ?>
                    <?php echo $item['name']; ?>
                <?php endif; ?>
                <?php if ( ! empty($item['pageurl'])) : ?></a><?php endif; ?><br>

            <?php if ( ! empty($item['officialurl'])) : ?>
                <a href="<?php echo $item['officialurl']; ?>" class="btn btn-danger btn-sm">公式サイトを見る</a><br>
            <?php endif; ?>
            <?php if ( ! empty($item['pageurl'])) : ?>
                <a href="<?php echo $item['pageurl']; ?>" class="btn btn-danger btn-sm">詳細を見る</a><br>
            <?php endif; ?>
        </td>
        <td class="col-xs-8">
            <div class="text-left">
                <b>こだわり条件</b><br>
                <?php foreach($item['card_type_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?>
                <br>
                <b>年会費</b>
                <a href="<?php echo base_url('view').'?annual_due=asc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'annual_due=asc') : echo 'text-danger'; endif;?>"></span></a>
                <a href="<?php echo base_url('view').'?annual_due=desc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'annual_due=desc') : echo 'text-danger'; endif;?>"></span></a><br>
                <?php foreach($item['annual_due_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?>
                <br>
                <b>審査時間</b>
                <a href="<?php echo base_url('view').'?examination=asc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'examination=asc') : echo 'text-danger'; endif;?>"></span></a>
                <a href="<?php echo base_url('view').'?examination=desc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'examination=desc') : echo 'text-danger'; endif;?>"></span></a><br>
                <?php foreach($item['examination_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?>
                <br>
                <b>国際ブランド</b>
                <a href="<?php echo base_url('view').'?brand=desc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'brand=desc') : echo 'text-danger'; endif;?>"></span></a>
                <a href="<?php echo base_url('view').'?brand=asc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'brand=asc') : echo 'text-danger'; endif;?>"></span></a><br>
                <?php foreach($item['brand_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?>
                <br>
                <b>ポイント還元率</b>
                <a href="<?php echo base_url('view').'?pt_reduction_rate=asc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'pt_reduction_rate=asc') : echo 'text-danger'; endif;?>"></span></a>
                <a href="<?php echo base_url('view').'?pt_reduction_rate=desc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'pt_reduction_rate=desc') : echo 'text-danger'; endif;?>"></span></a><br>
                <?php foreach($item['pt_reduction_rate_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?>
                <br>
                <b>ポイント交換先</b><br>
                <?php foreach($item['pt_exchange_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?>
                <br>
                <b>電子マネー</b><br>
                <?php foreach($item['electronic_money_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?>
            </div>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>

