<?php

namespace App\Http\Controllers;

use App\Models\Estimacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstimacionController extends Controller
{
    public function ingresar(Request $request){
        // Valida que el campo 'nombre' esté presente en la solicitud
        $request->validate([
            'nombre' => 'required|string'
        ]);

        // Busca si el nombre ya existe en la tabla 'estimaciones'
        $nombreExistente = Estimacion::where('nombre', $request->nombre)->first();

        // Si el nombre ya existe, muestra un mensaje indicando que el nombre ya está en uso
        if ($nombreExistente) {
            return response()->json(['message' => 'El nombre ya existe en la tabla estimaciones', 'nombre' => $nombreExistente->nombre]);
        }

        // Si el nombre no existe, guarda el nuevo registro en la tabla 'estimaciones'
        Estimacion::create([
            'nombre' => $request->nombre
        ]);

        // Devuelve el nombre en la respuesta de éxito
        return response()->json(['message' => 'Nombre guardado con éxito', 'nombre' => $request->nombre]);
    }
    public function ingresarNombreValor(Request $request){
        // Valida que el campo 'nombre' esté presente en la solicitud
        $request->validate([
            'nombre' => 'required|string',
            'valor' => 'required|string'
        ]);

        // Si el valor no es válido, envía un mensaje de error
        if (!$this->isValidValor($request->valor)) {
            return response()->json(['message' => 'Valor no válido. Los valores válidos son: xs, s, m, l, ?'], 400);
        }

        // Busca si el nombre ya existe en la tabla 'estimaciones'
        $estimacion = Estimacion::where('nombre', $request->nombre)->first();

        // Si el nombre existe, actualiza el valor
        if ($estimacion) {
            $estimacion->valor = $request->valor;
            $estimacion->save();
            return response()->json(['message' => 'Valor actualizado con éxito']);
        }

        // Si el nombre no existe, crea un nuevo registro con el nombre y el valor
        Estimacion::create([
            'nombre' => $request->nombre,
            'valor' => $request->valor
        ]);

        return response()->json(['message' => 'Nombre y valor guardados con éxito']);
    }

    public function eliminarRegistros(){
        // Elimina todos los registros de la tabla 'estimaciones'
        Estimacion::truncate();
        return response()->json(['message' => 'Registros eliminados con éxito']);
    }

    private function isValidValor($valor){
        $valoresPermitidos = ['xs', 's', 'm', 'l', '?'];
        return in_array($valor, $valoresPermitidos);
    }
    public function obtenerEstimaciones(){
        // Obtener todos los registros de la tabla 'estimaciones'
        $estimaciones = Estimacion::all();

        // Devolver los datos en formato JSON
        return response()->json(['estimaciones' => $estimaciones]);
    }
    public function reiniciarEstimaciones(){
        // Actualiza el campo 'valor' de todos los registros en la tabla 'estimaciones' a null
        DB::table('estimaciones')->update(['valor' => null]);

        return response()->json(['message' => 'Valores actualizados con éxito']);
  
    }
    public function verificarAutenticacion()
{
    // Aquí puedes realizar la verificación necesaria para comprobar si el usuario está autenticado
    // Por ejemplo, puedes comprobar si el usuario tiene una sesión válida en el backend o si el token de autenticación es válido, etc.

    // Devuelve un resultado booleano que indica si el usuario está autenticado
    return response()->json(['autenticado' => true]);
}
}
