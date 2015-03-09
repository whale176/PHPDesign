<?php
class parseFileController
{

    /**
     *
     *
     * @param unknown $filepath
     */
    public function readfile($filepath)
    {
        $fp = fopen($filepath, 'r');
        $filename = substr( strrchr($filepath, "/"), 1 );

        $st_idx = 0;
        $nd_idx = 0;
        $rd_idx = 0;
        $tmp_stidx = 0;
        $tmp_ndidx = 0;



        while (!feof($fp)) {

            $content = fgets($fp);
            $is_pattern = $this->isPattern($content);

            if(!$is_pattern){
                continue;
            }

            switch ($is_pattern) {
                case '1PS':
                    $st_idx++;
                    $idx = "{$st_idx} ";
                    $start_point = 1;
                    break;

                case '2PS':
                    if($tmp_stidx === $st_idx){
                        $nd_idx++;
                    }else{
                        $tmp_stidx = $st_idx;
                        $nd_idx = 1;
                    }
                    $idx = "{$st_idx}. {$nd_idx} ";
                    $start_point = 2;
                    break;

                case '3PS':
                    if($tmp_stidx === $st_idx && $tmp_ndidx === $nd_idx){
                        $rd_idx++;
                    }else{
                        $tmp_stidx = $st_idx;
                        $tmp_ndidx = $nd_idx;
                        $nd_idx = 1;
                        $rd_idx = 1;
                    }
                    $idx = "{$st_idx}. {$nd_idx}. {$rd_idx} ";
                    $start_point = 3;
                    break;
                
                default:
                    # code...
                    break;

            }
            $content = str_replace("`", "", $content);
            echo "{$idx}".substr(($content), $start_point, -1)."<br>";


        } // end of while
        fclose($fp);
    }


    /**
     *
     *
     * @param unknown $string
     * @return unknown
     */
    private function isPattern($string)
    {
        if ($string === null || $string === "") {
            return false;
        }

        // ### => sub-title
        if (preg_match("/^#{3}/", $string)) {
            return "3PS";
        }
        // ## => sub-main-title
        if (preg_match("/^#{2}/", $string)) {
            return "2PS";
        }
        // # => main-title
        if (preg_match("/^#{1}/", $string)) {
            return "1PS";
        }

        return false;
    }

    /*
    private function convertEncode($content)
    {
        $encoding = mb_detect_encoding($content, "UTF-8", true);
        if (!$encoding) {
            $content = mb_convert_encoding($content, "UTF-8", "cp950,gb2312,gbk");
        }
        return $content;
    }
    */
}
?>
