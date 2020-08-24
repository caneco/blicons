<?php

namespace Caneco\Blicons;

use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            BliconsServiceProvider::class,
        ];
    }

    protected function renderComponent(string $component, array $data = [])
    {
        [$data, $attributes] = $this->partitionDataAndAttributes($component, $data);

        $component = $this->app->make($component, $data->all());

        $component->withAttributes($attributes->all());

        $view = $component->resolveView();

        $view->with($component->data());

        return trim($view->render());
    }

    protected function partitionDataAndAttributes($class, array $attributes)
    {
        $constructor = (new \ReflectionClass($class))->getConstructor();

        $parameterNames = $constructor
            ? collect($constructor->getParameters())->map->getName()->all()
            : [];

        return collect($attributes)->partition(function ($value, $key) use ($parameterNames) {
            return in_array(Str::camel($key), $parameterNames);
        });
    }
}
