<?php
$format_cmd = "prettier --write '../src/**/*.php' '../database/**/*.php' './*.php'";
chdir(__DIR__);
print shell_exec($format_cmd);
