<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                
                <h1 class="page-header">ログイン管理</h1>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 placeholder">
                        <h4>アカウント一覧</h4>
                        <span class="text-muted">アカウントの追加は<a href="<?php echo base_url('admin/users/regist');?>">こちら</a></span>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ユーザ名</th>
                                    <th>メールアドレス</th>
                                    <th class="text-right">削除・更新</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($Users as $user){ ?>
                                <tr>
                                    <td class="text-left"><?php echo $user['username']; ?></td>
                                    <td class="text-left"><?php echo $user['email']; ?></td>
                                    <td class="text-right">
                                        <a href="<?php echo base_url('admin/users/delete/'.$user['id']);?>" class="btn btn-sm btn-danger"
                                            onclick="return confirm('アカウントを削除します。よろしいですか？\nこの作業は取り消しできません。');return false;">削除</a>
                                        <a href="<?php echo base_url('admin/users/update/'.$user['id']);?>" class="btn btn-sm btn-warning">更新</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12 col-sm-6 placeholder">
                        
                    </div>
                </div>
            </div>