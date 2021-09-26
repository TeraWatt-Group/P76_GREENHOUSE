<?php

namespace Terawatt\Greenhouse\Http\Controllers\admin;

// use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $envs = [
            ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
            ['name' => 'Laravel version',   'value' => app()->version()],
            ['name' => 'CGI',               'value' => php_sapi_name()],
            ['name' => 'Uname',             'value' => php_uname()],
            ['name' => 'Server',            'value' => Arr::get($_SERVER, 'SERVER_SOFTWARE')],

            ['name' => 'Cache driver',      'value' => config('cache.default')],
            ['name' => 'Session driver',    'value' => config('session.driver')],
            ['name' => 'Queue driver',      'value' => config('queue.default')],

            ['name' => 'Timezone',          'value' => config('app.timezone')],
            ['name' => 'Locale',            'value' => config('app.locale')],
            ['name' => 'Env',               'value' => config('app.env')],
            ['name' => 'URL',               'value' => config('app.url')],
        ];

        $json = file_get_contents(base_path('composer.json'));
        $dependencies = json_decode($json, true)['require'];

        return view('admin.dashboard')
            ->withEnvs($envs)
            ->withDependencies($dependencies);
    }

    public function routes()
    {
        return view('admin.routes')
            ->withModels($this->getModel()->setRoutes($this->getRoutes())->get());
    }

    protected function getModel()
    {
        return new class() extends Model {
            protected $routes;

            protected $where = [];

            public function setRoutes($routes)
            {
                $this->routes = $routes;

                return $this;
            }

            public function where($column, $condition)
            {
                $this->where[$column] = trim($condition);

                return $this;
            }

            public function orderBy()
            {
                return $this;
            }

            public function get()
            {
                $this->routes = collect($this->routes)->filter(function ($route) {
                    foreach ($this->where as $column => $condition) {
                        if (!Str::contains($route[$column], $condition)) {
                            return false;
                        }
                    }

                    return true;
                })->all();

                $instance = $this->newModelInstance();

                return $instance->newCollection(array_map(function ($item) use ($instance) {
                    return $instance->newFromBuilder($item);
                }, $this->routes));
            }
        };
    }

    public function getRoutes()
    {
        $routes = app('router')->getRoutes();

        $routes = collect($routes)->map(function ($route) {
            return $this->getRouteInformation($route);
        });

        if ($filter = request('_filter')) {
            $routes = $this->filterRoutes($filter, $routes);
        }

        if ($sort = request('_sort')) {
            $routes = $this->sortRoutes($sort, $routes);
        }

        return $routes;
    }

    protected function getRouteInformation(Route $route)
    {
        return [
            'host'       => $route->domain(),
            'method'     => $route->methods(),
            'uri'        => $route->uri(),
            'name'       => $route->getName(),
            'action'     => $route->getActionName(),
            'middleware' => $this->getRouteMiddleware($route),
        ];
    }

    protected function filterRoutes($filter, $routes)
    {
        return $routes->filter(function ($item) use ($filter) {
            return str_contains($item['name'], $filter) === true;
        });
    }

    protected function sortRoutes($sort, $routes)
    {
        return Arr::sort($routes, function ($route) use ($sort) {
            return $route[$sort['column']];
        });
    }

    protected function getRouteMiddleware($route)
    {
        return collect($route->gatherMiddleware())->map(function ($middleware) {
            return $middleware instanceof \Closure ? 'Closure' : $middleware;
        });
    }
}
