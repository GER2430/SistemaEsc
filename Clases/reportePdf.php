<?php
date_default_timezone_set('America/Mexico_City');
require "../Conexiones/conexionBd.php";
require "fpdf.php";
    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image("../Img/_2634443.png",240,8,45,26);
            $this->Ln(8);
            // Arial bold 15
            $this->SetFont('Times','B',30);
            // Movernos a la derecha
            $this->Cell(100);
            // Título
            $this->Cell(1,10,'Universidad Nacional Autonoma de Mexico',0,0,'C');
            // Salto de línea
            $this->Ln(20);

            $this->SetFont('Arial','B',10);
            $this->SetTextColor(255, 255, 255);
            $this->SetFillColor(0, 0, 0);
            $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
            $this->Cell(25, 10, 'Matricula', 1, 0, 'C', 1);
            $this->Cell(100, 10, 'Nombre', 1, 0, 'C', 1);
            //$this->Cell(42, 10, 'Apellido', 1, 0, 'C', 0);
            //$this->Cell(42, 10, 'Segundo apellido', 1, 0, 'C', 0);
            $this->Cell(30, 10, 'Sexo', 1, 0, 'C', 1);
            $this->Cell(50, 10, 'Carrera', 1, 0, 'C', 1);
            $this->Cell(62, 10, 'Correo Electronico', 1, 1, 'C', 1);
            
            



        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');

            $this->SetY(-11);
            
            // Movernos a la derecha
            $this->Cell(250);
            // Título
            $this->Cell(1,2,date('d-m-y h:i:s a'),0,0,'C');
        }
    }

    
?>

<?php

    

    $consulta = "SELECT alumnos.id, alumnos.nombre, alumnos.pApellido,
    alumnos.sApellido, sexo.sexo, alumnos.carrera, alumnos.email FROM alumnos INNER JOIN sexo ON alumnos.sexo = sexo.id  ORDER BY pApellido" ;
    $ejecutar = mysqli_query($conn, $consulta);

    $pdf = new PDF("L");
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    /*$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));*/



    
    $pdf->SetFont('Arial','',12);
    $contador=1;
    $pdf->SetFillColor(173, 173, 173);
    $bandera=false;
    while($fila = mysqli_fetch_array($ejecutar)){
        
        $clavecarrera = $fila['carrera'];
        $clavesexo = $fila['sexo'];
        
        $pdf->Cell(10, 10, $contador, 1, 0, 'C', $bandera);
        $pdf->Cell(25, 10, strtoupper($fila['id']), 1, 0, 'C', $bandera);
        $pdf->Cell(100, 10, strtoupper(utf8_decode($fila['pApellido']." ".$fila['sApellido']." ".$fila['nombre'])), 1, 0, 'B', $bandera);
        $pdf->Cell(30, 10, $fila['sexo'], 1, 0, 'C', $bandera);
        



        $consulta2 = "SELECT * FROM carrera WHERE id='$clavecarrera'";
        $ejecutar2 = mysqli_query($conn, $consulta2);
        while($fila2 = mysqli_fetch_array($ejecutar2)){
            $clavecarrerados = $fila2['carCorta'];
            $idcarreraxx=$fila2['id'];
         }


        $pdf->Cell(50, 10, strtoupper($idcarreraxx ."-".$clavecarrerados), 1, 0, 'L', $bandera);
        $pdf->Cell(62, 10,strtolower($fila['email']), 1, 1, 'B', $bandera);

        /*$consulta3 = "SELECT * FROM sexo WHERE id='$clavesexo";
        $ejecutar3 = mysqli_query($conn, $consulta3);
        while ($fila3 = mysqli_fetch_array($ejecutar3)) {
            $clavesex = $fila3['sexo'];
        }
        $pdf->Cell(30, 10, strtoupper($clavesex), 1, 0, 'C', $bandera);*/

        $bandera=!$bandera;
        $contador++;
        
        

        }






        //"I" -> se entrega al navegador y se activa el plugin para mostrarlo
        //"D" -> se fuerza la descarga del archivo



    $pdf->Output("ListadoAlumnos-".date('d-m-y-h_i_sa').".pdf","D");





?>