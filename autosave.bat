@echo off
setlocal enabledelayedexpansion
for /f "delims=" %%a in ('watchman-wait .') do (
    git add %%a
    git commit -m "Autosave"
    git pull --rebase origin master
)