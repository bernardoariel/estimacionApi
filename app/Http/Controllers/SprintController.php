<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    public function nuevo(Request $request){
        // Valida los datos enviados desde el formulario si es necesario
        $request->validate([
            'sprint' => 'required|string|max:10',
        ]);
        
        // Crea una nueva instancia del modelo Estimacion con los datos del formulario
        $sprint = new Sprint();
        $sprint->sprint = $request->input('sprint');
        
        // Asigna otros campos del modelo si los tienes en el formulario

        // Guarda el nuevo registro en la base de datos
        $sprint->save();

        return response()->json(['message' => 'Registros registrado con éxito', 'sprint' => $sprint->sprint ]);
    }
    public function eliminarRegistros(){
        // Elimina todos los registros de la tabla 'estimaciones'
        Sprint::truncate();

        return response()->json(['message' => 'Registros eliminados con éxito']);
    }
    public function lastSprint(){
        
        $sprint = Sprint::orderBy('id', 'desc')->first();

        if(!$sprint){
            $sprintData = [
                'id' => null,
                'sprint' => null,
                'created_at' => null,
            ];
            return response()->json(['message' => 'No existen registros', 'sprint' => $sprintData]);
        }
        $sprintData = [
            'id' => $sprint->id,
            'sprint' => $sprint->sprint,
            'created_at' => substr($sprint->created_at, 0, 10),
        ];
    
        return response()->json(['message' => 'Estos son los registros', 'sprint' => $sprintData]);
    }
}
