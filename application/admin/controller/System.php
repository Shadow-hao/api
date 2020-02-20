<?php


namespace app\admin\controller;


class System extends BaseController
{
    public function clear_cache()
    {
        if (delete_dir_file(CACHE_PATH) || delete_dir_file(TEMP_PATH)) {
            return msg(0,'清除缓存成功');
        } else {
            return msg(1,'清除缓存失败');
        }
    }

    public function clear_log()
    {
        if (delete_dir_file(LOG_PATH)) {
            return msg(0,'清除日志成功');
        } else {
            return msg(1,'清除日志失败');
        }

    }
}