<?php

namespace Core;

class Error
{

    /**
     * Error handler. Convert all errors to Exeptions by throwing an ErrorExeption.
     * @param int $level Error level
     * @param string $msg Error message
     * @param string $file Filename the error was raised in
     * @param int $line Line numner in the file
     */
    public static function errorHandler($level, $msg, $file, $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($msg, 0, $level, $file, $line);
        }
    }


    public static function exceptionHandler($exception)
    {
        echo "<h1>Fatal error</h1>";
        echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
        echo "<p>Message: '". $exception->getMessage() . "'</p>";
        echo "<p>Star trace:<pre>". $exception->getTraceAsString() ."</pre></p>";
        echo "<p>Thrown in '". $exception->getFile() . "' on line " . $exception->getLine() ."</p>";
    }
}
