<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <h1 class="page-header">サロン登録</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <h4>サロン登録</h4>
            <?php echo form_open('admin/items/insert'); ?>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th class="text-right">サロン名称</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="サロン名称" name="name" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">サロン名称（かな）</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="さろんめいしょう" name="kana" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">公式サイトURL</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="http://link.to.card/page" name="officialurl" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">公式サイトリンクテキスト</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="公式サイトはこちら" name="officialurl_text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">詳細ページURL</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="http://link.to.card/page" name="pageurl" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">詳細ページリンクテキスト</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="詳細ページはこちら" name="pageurl_text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">画像URL(PC)</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="http://***/***.jpg" name="picurl_pc" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">画像URL(SP)</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="http://***/***.jpg" name="picurl_sp" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">一言ポイント(SP)</th>
                    <td class="text-left">
                        <textarea name="comment_sp" id="comment_sp" cols="30" rows="10" class="form-control"></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="text-right">おすすめポイント</th>
                    <td class="text-left">
                        <textarea name="comment_pc" id="comment_pc" cols="30" rows="10" class="form-control"></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="text-right">口コミ評価</th>
                    <td class="text-left">
                        <input type="number" step="0.1" class="form-control" placeholder="0" name="follow_pt" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">口コミ画像URL</th>
                    <td class="text-left">
                        <label><input type="radio" name="follow_stars" value="<?php echo base_url("/images/star00.png"); ?>" checked><img src="<?php echo base_url("/images/star00.png"); ?>" width="150" ></label><br>
                        <label><input type="radio" name="follow_stars" value="<?php echo base_url("/images/star05.png"); ?>"><img src="<?php echo base_url("/images/star05.png"); ?>" width="150" ></label><br>
                        <label><input type="radio" name="follow_stars" value="<?php echo base_url("/images/star15.png"); ?>"><img src="<?php echo base_url("/images/star15.png"); ?>" width="150" ></label><br>
                        <label><input type="radio" name="follow_stars" value="<?php echo base_url("/images/star20.png"); ?>"><img src="<?php echo base_url("/images/star20.png"); ?>" width="150" ></label><br>
                        <label><input type="radio" name="follow_stars" value="<?php echo base_url("/images/star25.png"); ?>"><img src="<?php echo base_url("/images/star25.png"); ?>" width="150" ></label><br>
                        <label><input type="radio" name="follow_stars" value="<?php echo base_url("/images/star30.png"); ?>"><img src="<?php echo base_url("/images/star30.png"); ?>" width="150" ></label><br>
                        <label><input type="radio" name="follow_stars" value="<?php echo base_url("/images/star35.png"); ?>"><img src="<?php echo base_url("/images/star35.png"); ?>" width="150" ></label><br>
                        <label><input type="radio" name="follow_stars" value="<?php echo base_url("/images/star40.png"); ?>"><img src="<?php echo base_url("/images/star40.png"); ?>" width="150" ></label><br>
                        <label><input type="radio" name="follow_stars" value="<?php echo base_url("/images/star45.png"); ?>"><img src="<?php echo base_url("/images/star45.png"); ?>" width="150" ></label><br>
                        <label><input type="radio" name="follow_stars" value="<?php echo base_url("/images/star50.png"); ?>"><img src="<?php echo base_url("/images/star50.png"); ?>" width="150" ></label><br>
                        <label><input type="radio" name="follow_stars" value="etc">その他画像(URL)</label>
                        <input type="url" name="follow_stars_url" placeholder="http://***/***.jpg" class="form-control" ><br>
                    </td>
                </tr>
                <tr>
                    <th class="text-right">料金の安さ</th>
                    <td class="text-left">
                        <input type="number" step="0.1" class="form-control" placeholder="0" name="price_pt" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">料金テキスト(PC)</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="料金の安さ" name="price_text_pc" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">料金テキスト(SP)</th>
                    <td class="text-left">
                        <input type="text" class="form-control" placeholder="料金の安さ" name="price_text_sp" value="">
                    </td>
                </tr>
                <tr>
                    <th class="text-right">店舗数</th>
                    <td class="text-left">
                        <input type="number" step="1" class="form-control" placeholder="0" name="shops" value="0">
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