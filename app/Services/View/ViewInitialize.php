<?php


namespace App\Services\View;


use JetBrains\PhpStorm\NoReturn;
use JetBrains\PhpStorm\Pure;

trait ViewInitialize
{
    /**
     * @param string $viewContent
     * @return bool
     */
    private static mixed $currentViewFileContent;

    private static mixed $extendedViewFileContent;

    private static function hasExtend(string $viewContent): bool
    {
        if (preg_match("/@extends\((?:\"|')(.*)(?:\"|')\)/",$viewContent,$extend)){

            $extendedViewPath =  VIEW_ROUTE.str_replace(".",'/',$extend[1]).'.blade.php';

            if (static::checkIsViewRouteExists($extendedViewPath)){

                static::$extendedViewFileContent = static::getViewFileContent($extendedViewPath);

                return true;

            }

            response()->notFound("errors.404");

        }

        return false;
    }

    /**
     * @param string $viewPath
     * @return string
     */

    private static function makeFullViewRoute(string $viewPath): string
    {
        return  VIEW_ROUTE.str_replace(".",'/',$viewPath).'.blade.php';
    }

    /**
     * @param string $viewPath
     * @return bool
     */

    #[Pure] private static function checkIsViewRouteExists(string $viewPath): bool
    {
        return file_exists($viewPath);
    }

    /**
     * @param string $viewPath
     * @return string
     */

    private static function getViewFileContent(string $viewPath): string
    {
        return file_get_contents($viewPath);
    }

    private static function InjectExtendedView()
    {

        preg_match_all("/@yield\((?:\"|')(.*)(?:\"|')\)/",static::$extendedViewFileContent,$yields);

        foreach ($yields[1] as $yield){

            preg_match("/@section\((?:\"|')$yield(?:\"|')\)((?:\s *\n*.*?\n*)*)@endsection/",static::$currentViewFileContent,$replace);

            if (count($replace)<1)
            {
                response()->notFound("errors.404");
            }
            static::$extendedViewFileContent  = preg_replace("/@yield\((?:\"|')(?:$yield)(?:\"|')\)/",$replace[1],static::$extendedViewFileContent);

        }

        if (static::hasPush())
        {
            static::injectPushToStack();
        }

        if (static::hasStack())
        {
            static::removeStacks();
        }
        static::$currentViewFileContent = static::$extendedViewFileContent;


    }

    /**
     * @return bool
     */

    private static function hasInclude(): bool
    {
        return preg_match("/@include\((?:\"|')(.*)(?:\"|')\)/",static::$currentViewFileContent);
    }

    private static function injectIncluded()
    {
        preg_match_all("/@include\((?:\"|')(.*)(?:\"|')\)/",static::$currentViewFileContent,$includes);

        foreach ($includes[1] as $include){

            $includeRoute = static::makeFullViewRoute($include);

            if (static::checkIsViewRouteExists($includeRoute)){

                static::$currentViewFileContent = preg_replace("/@include\((?:\"|')(?:$include)(?:\"|')\)/",static::getViewFileContent($includeRoute),static::$currentViewFileContent);

            }
            else
            {

                response()->notFound("errors.404");
            }
        }
    }

    /**
     * @return bool
     */

    private static function hasPush(): bool
    {
        return preg_match("/@push\((?:\"|')(.*)(?:\"|')\)/",static::$currentViewFileContent);
    }

    private static function hasStack(): bool
    {
        return preg_match("/@stack\((?:\"|')(.*)(?:\"|')\)/",static::$extendedViewFileContent);
    }

    private static function removeStacks(): void
    {
        static::$extendedViewFileContent = preg_replace("/@stack\((?:\"|')(?:.*)(?:\"|')\)/","",static::$extendedViewFileContent);
    }

    #[NoReturn] private static function injectPushToStack(): void
    {
        preg_match_all("/@push\((?:\"|')(.*)(?:\"|')\)/",static::$currentViewFileContent,$pushes);

        foreach (array_unique($pushes[1]) as $item){

            $stackKeyHolder[$item] = [];
        }

        foreach ($pushes[1] as $push){

            preg_match("/@push\((?:\"|')$push(?:\"|')\)((?:\n*.*?\n*)*)@endpush/",static::$currentViewFileContent,$replace);

            array_push($stackKeyHolder[$push],$replace[1]);

            static::$currentViewFileContent = str_replace($replace[0],'',static::$currentViewFileContent);

        }

        foreach (array_keys($stackKeyHolder) as $array_key){

            static::$extendedViewFileContent = preg_replace("/@stack\((?:\"|')(?:$array_key)(?:\"|')\)/",implode("\n",$stackKeyHolder[$array_key]),static::$extendedViewFileContent);

        }

    }

    /**
     * @return bool
     */

    private static function hasCsrf(): bool
    {
        return preg_match("/@csrf/",static::$currentViewFileContent);
    }

    private static function generateCsrf(): void
    {
        $hashCode =   md5(openssl_random_pseudo_bytes(30));

        session()->put(["_token"=>$hashCode]);

        static::injectCsrf($hashCode);

    }

    /**
     * @param string $hashCode
     */

    private static function injectCsrf(string $hashCode): void
    {
        $hiddenInput = "<input type='hidden' name='_token' value='$hashCode'/>";

        static::$currentViewFileContent = preg_replace("/@csrf/",$hiddenInput,static::$currentViewFileContent);

    }

    /**
     * @return bool
     */

    private static function hasMethod(): bool
    {
        return preg_match("/@method\(.*\)/",static::$currentViewFileContent);
    }

    private static function injectMethod(): void
    {
        preg_match("/@method\((?:\"|\')(.*)(?:\"|\')\)/",static::$currentViewFileContent,$method);

        $hiddenInput = "<input type='hidden' name='_method' value='$method[1]'/>";

        static::$currentViewFileContent = preg_replace("/@method\(.*\)/",$hiddenInput,static::$currentViewFileContent);

    }
}