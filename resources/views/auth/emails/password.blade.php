ここをクリックしてパスワードを変更しろよな！: {{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">

