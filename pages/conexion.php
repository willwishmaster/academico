<?php 
	$servidor	= "localhost";
	$usuario 	= "root";
	$password	= "";
	$bd			= "academico";

	$conn= new mysqli($servidor,$usuario,$password,$bd);
	if($conn->connect_error){
		die("connection failed:".$conn->connect_error);
	}
	setlocale(LC_CTYPE, 'C');
	setlocale(LC_ALL,"es_PE");
	setlocale(LC_TIME, "spanish");
	date_default_timezone_set('America/Lima');

	function Insertar($tabla, $datos, $show_error=true)
    {        
        foreach($datos as $campo => $valor){
            $campos[] = $campo;
            $valores[] = $valor;
        }
        $sql = "INSERT INTO $tabla(" . implode(',', $campos) . ") VALUES('" . implode("', '", $valores) . "')";
        if(!$show_error){
            return $conn->query($sql);
        }
        $conn->query($sql, true);
    }

    function Actualizar($tabla, $datos, $where)
    {        
        foreach($datos as $campo => $valor){
            $sets[] = $campo . "='" . $valor . "'";
        }
        $sql = "UPDATE $tabla SET " . implode(',', $sets) . " WHERE $where";
        return $conn->query($sql);
    }

    function Eliminar($tabla, $where, $limit='LIMIT 1')
    {   
        return $conn->query("DELETE FROM {$tabla} WHERE $where $limit");
    }

    function enumSelect($table, $field, $sel = -1, $reemplazo = array())
	{
		$query = " SHOW COLUMNS FROM $table LIKE '$field' ";
		$result = $conn->query($query) or die($conn->GetError());
		$row = $conn->FetchArray();		
		$regex = "/'(.*?)'/";
		preg_match_all( $regex , $row[1], $enum_array );
		$enum_fields = $enum_array[1];
		
		$html = "";
		foreach($enum_fields as $value){
			$html .= '<option value="' . $value . '" '.(($value == $sel) ? 'selected' : '').' >' . htmlentities( (empty($reemplazo) ? $value : $reemplazo[$value]) ) . '</option>';
		}
		return $html;
	}

 ?>