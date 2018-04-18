<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li <?php if ($nav === 'top'): ?>class="active"<?php endif; ?>><a href="<?php echo base_url("admin/top");?>">管理トップ
                            <?php if ($nav === 'top'): ?><span class="sr-only">(*)</span><?php endif; ?></a></li>
                    <li <?php if ($nav === 'items'): ?>class="active"<?php endif; ?>><a href="<?php echo base_url("admin/items");?>">サロン一覧
                            <?php if ($nav === 'items'): ?><span class="sr-only">(*)</span><?php endif; ?></a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <!-- <li><a href="/api/setting">データ取得設定</a></li> -->
                    <li <?php if ($nav === 'users'): ?>class="active"<?php endif; ?>><a href="<?php echo base_url("admin/users");?>">ログイン管理</a></li>
                </ul>
            </div>
