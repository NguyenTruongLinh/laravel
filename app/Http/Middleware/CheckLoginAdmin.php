<?php
/**
 * Created by PhpStorm.
 * User: linh
 * Date: 2019-04-14
 * Time: 18:12
 */

namespace App\Http\Middleware;
use Closure;

class CheckLoginAdmin
{
    public function handle($request, Closure $next)
    {
        if (!get_data_user('admins'))
        {
            return redirect()->route('admin.login')->with('error', 'Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục!');
        }

        return $next($request);
    }
}