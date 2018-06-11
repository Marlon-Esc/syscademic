<?php

namespace App\Http\Controllers;
use Fpdf;
use App\Materia;
use Illuminate\Http\Request;

class fpdfController extends Controller
{
    public function index($id) {
     $materia=Materia::where('clave',$id)->first();
     $revoe= $materia->plan_estudio->revoe;

	 $pdf = new Fpdf('P','cm','Letter');
	 $pdf::AddPage();
	 $pdf::SetFont('Arial','',9);
	 $pdf::Cell(0,5,utf8_decode("INSTITUTO DE ESTUDIOS SUPERIORES DE CHIAPAS EN TUXTLA GUTIÉRREZ, S. C."),0,1,"C");
	 $pdf::Cell(0,5,"CLAVE: 07PSU0002D   REVOE:".$revoe,0,1,"C"); //ancho,alto,texto,borde,linea,alineacion 
	 $pdf::Cell(0,5,utf8_decode("DIRECCIÓN DE LICENCIATURA EN TECNOLOGIAS DE LA INFORMACIÓN"),0,1,"C");
	 $pdf::Cell(0,5,utf8_decode("COORDINACIÓN ACADÉMICA"),0,"","C");
	 $pdf::Ln();
	 $pdf::Ln();
	 $pdf::SetFont('Arial','B',10);
	 $pdf::Cell(0,5,utf8_decode("PLANEACIÓN ACADÉMICA"),0,"","C");
	 $pdf::Ln();
	 $pdf::Ln();
	 $pdf::SetFont('Arial','B',7);
	 $pdf::SetFillColor(217,215,201);
	 $pdf::cell(63,10,"CARRERA:",1,"",1,True);
	 $pdf::cell(63,10,utf8_decode("PLAN DE ESTUDIOS(Año):"),1,"","L",True);
	 $pdf::cell(63,10,utf8_decode("CICLO ESCOLAR:"),1,"","L",True);
	 $pdf::Ln();
	 $pdf::cell(63,10,utf8_decode("ASIGNATURA:"),1,"","L",True);
	 $pdf::cell(63,10,utf8_decode("MODALIDAD:"),1,"","L",True);
	 $pdf::cell(63,10,utf8_decode("CLAVE:"),1,"","L",True);
	 $pdf::Ln();
	 $pdf::cell(63,10,utf8_decode("TOTAL DE HORAS DE ACUERDO AL PLAN DE ESTUDIO:"),1,"","L",True);
	 $pdf::cell(63,10,utf8_decode("INDEPENDIENTES:"),1,"","L",True);
	 $pdf::cell(63,10,utf8_decode("TEORÍA:                   PRÁCTICAS: "),1,"","L",True);
	 $pdf::Ln();
	 $pdf::cell(63,5,utf8_decode("HORAS SEMANA:"),1,"","L",True);
	 $pdf::cell(63,5,utf8_decode("ASIGNATURA ANTECEDENTE:"),1,"","L",True);
	 $pdf::cell(63,5,utf8_decode("SUBSECUENTE: "),1,"","L",True);
	 $pdf::Ln();
	 $pdf::cell(63,5,utf8_decode("CUATRIMESTRE/SEMESTRE:"),1,"","L",True);
	 $pdf::cell(63,5,utf8_decode("GRUPO:"),1,"","L",True);
	 $pdf::cell(63,5,utf8_decode("TURNO: "),1,"","L",True);
	 $pdf::Ln();
	 $pdf::cell(63,5,utf8_decode("ÁREA DE FORMACIÓN:"),1,"","L",True);
	 $pdf::cell(63,5,utf8_decode("SEMANAS PROGRAMADAS:"),1,"","L",True);
	 $pdf::cell(63,5,utf8_decode("SEMANAS EFECTIVAS: "),1,"","L",True);
	 $pdf::Ln();
	 $pdf::cell(63,8,utf8_decode("DOCENTE:"),1,"","L",True);
	 $pdf::cell(63,8,utf8_decode("Vo.Bo:"),1,"","L",True);
	 $pdf::cell(63,8,utf8_decode(""),1,"","L",True);
	 $pdf::Ln();
	 $pdf::Output();
	 exit;
	}
}
