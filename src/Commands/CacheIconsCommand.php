<?php

namespace Caneco\Blicons\Commands;

use Illuminate\Console\Command;

class CacheIconsCommand extends Command
{
    public $signature = 'cache:icons';

    public $description = 'Create a cache file of you icon set';

    public function handle()
    {
        $iconsFolderPath = resource_path('icons/*.svg');

        $list = collect(glob($iconsFolderPath))
            ->mapWithKeys(function ($file) {
                $name = pathinfo($file, PATHINFO_FILENAME);
                $icon = '';
                foreach (simplexml_load_file($file)->children() as $node) {
                    $icon .= $node->asXML();
                }
                return [$name => $icon];
            });

        $cacheIconsPath = bootstrap_path('cache/icons.php');

        file_put_contents(
            $cacheIconsPath,
            '<?php return '.var_export($list->toArray(), true).';'.PHP_EOL,
        );

        try {
            require $cacheIconsPath;
        } catch (\Throwable $e) {
            unlink($cacheIconsPath);

            throw new \LogicException('Your configuration files are not serializable.', 0, $e);
        }

        $this->info('Configuration cached successfully!');
    }
}
