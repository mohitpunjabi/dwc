<?php namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckLiveDate {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	public function handle($request, Closure $next)
	{
        $LIVE_DATE = Carbon::createFromFormat('Y-m-d H:i:s.u', '2015-3-9 21:26:00.0');
        if($LIVE_DATE->gt(Carbon::now()))
        {
            throw new HttpException(503);
        }
		return $next($request);
	}

}
