<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRestaurant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    $user = auth()->user();
    
    if ($user) {
        // Verifica se l'utente ha già un ristorante
        if (!$user->restaurants) {
            
            // Verifica se l'utente non è già sulla pagina di creazione del ristorante
            if ($request->route()->getName() !== 'admin.restaurants.create') {
                // Se non ha un ristorante e non è già sulla pagina di creazione del ristorante, reindirizzalo
                return redirect()->route('admin.restaurants.create')->with('error', 'Prima devi creare un ristorante.');
            }
        }
    }
    
    return $next($request);
    
}

}
