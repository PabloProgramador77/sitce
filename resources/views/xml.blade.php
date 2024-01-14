<?php

    $objXML=new XMLWriter();
    $objXML->openURI("C:/Laragon/www/seteplus/public/archivos/xml/MiXML.xml");
    $objXML->setIndent(true);
    $objXML->startDocument("1.0", "utf-8");

        $objXML->startElement("CertificadoElectronico");   
            //SUBNODO DE CABECERA(S)
            $objXML->writeAttribute("version","2.0");
            $objXML->writeAttribute('tipoCertificacion', '5');
            $objXML->writeAttribute("folioControl", '00001');
            $objXML->writeAttribute("xmlns:xs", "http://www.w3.org/2001/XMLSchema-instance");
            $objXML->writeAttribute("xmlns", "https://www.siged.sep.gob.mx/certificados/");
            $objXML->writeAttribute("xs:schemaLocation", "https://siged.sep.gob.mx/certificados/");
            //SUBNODO IPES
            $objXML->startElement('Ipes');
                //SUBNODO RESPONSABLE
                $objXML->writeAttribute('idNombreInstitucion', '20207');
                $objXML->writeAttribute('nombreInstitucion', 'Colegio de San Francisco');
                
                $objXML->startElement('Responsable');
                    $objXML->writeAttribute('curp', '0987654321234567890');
                    $objXML->writeAttribute('nombre', 'Jaime');
                    $objXML->writeAttribute('primerApellido', 'Verdín');
                    $objXML->writeAttribute('segundoApellido', 'Saldaña');
                $objXML->endElement();
                
            $objXML->endElement();
        $objXML->endElement();
    $objXML->fullEndElement();
?>