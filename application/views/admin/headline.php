<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url("admin/top");?>">CreditCards</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li <?php if ($nav === 'top'): ?>class="active"<?php endif; ?>><a href="<?php echo base_url("admin/top");?>">管理トップ
                            <?php if ($nav === 'top'): ?><span class="sr-only">(*)</span><?php endif; ?></a></li>
                    <li <?php if ($nav === 'items'): ?>class="active"<?php endif; ?>><a href="<?php echo base_url("admin/items");?>">カード一覧
                            <?php if ($nav === 'items'): ?><span class="sr-only">(*)</span><?php endif; ?></a></li>
                    <li <?php if ($nav === 'users'): ?>class="active"<?php endif; ?>><a href="<?php echo base_url("admin/users");?>">ログイン管理
                            <?php if ($nav === 'users'): ?><span class="sr-only">(*)</span><?php endif; ?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url("admin/login/logout");?>"><span class="glyphicon glyphicon-log-out"></span>ログアウト</a></li>
                </ul>
                <!-- <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form> -->
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
