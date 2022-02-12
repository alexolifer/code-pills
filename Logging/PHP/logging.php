<?php

/**
 * Função para criação de logs diários.
 * Author: Alexandre Ferreira
 * Date:   11/02/2022
 * Version: 1.0
 */
function logMsg($message)
{
    // Get WordPress uploads directory.
    // $logsPath = WP_PLUGIN_DIR . '/<plugin_name>/logs';         // To Wordpress.
    $logsPath = __DIR__ . '/logs';

    file_exists($logsPath) ?: mkdir($logsPath, 0664, true);

    // $theDate = date("Y-m-d");                    // To Wordpress current_time("Y-m-d").
    $theDate = '2022-02-11';                    // To Wordpress current_time("Y-m-d").
    $mode    = 'a';
    $baseFile    = '.log';

    is_array($message) ? $message = json_encode($message) : $message;

    // Write the log file.
    $filePath  = $logsPath . '/' . $theDate . $baseFile;
    $file  = fopen($filePath, $mode);
    fwrite($file, date('H:i:s') . "::" . $message . "\n");     // To Wordpress current_time("H:i:s").
    fclose($file);
}


logMsg('############### LOG START ###############');
logMsg('Meu primeiro log');
logMsg('Mais uma linha');
logMsg('A ultima linha');
logMsg('############### LOG END ###############');
