<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

class ManagePermissions
{
    const DELIMITER = '|';

    protected $auth;

    protected $guard;

    public function __construct(Guard $guard)
    {
        $this->auth = $guard;
    }
    protected $route_methods = [
        'index'=>'browse',
        'show'=>'read',
        'create'=>'add',
        'store'=>'add',
        'edit'=>'edit',
        'update'=>'edit',
        'destroy'=>'delete'
     ];

    protected $extra_route_prefix = ['edu'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->hasRole('super')) {
            return $next($request);
        }

        $premission_key = $this->keyGererate($request);

        if (Permission::where('key', '=', $premission_key)->exists()) {
            
            // checking permission key that user has or not
            if (!$request->user()->hasPermission($premission_key)) {
                return Redirect::back()->with('warn', 'You are not authorized!!!');
            }
        }
        return $next($request);
    }


    private function keyGererate($request)
    {
        $route = explode('.', $request->route()->getName());

        $method = end($route);
        
        if (isset($this->route_methods[$method])) {
            $method = $this->route_methods[$method];
        }
        array_pop($route);
    
        return $method . '_' .  $this->getExtraRoutePrefix($request) . end($route);
    }

    /**
    * Get excepted route prifix.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return string
    */
    private function getExtraRoutePrefix($request)
    {
        $prefix = str_replace('manage', '/', $request->route()->getPrefix());
        $prefix = str_replace('/', '', $prefix);
        if (in_array($prefix, $this->extra_route_prefix)) {
            return $prefix . '_';
        }
        return '';
    }
}
