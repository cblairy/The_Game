<?php 


    // fonction d'assistance pour afficher ce qu'on veut dans la console (array compris)

class Helper{
    public static function console(mixed $data): void
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
        echo "<script>console.log(' $output ');</script>";
    }
}





?>