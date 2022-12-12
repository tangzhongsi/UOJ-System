<?php
if (!isset($_POST['username'])) {
    echo "无效表单";
    return;
}
if (!isset($_POST['password'])) {
    echo "无效表单";
    return;
}

$usergroup = $_POST['usergroup'] ? $_POST['usergroup'] : 'U';
$username = $_POST['username'];
$password = md5($_POST['password'] . getPasswordClientSalt());
$motto = $_POST['motto'];
$email = $username.'@zju.edu.cn';
if (!validateUsername($username)) {
    echo $username . " 注册失败：无效学号。";
    return;
}
if (queryUser($username)) {
    echo $username . " 注册失败：学号已存在。";
    return;
}
if (!validatePassword($password)) {
    echo $username .  "注册失败：无效密码。";
    return;
}
if (!validateEmail($email)) {
    echo $username . " 注册失败：无效电子邮箱。";
    return;
}

$password = getPasswordToStore($password, $username);

$esc_email = DB::escape($email);

$svn_pw = uojRandString(10);

DB::query("insert into user_info (usergroup, username, email, password, svn_password, register_time, motto) values ('$usergroup', '$username', '$esc_email', '$password', '$svn_pw', '', '$motto')");

echo "欢迎你！" . $username . "，你已成功注册。";
return;
