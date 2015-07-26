<?php
namespace App\Utils;

/**
 * Clase para leer los mails desde un archivo de texto
 * y sacarlos en formato para el seeder
 */
class ParseEmails {

    public static function parseFile($filePath) {
        $emailsFile = fopen($filePath, "r") or die("Unable to open file!");
        $output = "";
        while ($line = fgets($emailsFile)) {
            $emails = explode(";", $line);
            foreach ($emails as $currentEmail) {
                $currentEmail = trim($currentEmail);
                $output .= "Email::create(array(
                                'address'=>'$currentEmail'
                            ));</br>";
            }
        }

        fclose($emailsFile);

        echo $output;
    }
}

ParseEmails::parseFile("emails.txt");
