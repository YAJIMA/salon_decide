<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 placeholder">
<?php
    if( isset($result) && is_array($result) ){
        echo '<div class="alert alert-danger" role="alert">';
        print_r($result, true);
        echo '</div>';
    } elseif( isset($result) && ! empty($result) ) {
        echo '<div class="alert alert-success" role="alert">';
        echo $result;
        if($result === 'success')
        {
            echo '<br><a href="'.base_url("admin/users").'">ログイン管理に戻る</a>';
        }
        echo '</div>';
    }
?>
                    <form method="post" class="form-horizontal">
                        <h2 class="form-signin-heading"><?php echo ( isset($current_user) ) ? "更新フォーム" : "登録フォーム"; ?></h2>
                        <div class="form-group">
                            <label for="username" class="control-label">ユーザ名</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="User name" value="<?php echo ( isset($current_user['username']) ) ? $current_user['username'] : ''; ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">メールアドレス</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="E Mail address" value="<?php echo ( isset($current_user['email']) ) ? $current_user['email'] : ''; ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">パスワード</label>
                            <input type="text" id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                        <?php if( isset($current_user) ){ ?>
                            <button class="btn btn-lg btn-warning btn-block" type="submit">更新</button>
                        <?php }else{ ?>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">登録</button>
                        <?php } ?>
                        </div>
                    </form>
                    </div>
                    <div class="col-xs-12 col-sm-6 placeholder">
                        
                    </div>
                </div>
            </div>