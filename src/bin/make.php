<?php

# TODO
# AUTO-GENERATING MY_MODELS

static $my_models = " *\n";

$app_path = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/application/models';

work($app_path, $my_models);

$my_models_tpl = <<<MY_MODELS_TPL
<?php die();

/**
 * Add you custom models here that you are loading in your controllers
 *
 * <code>
 * \$this->site_model->get_records()
 * </code>
 * Where site_model is the model Class
 *
 * ---------------------- Models to Load ----------------------
 * <examples>
{$my_models}
 */
class my_models
{
}

// End my_models.php

MY_MODELS_TPL;

$filename = dirname(dirname(__FILE__)) . '/my_models.php';
file_put_contents($filename, $my_models_tpl);

function work($file, &$my_models)
{
    if (is_dir($file)) {
        $list = scandir($file);
        foreach ($list as $item) {
            if ($item == '.') continue;
            if ($item == '..') continue;
            $item = $file . '/' . $item;
            if (is_dir($item)) { // 目录，继续向下遍历
                work($item, $my_models);
            } else { // 文件，则判断是否PHP，cd

                if (pathinfo($item, PATHINFO_EXTENSION) == 'php') {
                    $model_name = get_model_name($item);
                    $my_models .= " * @property $model_name $model_name\n";
                }
            }
        }
    } else {
        echo "not dir!!";
    }
}

echo $my_models;

function get_model_name($file)
{
    $file = basename($file);
    $file = str_replace('.php', '', $file);
    return $file;
}