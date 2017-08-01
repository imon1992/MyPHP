<?php

class ReadFileAndReplace
{
    protected $file;
    protected $fileName;
    protected $fileWayName;
    public function __construct($fileName)
    {
        $fileWayName = DIR_WITH_READ_FILES . '/' . $fileName;
        $this->fileWayName = $fileWayName;
        $this->fileName = $fileName;
        $this->file = file($fileWayName);
    }

    public function __destruct()
    {
    }

    private function checkDirFilePerm()
    {
        if (is_dir(DIR_WITH_READ_FILES)) {

            if (file_exists($this->fileWayName))
            {
                $permission = substr(sprintf('%o', fileperms($this->fileWayName)), -3);
                if ($permission[0] > 4)
                {
                    return true;
                } else
                {
                    if (!chmod($this->fileWayName, 0755)) {
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

    public function readByLine($lineNumber)
    {
        $checkResult = $this->checkDirFilePerm();

        if($lineNumber>sizeof($this->file)-1)
            return 'The lines ran out';

        if ($checkResult === true)
        {
            $lines = '';
//            $handle = fopen($fileWayName, "r");
            if (!$this->file)
            {
                return ['error' => 3];
            }

//            while (($line = fgets($handle)) !== false)
//            {
//                $lines .= $line;
//            }

//            if (!feof($handle))
//            {
//                return ['error' => 4];
//            }

//            fclose($handle);

//            $linesArray = explode(PHP_EOL, $lines);
//            var_dump($this->file);
            return $this->file[$lineNumber];
        } else
        {
            return $checkResult;
        }

    }

    public function readBySymbols($lineNumber,$symbolNumber)
    {
        $checkResult = $this->checkDirFilePerm();

        if($lineNumber>sizeof($this->file)-1)
            return 'The lines ran out';
        if($symbolNumber > strlen($this->file[$lineNumber])-1)
            return 'The symbols ran out';

        if ($checkResult === true)
        {
            if (!$this->file)
            {
                return ['error' => 3];
            }
            $line = $this->file[$lineNumber];
            $symbolInLine = $line[$symbolNumber];

            return $symbolInLine;
        } else
        {
            return $checkResult;
        }
    }

    public function replaceString($stringNumber,$onWhatReplace)
    {
//        $fileWayName = DIR_WITH_READ_FILES . '/' . $fileName;
        $checkResult = $this->checkDirFilePerm();
        if ($checkResult === true)
        {
            $linesArr = $this->file;

            if($stringNumber > sizeof($linesArr))
                return ['error' => 5];

            return $this->saveChanges($linesArr,$stringNumber,$onWhatReplace);

        }else
        {
            return $checkResult;
        }
    }

    public function replaceSymbols($symbolNumber,$onWhatReplace)
    {
        $checkResult = $this->checkDirFilePerm();
        if ($checkResult === true) {
            $fp = fopen($this->fileWayName, "r");
            if($fp === false)
            {
                return ['error' => 3];
            }
            while (false !== ($char = fgetc($fp))) {
                $arr[] = $char;
            }
            fclose($fp);

            if($symbolNumber > sizeof($arr))
                return ['error' => 5];
            return $this->saveChanges($arr,$symbolNumber,$onWhatReplace);

        }else
        {
            return $checkResult;
        }
    }

    public function saveChanges($arr,$symbolOrLineNumber,$onWhatReplace){

        $firstArrElemLength = strlen($arr[0]);
        $fp = fopen($this->fileWayName, "w");
        if($fp === false){
            return ['error' => 3];
        }
        for ($i = 0; $i < $symbolOrLineNumber - 1; $i++) {

            fputs($fp, $arr[$i]);
        }
        unset($arr[$symbolOrLineNumber - 1]);

        if($firstArrElemLength > 1)
        {

            fputs($fp, $onWhatReplace. chr(13) . chr(10));
        }else
        {

            fputs($fp, $onWhatReplace);
        }


        for ($i = $symbolOrLineNumber - 1; $i <= count($arr); $i++) {

            fputs($fp, $arr[$i]);
        }
        fclose($fp);
        return true;
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
                return PERMISSION_ERROR;
            case 5:
                return STRING_ERROR;
        }
    }
}
