<?php

class ReadFile
{
    private function checkDirFilePerm($fileName)
    {
        if (is_dir(DIR_WITH_READ_FILES)) {
            $fileWayName = DIR_WITH_READ_FILES . '/' . $fileName;
            if (file_exists($fileWayName))
            {
                $permission = substr(sprintf('%o', fileperms($fileWayName)), -3);
                if ($permission[0] > 4)
                {
                    return true;
                } else
                {
                    if (!chmod($fileWayName, 0755)) {
                        return ['error' => 2];
                    }
                }
            } else
            {
                return ['error' => 1];
            }
        } else
        {
            return ['error' => 0];
        }
    }

    public function readByLine($fileName)
    {
        $fileWayName = DIR_WITH_READ_FILES . '/' . $fileName;
        $checkResult = $this->checkDirFilePerm($fileName);
        if ($checkResult === true)
        {
            $lines = '';
            $handle = fopen($fileWayName, "r");
            if (!$handle)
            {
                return ['error' => 3];
            }

            while (($line = fgets($handle)) !== false)
            {
                $lines .= $line;
            }

            if (!feof($handle))
            {
                return ['error' => 4];
            }

            fclose($handle);

            $linesArray = explode(PHP_EOL, $lines);
            return $linesArray;
        } else
        {
            return $checkResult;
        }

    }

    public function readBySymbols($fileName)
    {
        $fileWayName = DIR_WITH_READ_FILES . '/' . $fileName;
        $checkResult = $this->checkDirFilePerm($fileName);
        if ($checkResult === true)
        {
            $line = '';
            $handle = fopen($fileWayName, "r");

            if (!$handle)
            {
                return ['error' => 3];
            }

            while (false !== ($char = fgetc($handle)))
            {
                $line .= $char;
            }

            if (!feof($handle))
            {
                return ['error' => 4];
            }

            fclose($handle);

            $lines = explode(PHP_EOL, $line);
            return $lines;
        } else
        {
            return $checkResult;
        }
    }

    public function checkError($errorNumber){
        switch ($errorNumber) {
            case 0:
                return DIR_ERROR;
            case 1:
                return FILE_ERROR;
            case 2:
                return PERMISSION_ERROR;
            case 3:
                return FOPEN_ERROR;
            case 4:
                return UNEXPECTED_END_Of_File_ERROR;
        }
    }
}