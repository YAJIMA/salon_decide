<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <h1 class="page-header">クレジットカード管理</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <h4>クレジットカード一覧</h4>
            <span class="text-muted">クレジットカードの追加は<a href="<?php echo base_url("admin/items/regist");?>">こちら</a></span>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>カード</th>
                    <th>こだわり条件</th>
                    <th>年会費</th>
                    <th>ポイント還元率</th>
                    <th>詳細</th>
                    <th>更新</th>
                    <th>削除</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($items as $key => $item): ?>
                    <tr class="<?php if ($item['updatenow'] === TRUE) : echo "warning"; endif; ?>" >
                        <td>
                            <a data-toggle="modal" data-target="#myModal<?php echo $key; ?>">
                            <?php if ( ! empty($item['picurl'])) : ?>
                                <img src="<?php echo $item['picurl']; ?>" alt="<?php echo $item['name']; ?>" width="130"><br>
                            <?php endif; ?>
                            <?php echo $item['name']; ?></a><br>
                            <?php if ( ! empty($item['pageurl'])) : ?>
                                <a href="<?php echo $item['pageurl']; ?>" target="_blank">
                                <?php echo $item['pageurl']; ?></a>
                            <?php endif; ?>
                        </td>
                        <td><?php foreach($item['card_type_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?></td>
                        <td><?php foreach($item['annual_due_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?></td>
                        <td><?php foreach($item['pt_reduction_rate_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?></td>
                        <td><!-- 詳細 -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $key; ?>">
                                詳細データ
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $item['name']; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                            <table class="table table-striped table-condensed">
                                                <tbody>
                                                <tr>
                                                    <th style="white-space: nowrap;">カード名</th>
                                                    <td><?php echo $item['name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="white-space: nowrap;">URL</th>
                                                    <td><?php echo $item['pageurl']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="white-space: nowrap;">画像URL</th>
                                                    <td><?php echo $item['picurl']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="white-space: nowrap;">こだわり条件</th>
                                                    <td><?php foreach($item['card_type_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="white-space: nowrap;">年会費</th>
                                                    <td><?php foreach($item['annual_due_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="white-space: nowrap;">審査時間</th>
                                                    <td><?php foreach($item['examination_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="white-space: nowrap;">国際ブランド</th>
                                                    <td><?php foreach($item['brand_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="white-space: nowrap;">ポイント還元率</th>
                                                    <td><?php foreach($item['pt_reduction_rate_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="white-space: nowrap;">ポイント交換先</th>
                                                    <td><?php foreach($item['pt_exchange_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="white-space: nowrap;">電子マネー</th>
                                                    <td><?php foreach($item['electronic_money_values'] as $pv) : echo $pv['param_name'] . "<br>"; endforeach; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="white-space: nowrap;">並び順</th>
                                                    <td><?php echo $item['sort']; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                            <a href="<?php echo base_url("admin/items/edit/".$item['id']);?>" class="btn btn-warning">編集</a>
                                            <a href="<?php echo base_url("admin/items/delete/".$item['id']);?>" class="btn btn-danger" onclick="return confirm('「<?php echo $item['name']; ?>」を削除します。よろしいですか？'); return false;">削除</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><!-- 更新 -->
                            <a href="<?php echo base_url("admin/items/edit/".$item['id']);?>" class="btn btn-warning btn-sm">編集</a>
                        </td>
                        <td><!-- 削除 -->
                            <a href="<?php echo base_url("admin/items/delete/".$item['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('「<?php echo $item['name']; ?>」を削除します。よろしいですか？'); return false;">削除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>カード</th>
                    <th>こだわり条件</th>
                    <th>年会費</th>
                    <th>ポイント還元率</th>
                    <th>詳細</th>
                    <th>更新</th>
                    <th>削除</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>