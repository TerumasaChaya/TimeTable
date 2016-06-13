<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="/design/styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/design/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/design/styles/animate.css">
    <link type="text/css" rel="stylesheet" href="/design/styles/all.css">
    <link type="text/css" rel="stylesheet" href="/design/styles/main.css">
    <link type="text/css" rel="stylesheet" href="/design/styles/style-responsive.css">
</head>
<body style="background: url('/design/images/bg/bg.png') center center fixed;">
    <div class="page-form">
        <div class="panel panel-blue">
            <div class="panel-body pan">
                <form action="#" class="form-horizontal">
                <div class="form-body pal">
                    <div class="col-md-12 text-center">
                        <h1 style="margin-top: -90px; font-size: 48px;">
                            CarryCullam</h1>
                        <br />
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="/design/images/avatar/profile-pic.png" class="img-responsive" style="margin-top: -35px;" />
                        </div>
                        <div class="col-md-9 text-center">
                            <h1>
                                管理者ログイン画面</h1>
                            <br />
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">
                            メールアドレス:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" type="text" placeholder="" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-3 control-label">
                            パスワード:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="inputPassword" type="text" placeholder="" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="rememberpass" style="padding-left:280px;">
                <input type="checkbox" name="rememberusername" id="rememberusername" value="1" checked="checked" />
                  <label for="rememberusername">ユーザ名を記憶する</label>
              </div>
                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-lg-3">

                                </div>
                                <div class="col-lg-9">
                                    <a href="login-user.blade.php" class="btn btn-default">ログイン</a>&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-default">キャンセル
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <p>
                <a href="login-user.blade.php">一般ユーザーの方はこちら</a>&nbsp;&nbsp;
            </p>
        </div>
    </div>
</body>
</html>
