<?php

use Illuminate\Database\Seeder;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('materias')->insert([
           
           ['clave' => 'ISC3TLR101','seriacion' => '','nombre' => 'TALLER DE LECTURA Y REDACCION' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 1,'fk_plan' => 1],
          
           ['clave' => 'ISC3MAB104','seriacion' => '','nombre' => 'MATEMATICAS BASICAS' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 1,'fk_plan' => 1],

           ['clave' => 'ISC3ALC106','seriacion' => '','nombre' => 'ALGORITMOS COMPUTACIONALES' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 1,'fk_plan' => 1],

           ['clave' => 'ISC3MAT203','seriacion' => 'ISC3MAB104','nombre' => 'MATEMATICAS II' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 2,'fk_plan' => 1],

           ['clave' => 'ISC3PRE204','seriacion' => 'ISC3ALC106','nombre' => 'PROGRAMACION ESTRUCTURADA' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 2,'fk_plan' => 1],

           ['clave' => 'ISC3ESA302 ','seriacion' => 'ISC3MAT203','nombre' => 'ESTADISTICA APLICADA' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 3,'fk_plan' => 1],

           ['clave' => 'ISC3ESD305 ','seriacion' => 'ISC3PRE204','nombre' => 'ESTRUCTURA DE DATOS I' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 3,'fk_plan' => 1],

		   ['clave' => 'ISC3POO304 ','seriacion' => '','nombre' => 'PROGRAMACION ORIENTADA A OBJETOS' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 3,'fk_plan' => 1],

		   ['clave' => 'ISC3MEI301 ','seriacion' => '','nombre' => 'METODOLOGIA DE LA INVESTIGACION' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 3,'fk_plan' => 1],

		   ['clave' => 'ISC3INO402 ','seriacion' => 'ISC3ESA302','nombre' => 'INVESTIGACION DE OPERACIONES I' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 4,'fk_plan' => 1],

		   ['clave' => 'ISC3PRI403 ','seriacion' => 'ISC3POO304','nombre' => 'PROGRAMA DE INTERFACES' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 4,'fk_plan' => 4],

		   ['clave' => 'ISC3ESD404 ','seriacion' => 'ISC3ESD305','nombre' => 'ESTRUCTURA DE DATOS II' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 4,'fk_plan' => 4],

		   ['clave' => 'ISC3LEE405 ','seriacion' => '','nombre' => 'LENGUAJE ENSAMBLADOR' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 4,'fk_plan' => 4],

		   ['clave' => 'ISC3TEA406 ','seriacion' => '','nombre' => 'TEORIA DE AUTOMATAS' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 4,'fk_plan' => 4],

		   ['clave' => 'ISC3INO502 ','seriacion' => 'ISC3INO402','nombre' => 'INVESTIGACION DE OPERACIONES II' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 5,'fk_plan' => 1],

		   ['clave' => 'ISC3TSO504 ','seriacion' => 'ISC3PRI403','nombre' => 'TEORIA DE SISTEMAS OPERATIVOS' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 5,'fk_plan' => 1],

		   ['clave' => 'ISC3DBD505 ','seriacion' => 'ISC3ESD404','nombre' => 'DISEÑO DE BASE DE DATOS' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 5,'fk_plan' => 1],

		   ['clave' => 'ISC3ARC506 ','seriacion' => 'ISC3LEE405','nombre' => 'ARQUITECTURA DE COMPUTADORAS I' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 5,'fk_plan' => 1],

		   ['clave' => 'ISC3COM507 ','seriacion' => '','nombre' => 'COMPILADORES' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 5,'fk_plan' => 1],

		   ['clave' => 'ISC3SOM602 ','seriacion' => 'ISC3TSO504','nombre' => 'SISTEMAS OPERATIVOS MODERNOS' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 6,'fk_plan' => 1],

		   ['clave' => 'ISC3ASI603 ','seriacion' => '','nombre' => 'ANALISIS DE SISTEMAS DE INFORMACION' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 6,'fk_plan' => 1],

		   ['clave' => 'ISC3DBD604 ','seriacion' => 'ISC3DBD505','nombre' => 'DESARROLLO DE BASE DE DATOS' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 6,'fk_plan' => 1],

		   ['clave' => 'ISC3REC606','seriacion' => '','nombre' => 'REDES COMPUTACIONALES I' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 6,'fk_plan' => 1],          

		   ['clave' => 'ISC3BDD702','seriacion' => 'ISC3ASI603','nombre' => 'BASE DE DATOS DISTRIBUIDAS' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 7,'fk_plan' => 1],

		   ['clave' => 'ISC3DSI703','seriacion' => 'ISC3ASI603','nombre' => 'DISEÑO DE SISTEMAS DE INFORMACION' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 7,'fk_plan' => 1],

		   ['clave' => 'ISC3REC706 ','seriacion' => 'ISC3REC606','nombre' => 'REDES COMPUTACIONALES II' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 7,'fk_plan' => 1],

		   ['clave' => 'ISC3SET801 ','seriacion' => 'ISC3MEI301','nombre' => 'SEMINARIO DE TESIS' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 8,'fk_plan' => 1],

		   ['clave' => 'ISC3INS803 ','seriacion' => 'ISC3DSI703','nombre' => 'INGENIERIA DE SOFTWARE' ,'objetivo_gnral'=> 'ascdasdasdasd' ,'hrs_docente' => 0 ,'hrs_independientes' => 0,'creditos' => 0 ,'instalaciones' => 'A','grado' => 8,'fk_plan' => 1]


           //['clave' => ,'seriacion' =>,'nombre' => ,'objetivo_gnral'=> ,'hrs_docente' =>,'hrs_independientes' => ,'creditos' => ,'instalaciones' => ,'grado' => ,'fk_plan' => ,'predecesor' => '' ]
           
           
        ]);
    }
}
