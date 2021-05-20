<?php


namespace App\Services\View;


trait ViewRegister
{
    /**
     * @param string $fullViewPath
     */

    private static function register(string $fullViewPath)

    {

        if (static::checkIsViewRouteExists($fullViewPath)){

            static::$currentViewFileContent = static::getViewFileContent($fullViewPath);

            if (static::hasExtend(static::$currentViewFileContent))
            {
                static::InjectExtendedView();
            }

            if (static::hasInclude())
            {

                static::injectIncluded();
            }

            if (static::hasCsrf())
            {
                static::generateCsrf();
            }

            if (static::hasMethod()){

                static::injectMethod();
            }

            extract(static::$shareData);

            extract(static::$viewData);

            eval("?>".static::$currentViewFileContent);

        }
        else
        {
            response()->notFound("errors.404");
        }
    }
}