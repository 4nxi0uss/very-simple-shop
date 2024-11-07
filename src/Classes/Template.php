<?php
namespace App\Classes;

use Exception;

class Template
{
    /**
     * Render a template file with provided data
     *
     * @param string $path Path to the template file
     * @param array $data Associative array of data to pass to the template
     * @return string Rendered template content
     */
    public function render(string $path, array $data = []): string
    {
        if (!file_exists($path)) {
            throw new Exception("Template file not found: $path");
        }

        // Extract the data array to variables
        extract($data);

        // Start output buffering
        ob_start();

        // Include the template file
        include $path;

        // Get the contents of the buffer and clean it
        $output = ob_get_clean();

        return $output;
    }
}
