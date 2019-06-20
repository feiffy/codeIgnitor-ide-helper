<?php

# TODO
# AUTO-GENERATING MY_MODELS

$my_models = " *";

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