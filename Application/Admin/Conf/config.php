<?php

return array(
    'TAGLIB_PRE_LOAD' => 'html', // 需要额外加载的标签库(须指定标签库名称)，多个以逗号分隔 
    'SESSION_PREFIX' => 'admin_', // session 前缀
);
if (defined('GROUP_NAME')) {
    $replace['__GROUP__'] = __GROUP__; // 当前项目地址
}