<?php
/**
 * Function to get the total size of all files in a directory.
 *
 * @param string $directory The path to the directory.
 * @return int The total size in bytes.
 */
function getDirectorySize($directory) {
    $size = 0;
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file) {
        if ($file->isFile()) {
            $size += $file->getSize();
        }
    }
    return $size;
}

/**
 * Function to count the total number of files in a directory.
 *
 * @param string $directory The path to the directory.
 * @return int The total number of files.
 */
function getFileCount($directory) {
    $count = 0;
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file) {
        if ($file->isFile()) {
            $count++;
        }
    }
    return $count;
}

/**
 * Function to format bytes into a human-readable format.
 *
 * @param int $bytes The size in bytes.
 * @param int $decimals The number of decimal points.
 * @return string The formatted size.
 */
function formatSize($bytes, $decimals = 2) {
    $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . $size[$factor];
}
?>