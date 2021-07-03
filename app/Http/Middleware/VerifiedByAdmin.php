<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifiedByAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $query = DB::table('traders')->where('user_id',auth()->user()->id)->get();
        foreach($query as $query){
            if($query->verified_trader=='yes'){
                return $next($request);
            }
        }   
        
        return redirect('/')->with('notVerified','Please wait while our Administration verifies your account.');
    }
}
