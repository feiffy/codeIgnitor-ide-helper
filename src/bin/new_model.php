<?php

$app_path = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/application';
$app_model_path = $app_path . '/models';

if (empty($_SERVER['argv'][1]) || empty($_SERVER['argv'][2])) {
    exit('params db_name or model_name required!');
}

$db_name = $_SERVER['argv'][1];
$model_name = $_SERVER['argv'][2];

$model_classs_name = ucfirst($model_name);
$table_name = strtolower($model_name);
$db_name = strtolower($db_name);
$created_at = date('Y-m-d');

$new_model_tpl = <<<NEW_MODEL_TPL
<?php

/** 
 * 
 * @author 
 * @created_at {$created_at}
 */
class {$model_classs_name}_model extends Base_Model
{
    const TABLE_NAME = '{$table_name}';
    public function __construct()
    {
        parent::__construct(self::TABLE_NAME, 'id', '{$db_name}');
    }

}
NEW_MODEL_TPL;

$app_model_path = $app_model_path . '/' . $db_name . '/' . $model_classs_name . '_model.php';
file_put_contents($app_model_path, $new_model_tpl);

// regenerate my_models
require_once 'make.php';
