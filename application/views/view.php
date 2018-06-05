<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-sm-12 main">

    <h1 class="page-header">脱毛サロン一覧</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>サロン名
                <a href="<?php echo base_url('view').'?kana=asc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'kana=asc') : echo 'text-danger'; endif;?>"></span></a>
                <a href="<?php echo base_url('view').'?kana=desc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'kana=desc') : echo 'text-danger'; endif;?>"></span></a></th>
            <th>
                料金の安さ
                <a href="<?php echo base_url('view').'?price_pt=asc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'price_pt=asc') : echo 'text-danger'; endif;?>"></span></a>
                <a href="<?php echo base_url('view').'?price_pt=desc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'price_pt=desc') : echo 'text-danger'; endif;?>"></span></a>
            </th>
            <th>
                口コミ評価
                <a href="<?php echo base_url('view').'?follow_pt=asc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'follow_pt=asc') : echo 'text-danger'; endif;?>"></span></a>
                <a href="<?php echo base_url('view').'?follow_pt=desc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'follow_pt=desc') : echo 'text-danger'; endif;?>"></span></a>
            </th>
            <th>
                店舗数
                <a href="<?php echo base_url('view').'?shops=asc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'shops=asc') : echo 'text-danger'; endif;?>"></span></a>
                <a href="<?php echo base_url('view').'?shops=desc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'shops=desc') : echo 'text-danger'; endif;?>"></span></a>
            </th>
            <th>
                ポイント
                <a href="<?php echo base_url('view').'?comment_pc=asc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'comment_pc=asc') : echo 'text-danger'; endif;?>"></span></a>
                <a href="<?php echo base_url('view').'?comment_pc=desc'; ?>" ><span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'comment_pc=desc') : echo 'text-danger'; endif;?>"></span></a>
            </th>
            <th>詳細</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($items as $item): ?>
        <tr>
            <td>
                <?php if ( ! empty($item['officialurl'])) : ?>
                    <a href="<?php echo $item['officialurl']; ?>">
                <?php endif; ?>
                <?php if ( ! empty($item['picurl_pc'])) : ?>
                    <img src="<?php echo $item['picurl_pc']; ?>" alt="<?php echo $item['name']; ?>" width="130"><br>
                    <?php echo $item['name']; ?>
                <?php else : ?>
                    <?php echo $item['name']; ?>
                <?php endif; ?>
                <?php if ( ! empty($item['pageurl'])) : ?>
                    </a>
                <?php endif; ?>
            </td>
            <td>
                <?php if ( ! empty($item['price_text_pc'])) :
                    echo $item['price_text_pc'];
                else :
                    echo $item['price_pt']."Pt";
                endif; ?></td>
            <td><?php if ( ! empty($item['follow_stars'])) : ?>
                    <img src="<?php echo $item['follow_stars']; ?>" width="40%" alt="<?php echo $item['follow_pt']; ?>Pt">
                <?php endif; ?>
                <?php echo $item['follow_pt']; ?>Pt</td>
            <td><?php echo $item['shops']; ?></td>
            <td><?php echo $item['comment_pc']; ?></td>
            <td>
                <?php if ( ! empty($item['pageurl'])) : ?>
                    <a href="<?php echo $item['pageurl']; ?>" class="btn btn-danger btn-sm">詳細を見る</a>
                <?php endif; ?>
                <?php if ( ! empty($item['officialurl'])) : ?>
                    <a href="<?php echo $item['officialurl']; ?>" class="btn btn-danger btn-sm">公式サイトを見る</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

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
                        <div class="row">
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
                        <div class="row">
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
                        <div class="row">
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
                        <div class="row">
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
                        <div class="row">
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
                        <div class="row">
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
                </div>
            </div>
        </div>
    </div>
</div>
