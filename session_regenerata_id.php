<?php

// sessionをスタートしてidを再生成しよう．
// 旧idと新idを表示しよう．
session_start();
$old_session_id = session_id();
session_regenerate_id(true); //trueにすれば前作ったsession_idを無効にしてくれる
$new_session_id = session_id();
