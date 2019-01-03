@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop


"C:\Users\Hugo Martinsson\Documents\GitHub\Gy_Arb_LP18-19\xampp\mysql\bin\mysqld" --defaults-file="C:\Users\Hugo Martinsson\Documents\GitHub\Gy_Arb_LP18-19\xampp\mysql\bin\my.ini" --standalone --console
if errorlevel 1 goto error
goto finish

:stop
"C:\Users\Hugo Martinsson\Documents\GitHub\Gy_Arb_LP18-19\xampp\apache\bin\pv" -f -k mysqld.exe -q

if not exist "C:\Users\Hugo Martinsson\Documents\GitHub\Gy_Arb_LP18-19\xampp\mysql\data\%computername%.pid" goto finish
echo Delete %computername%.pid ...
del "C:\Users\Hugo Martinsson\Documents\GitHub\Gy_Arb_LP18-19\xampp\mysql\data\%computername%.pid"
goto finish


:error
echo MySQL could not be started

:finish
exit
