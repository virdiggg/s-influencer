@echo off
setlocal enabledelayedexpansion

:: === Ask for user input ===
set /p db_user=Enter MySQL username:
set /p db_pass=Enter MySQL password (leave blank for no password):
set db_name=influencers

:: === Locate MySQL ===
set "mysqlFound=0"

for %%I in ("%PATH:;=" "%") do (
    if exist "%%~I\mysql.exe" (
        set "mysqlFound=1"
        goto :CHECK_PHP
    )
)

if %mysqlFound%==0 (
    echo MySQL not found in PATH. Searching common install locations...

    set "BASE_PATHS=D:\laragon\bin\mysql C:\laragon\bin\mysql E:\laragon\bin\mysql F:\laragon\bin\mysql D:\xampp\mysql\bin C:\xampp\mysql\bin E:\xampp\mysql\bin F:\xampp\mysql\bin"
    set "MYSQL_BIN_PATH="

    for %%A in (%BASE_PATHS%) do (
        if exist "%%A" (
            for /d %%B in ("%%A\*") do (
                set "MYSQL_BIN_PATH=%%B\bin"
                goto :FOUND_MYSQL
            )
        )
    )

    :FOUND_MYSQL
    if defined MYSQL_BIN_PATH (
        if exist "!MYSQL_BIN_PATH!\mysql.exe" (
            echo Found MySQL at !MYSQL_BIN_PATH!
            set "PATH=!MYSQL_BIN_PATH!;%PATH%"
        ) else (
            echo MySQL bin directory not found.
            exit /b 1
        )
    ) else (
        echo MySQL installation not found.
        exit /b 1
    )
)

:CHECK_PHP
:: === Locate PHP ===
set "phpFound=0"

for %%I in ("%PATH:;=" "%") do (
    if exist "%%~I\php.exe" (
        set "phpFound=1"
        goto :RUN_MYSQL
    )
)

if %phpFound%==0 (
    echo PHP not found in PATH. Searching common install locations...

    set "PHP_PATHS=D:\laragon\bin\php C:\laragon\bin\php E:\laragon\bin\php F:\laragon\bin\php D:\xampp\php C:\xampp\php E:\xampp\php F:\xampp\php"
    set "PHP_BIN_PATH="

    for %%A in (%PHP_PATHS%) do (
        if exist "%%A" (
            for /d %%B in ("%%A\*") do (
                set "PHP_BIN_PATH=%%B"
                goto :FOUND_PHP
            )
        )
    )

    :FOUND_PHP
    if defined PHP_BIN_PATH (
        if exist "!PHP_BIN_PATH!\php.exe" (
            echo Found PHP at !PHP_BIN_PATH!
            set "PATH=!PHP_BIN_PATH!;%PATH%"
        ) else (
            echo PHP binary not found.
            exit /b 1
        )
    ) else (
        echo PHP installation not found.
        exit /b 1
    )
)

:RUN_MYSQL
:: === Execute DB creation and import ===
echo Creating database %db_name%...

if "%db_pass%"=="" (
    mysql -u %db_user% -e "CREATE DATABASE IF NOT EXISTS `%db_name%`;"
    mysql -u %db_user% %db_name% < "%db_name%.sql"
) else (
    mysql -u %db_user% -p%db_pass% -e "CREATE DATABASE IF NOT EXISTS `%db_name%`;"
    mysql -u %db_user% -p%db_pass% %db_name% < "%db_name%.sql"
)

echo Database '%db_name%' created and '%db_name%.sql' imported.
pause
