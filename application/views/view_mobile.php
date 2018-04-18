<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1 class="page-header">脱毛サロン一覧</h1>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#filterForm" aria-expanded="true" aria-controls="collapseOne">
                    並べ替え <span class="glyphicon glyphicon-menu-down"></span>
                </a>
            </h4>
        </div>
        <div id="filterForm" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4">
                        <b>料金の安さ</b>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo base_url('view').'?price_pt=desc'; ?>" >高い<span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'price_pt=desc') : echo 'text-danger'; endif;?>"></span></a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo base_url('view').'?price_pt=asc'; ?>" >安い<span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'price_pt=asc') : echo 'text-danger'; endif;?>"></span></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <b>口コミ評価</b>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo base_url('view').'?follow_pt=desc'; ?>" >高い<span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'follow_pt=desc') : echo 'text-danger'; endif;?>"></span></a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo base_url('view').'?follow_pt=asc'; ?>" >低い<span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'follow_pt=asc') : echo 'text-danger'; endif;?>"></span></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <b>店舗数</b>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo base_url('view').'?shops=desc'; ?>" >多い<span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'shops=desc') : echo 'text-danger'; endif;?>"></span></a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo base_url('view').'?shops=asc'; ?>" >少ない<span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'shops=asc') : echo 'text-danger'; endif;?>"></span></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <b>名前順</b>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo base_url('view').'?kana=desc'; ?>" >降順<span class="glyphicon glyphicon-sort-by-attributes-alt <?php if ($sortparam === 'kana=desc') : echo 'text-danger'; endif;?>"></span></a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo base_url('view').'?kana=asc'; ?>" >昇順<span class="glyphicon glyphicon-sort-by-attributes <?php if ($sortparam === 'kana=asc') : echo 'text-danger'; endif;?>"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /#accordion -->


<?php foreach($items as $item): ?>
<div class="item">
    <h1 class="itemname"><?php echo $item['name']; ?></h1>
    <p class="follow text-center">
        口コミ満足度
        <?php if ( ! empty($item['follow_stars'])) : ?>
        <img src="<?php echo $item['follow_stars']; ?>" width="40%" alt="<?php echo $item['follow_pt']; ?>Pt">
        <?php endif; ?>
        <?php echo $item['follow_pt']; ?>Pt</p>
    <div class="pic">
        <?php if ( ! empty($item['picurl_sp'])) : ?>
            <img src="<?php echo $item['picurl_sp']; ?>" alt="<?php echo $item['name']; ?>" width="100%">
        <?php else : ?>
            <?php echo $item['name']; ?>
        <?php endif; ?>
    </div>
    <div class="comment">
        <div class="head">おすすめポイント</div>
        <div class="body">
            <?php echo $item['comment_sp']; ?>
        </div>
    </div>
    <div class="data">
        <div class="head">その他データ</div>
        <div class="body">
            <b>料金の安さ</b><br>
            <?php if ( ! empty($item['price_text_sp'])) :
            echo $item['price_text_sp'];
            else :
            echo $item['price_pt']."Pt";
            endif; ?><br>
            <b>店舗数</b><br>
            <?php echo $item['shops']; ?>店<br>
        </div>
    </div>
    <div class="link">
        <div class="head">リンク</div>
        <div class="body">
            <?php if ( ! empty($item['officialurl'])) : ?>
                <p><a href="<?php echo $item['officialurl']; ?>"><?php if ( ! empty($item['officialurl_text'])) :
                echo $item['officialurl_text'];
                else :
                echo "公式サイトを見る";
                endif; ?></a></p>
            <?php endif; ?>
            <?php if ( ! empty($item['pageurl'])) : ?>
                <p><a href="<?php echo $item['pageurl']; ?>">詳細を見る</a></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endforeach; ?>

<style type="text/css">
    .comment, .data, .link {
        margin: 1em 0.8em;
    }
    .head {
        background-color: hotpink;
        color: #ffffff;
        text-align: center;
    }
    .body {
        text-align: center;
    }
</style>

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