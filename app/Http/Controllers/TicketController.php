<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * @param $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function create(Request $request) {
        try {
            $ticket = new Ticket();
            $ticket->id = $request->id;
            $ticket->user = $request->user;
            $ticket->status = $request->status;
            $ticket->save();
            return response('Guardó exitosamente los datos', 200)->header('Content-Type', 'text/plain');
        } catch (Throwable $e) {
            return response('Error al guardar información.', 200)->header('Content-Type', 'text/plain');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            if ($request->id || $request->user) {
                $ticket = Ticket::where('id', $request->id ?? $request->user)->first();
                if ($ticket) {
                    $ticket->delete();
                    return response('Eliminado correctamente', 200)->header('Content-Type', 'text/plain');
                }else {
                    return response('No existe registro con ese id', 200)->header('Content-Type', 'text/plain');
                }
            }
        } catch (Throwable $e) {
            return response('Error al eliminar información.', 200)->header('Content-Type', 'text/plain');
        }
    }
    public function edit(Request $request)
    {
        try {
            $ticket = Ticket::where('id',$request->id)->first();
            if($ticket){
                $ticket->user = $request->user;
                $ticket->save();
            }
            else {
                return response('No existe registro con ese id', 200)->header('Content-Type', 'text/plain');
            }
            return response('Actualizo los datos', 200)->header('Content-Type', 'text/plain');
        } catch (Throwable $e) {
            return response('Error al guardar información.', 200)->header('Content-Type', 'text/plain');
        }

    }
    public function see(Request $request)
    {

        $ticket = Ticket::where('id',$request->id)->first();
        if($ticket){
            return $ticket;
        }else {
            return response('No existe registro con ese id.', 200)->header('Content-Type', 'text/plain');
        }

    }
    public function seeAll()
    {
        $tickets = Ticket::get();
        return response($tickets, 200)->header('Content-Type', 'text/plain');

    }
}
