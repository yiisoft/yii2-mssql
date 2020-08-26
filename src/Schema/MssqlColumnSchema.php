<?php

declare(strict_types=1);

namespace Yiisoft\Db\Mssql\Schema;

use Yiisoft\Db\Schema\ColumnSchema;

use function substr;

/**
 * Class ColumnSchema for MSSQL database
 */
final class MssqlColumnSchema extends ColumnSchema
{
    /**
     * Prepares default value and converts it according to {@see phpType}.
     *
     * @param mixed $value default value
     *
     * @return mixed converted value
     */
    public function defaultPhpTypecast($value)
    {
        if ($value !== null) {
            // convert from MSSQL column_default format, e.g. ('1') -> 1, ('string') -> string
            $value = substr(substr($value, 2), 0, -2);
        }

        return $this->phpTypecast($value);
    }
}
