<?php namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthenticateWithAdminAuth {

	/**
	 * If the user is not an admin, show a 403 error.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(!$request->user()->is_admin)
        {
            throw new HttpException(403);
        }

		return $next($request);
	}

}
