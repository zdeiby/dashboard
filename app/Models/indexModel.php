<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Importa la clase DB desde el espacio de nombres correcto

class indexModel extends Model
{
    use HasFactory;
    // Define la tabla asociada al modelo (opcional si sigues las convenciones de Laravel)
   // protected $table = 'nombre_de_la_tabla';

    // Constructor para inicializar la conexión a la base de datos
    public function __construct()
    {
        parent::__construct();
    }

    // Función para buscar noticias de contacto
    // public function leerActivities($url)
    // {
    //     // Utilizando el Query Builder de Laravel para ejecutar el stored procedure
    //     $resultado = DB::select('SELECT * from t_contratistas WHERE cedula="'.$url.'"' );

    //     return $resultado;
    // }

    public function leerDatos(){
        $resultado = DB::select('SELECT * from citas');
        return $resultado;
    }
    protected $table = 'citas';
    protected $fillable = ['id', 'title', 'descripcion', 'start', 'end'];
    public static function editarDatos($datos){
      $dato=static::updateOrCreate(['id' => $datos['id']], $datos);
        return $dato;
    }

    //    public function agregarDatos($data){
    // // Realizar la inserción y obtener el ID del último registro insertado
    //     $ultimoId = DB::table('citas')->insertGetId([
    //         'title' => $data['title'],
    //         'descripcion' => $data['descripcion'],
    //         'start' => $data['start'],
    //         'end' => $data['end']
    //     ]);

    //     // Devolver el ID del último registro insertado
    //     return $ultimoId;
    //   }

    // public function editarActivities($id,$obj,$activity,$foto){
    //     $resultado = DB::insert('UPDATE t_contratistas SET objeto="'.$obj.'" , actividad="'.$activity.'", foto="'.$foto.'" where id="'.$id.'";');
    //     return $resultado;
    // }

     public function eliminarDatos($id){
         $resultado = DB::delete('DELETE FROM citas WHERE id="'.$id.'";');
         return $resultado;
     }
}
