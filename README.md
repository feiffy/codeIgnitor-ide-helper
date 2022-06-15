CodeIgnitor IDE Helper

used for Phpstorm，enable auto-completion for CI's dynamic property and CI models。

## Usage

``` sh
$ composer require feiffy/codeignitor-ide-helper
$ php vendor/feiffy/codeignitor-ide-helper/src/bin/make.php

# auto-generating models and CI's property docs, 
```

In phpstorm, marked your CI projects `system` as **Excluded** by right click `system` directory and select **Marked Directory as**, in popup up menu, click **Excluded**.

All is finished, and your phpstorm code auto-completion is enabled.

Enjoy your coding!

### make new model

``` bash
$ php vendor/feiffy/codeignitor-ide-helper/src/bin/make.php your_db_name your_table_name
```

## TODO
* support namespace
* remove duplicated models
