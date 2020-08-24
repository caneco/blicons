<?php

if (! function_exists('bootstrap_path')) {
    function bootstrap_path(string $path = ''): string
    {
        return app()->bootstrapPath($path);
    }
}
